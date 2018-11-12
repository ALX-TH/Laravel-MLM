<?php

namespace App\Http\Controllers;

use App\Kyc;
use App\Kyc2;
use App\Membership;
use App\Notifications\KYC2VerifyAccept;
use App\Notifications\KYCVerifyAccept;
use App\Post;
use App\Testimonial;
use App\UserLog;
use App\Withdraw;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user();

        $withdraw = Withdraw::whereUser_id($user->id)->whereStatus(1)->select('amount')->sum('amount');;

        $posts = Post::inRandomOrder()->take(3)->get();

        $identity= Kyc::whereUser_id($user->id)->get();
        $address= Kyc2::whereUser_id($user->id)->get();

        return view('user.index',compact('user','identity','address','posts','withdraw'));
    }

    public function kyc()
    {
        $user= Auth::user();
        $result1= Kyc::whereUser_id($user->id)->first();
        $result2= Kyc2::whereUser_id($user->id)->first();
        return view('user.kyc',compact('user','result1','result2'));
    }

    public function kycSubmit(Request $request)
    {
        $user= Auth::user();

        $this->validate($request, [

            'name'=> 'required|max:25',
            'front' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',
            'number' => 'required|max:50',
            'dob' => 'required|date',

        ]);

        if ($request->hasFile('back')){

            $this->validate($request, [

                'back' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072'
            ]);

            $back = $request->back;
            $back_new_name = time().$back->getClientOriginalName();
            $back->move('uploads/verifications', $back_new_name);

            $front = $request->front;

            $front_new_name = time().$front->getClientOriginalName();

            $front->move('uploads/verifications', $front_new_name);

            $kyc = Kyc::create([

                'name' => $request->name,
                'user_id' => $user->id,
                'number' => $request->number,
                'back' => 'uploads/verifications/' . $back_new_name,
                'front' => 'uploads/verifications/' . $front_new_name,
                'dob' => $request->dob,
                'status' => 0,

            ]);

            $user->notify(new KYCVerifyAccept($user));

            session()->flash('message', 'Your Verify Request Has Been Successfully Submitted.');
            Session::flash('type', 'success');
            Session::flash('title', 'Request Successful');

            return redirect()->route('userKyc');

        }

        $front = $request->front;

        $front_new_name = time().$front->getClientOriginalName();

        $front->move('uploads/verifications', $front_new_name);

        $kyc = Kyc::create([

            'name' => $request->name,
            'user_id' => $user->id,
            'number' => $request->number,
            'back' => 'img/image_placeholder.jpg',
            'front' => 'uploads/verifications/' . $front_new_name,
            'dob' => $request->dob,
            'status' => 0,

        ]);

        $user->notify(new KYCVerifyAccept($user));

        session()->flash('message', 'Your Verify Request Has Been Successfully Submitted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Request Successful');

        return redirect()->route('userKyc');
    }

    public function kyc2Submit(Request $request)
    {
        $user= Auth::user();

        $this->validate($request, [

            'name'=> 'required|max:25',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',

        ]);

        $photo = $request->photo;

        $photo_new_name = time().$photo->getClientOriginalName();

        $photo->move('uploads/verifications', $photo_new_name);

        $kyc2 = Kyc2::create([

            'name' => $request->name,
            'user_id' => $user->id,
            'photo' => 'uploads/verifications/' . $photo_new_name,
            'status' => 0,

        ]);

        $user->notify(new KYC2VerifyAccept($user));

        session()->flash('message', 'Your Verify Request Has Been Successfully Submitted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Request Successful');

        return redirect()->route('userKyc');
    }



    public function earnHistory()
    {
        $user= Auth::user();

        $earns = UserLog::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(20);


        return view('user.history.earn',compact('earns'));
    }

    public function review()
    {
        $user = Auth::user();

        $review = Testimonial::whereUser_id($user->id)->get();

        return view('user.testimonial',compact('review'));
    }
    public function reviewPost(Request $request)
    {
        $this->validate($request, [

            'title'=> 'required|min:20|max:100',
            'comment' => 'required|min:50|max:500',

        ]);

        $user = Auth::user();

        $testionial= Testimonial::create([

            'title' => $request->title,
            'comment' => $request->comment,
            'user_id' => $user->id,
            'status' => 0,

        ]);

        session()->flash('message', 'Your Review Has Been Successfully Submitted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Review Successful');

        return redirect()->route('userDashboard');


    }


}
