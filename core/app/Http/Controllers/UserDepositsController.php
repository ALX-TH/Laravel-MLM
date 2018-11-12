<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Gateway;
use App\Offline;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class UserDepositsController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        $paypal = Gateway::find(1);
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal->val1, $paypal->val2));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function index()
    {
        $user=Auth::user();
        $deposits= Deposit::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(15);
        return view('user.deposit.index',compact('deposits'));
    }

    public function create()
    {
        $gateways = Gateway::whereStatus($this->activeGateways)->get();
        $local_gateways = Offline::whereStatus($this->activeGateways)->get();
        $user = Auth::user();
        $settings = Settings::first();
        return view('user.deposit.create',compact('gateways','user','settings','local_gateways'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentPreview(Request $request)
    {
        $this->validate($request, [
            'gateway'=> 'required|numeric|max:200',
            'amount' => 'required|numeric',
        ]);

        $settings = Settings::first();

        if ($settings->minimum_deposit > $request->amount){

            session()->flash('message', 'You need at least  $ '.$settings->minimum_deposit.' to deposit money. Please increase money first. ');
            Session::flash('type', 'error');
            Session::flash('title', 'Minimum Deposit');

            return redirect(route('userDeposit.create'));


        }

        $gateway= Offline::find($request->gateway);

        $percentage =  $gateway->percent;

        $fixed =  $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $user=Auth::user();


        $deposit = (object) array(

            'amount'=> $request->amount,
            'charge'=> $charge,
            'net_amount'=> $new_amount,
            'code'=> str_random(10),
        );

        $user->d_code = $deposit->code;
        $user->save;



        return view('user.deposit.preview',compact('gateway','user','deposit'));

    }

    public function postPayment(Request $request) {
        $this->validate($request, [
            'gateway'       => 'required|numeric|max:30',
            'amount'        => 'required|numeric|',
        ]);

        $settings = Settings::first();
        if ($settings->minimum_deposit > $request->amount){
            session()->flash('message', 'You need at least  $ '.$settings->minimum_deposit.' to deposit money. Please increase money first. ');
            Session::flash('type', 'error');
            Session::flash('title', 'Minimum Deposit');
            return redirect(route('userDeposit.create'));
        }

        $gateway= Gateway::find($request->gateway);

        /**
         * Paypal
         */
        if ($gateway->id == 1)
        {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();
            $item_1->setName('Account Deposit')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($request->amount);


            // add item to list
            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency(env('CURRENCY_CODE', 'USD'))
                ->setTotal($request->amount);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('User Deposit From ' . env('APP_NAME', 'HyipCMS'));

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('userDepositPayPal.status'))
                ->setCancelUrl(route('userDeposit.create'));

            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->_api_context);
            } catch (PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    die('Some error occur, sorry for inconvenient. Get back and try again.');
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            // add payment ID to session
            Session::put('paypal_payment_id', $payment->getId());
            Session::put('total_amount', $request->amount);

            if(isset($redirect_url)) {
                return Redirect::away($redirect_url);
            }

            session()->flash('message', 'An unknown error has been occurred. Please try again after some time. Thank you.');
            Session::flash('type', 'error');
            Session::flash('title', 'Deposit Failed');
            return redirect()->route('userDeposit.create');
        }

    }

    public function offline(Request $request)
    {

        $this->validate($request, [

            'gateway'   => 'required|numeric|max:30',
            'amount'    => 'required|numeric',
            'reference' => 'required|max:50',
        ]);

        $user = Auth::user();
        $gateway= Offline::whereId($request->gateway)->first();

        $percentage =  $gateway->percent;
        $fixed =  $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $deposit= Deposit::create([

            'transaction_id' => $request->reference,
            'user_id'=> $user->id,
            'gateway_name'=> $gateway->name,
            'amount'=> $request->amount,
            'charge'=> $charge,
            'net_amount'=> $new_amount,
            'status'=> 0,
            'details'=>'No Details are Provided',

        ]);


        session()->flash('message', 'After Charging Gateway Fee Your Total Deposit Amount $ '.$new_amount.' Has Been Successfully Requested. Fund is automatically add to your balance Once we verify ');
        Session::flash('type', 'success');
        Session::flash('title', 'Deposit Requested');

        return redirect()->route('userDeposits');
    }


    public function getPaypalStatuscopy(Request $request)
    {

        session()->flash('message', 'After Charging Gateway Fee Your Total Deposit Amount Has Been Successfully Requested. Fund is automatically add to your balance Once we verify ');
        Session::flash('type', 'success');
        Session::flash('title', 'Deposit Requested');

        return redirect()->route('userDashboard');

    }



    public function getPaypalStatus()
    {
        $user = Auth::user();
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');
        $amount = Session::get('total_amount');
        // clear the session payment ID
        Session::forget('paypal_payment_id');
        Session::forget('total_amount');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            session()->flash('message', 'Payment Failed..! You are cancel payment. If any problem you have contact us. Thanks for try.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Payment Cancel');
            return redirect()->route('userDeposit.create');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $gateway= Gateway::first();
            $percentage =  $gateway->percent;
            $fixed =  $gateway->fixed;
            $charge = (($percentage / 100) * $amount) + $fixed;
            $new_amount = $amount - $charge;

            $deposit = Deposit::create([
                'transaction_id'    => str_random(6).$user->id.str_random(6),
                'user_id'           => $user->id,
                'gateway_name'      => $gateway->name,
                'amount'            => $amount,
                'charge'            => $charge,
                'net_amount'        => $new_amount,
                'status'            => 1,
                'details'           => 'PayPal Instant Deposit',
            ]);

            $user->profile->deposit_balance = $user->profile->deposit_balance +  $new_amount;
            $user->profile->save();

            session()->flash('message', 'Cheers, Before Charging Gateway Fee Your Deposit Amount is $ '.$amount.'. After Charging Gateway Fee Your Total Deposit Amount $ '.$new_amount.' Has Been Successfully Add to Your Balance.');
            Session::flash('type', 'success');
            Session::flash('title', 'Deposit Successful');
            return redirect(route('userDashboard'));
        }

        session()->flash('message', ' Sorry, Your $ '.$amount.' Has Been Failed To Deposit.');
        Session::flash('type', 'error');
        Session::flash('title', 'Deposit Failed');
        return redirect(route('userDeposit.create'));
    }
}
