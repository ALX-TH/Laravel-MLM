<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\Notifications\SendEmailToOutsider;
use App\Notifications\SendEmailToUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminEmailController extends Controller
{


    public function __construct()
    {

        $this->middleware('admin');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $inboxes = Inbox::orderBy('updated_at','asc')->paginate(15);


        return view('admin.mails.index',compact('inboxes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.mails.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function send(Request $request)
    {

        $this->validate($request, [

            'status'=> 'required|min:1|max:2',
            'email' => 'required|email',
            'subject' => 'required|min:10|max:200',
            'body' => 'required|min:10|max:3000'

        ]);

        if ($request->status == 1){

            $user = User::whereEmail($request->email)->first();

            $data = (object) array(

                "user_name"=>$user->name,
                "subject"=>$request->subject,
                "content"=>$request->body,
            );

            $user->notify(new SendEmailToUser($data));

            session()->flash('message', "Send Email To ".$user->name." Successful!");
            Session::flash('type', 'success');
            Session::flash('title', 'Email Send Success!');

            return redirect()->route('adminEmail');
        }
        else{

            $data = (object) array(

                "subject"=>$request->subject,
                "content"=>$request->body,
            );

            (new User)->forceFill([
                'email' => $request->email,
            ])->notify(new SendEmailToOutsider($data));


            session()->flash('message', "Send Email To ".$request->email." Successful!");
            Session::flash('type', 'success');
            Session::flash('title', 'Email Send Success!');

            return redirect()->route('adminEmail');

        }



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $inbox = Inbox::find($id);

        $inbox->status = 1;

        $inbox->save();

        return view('admin.mails.show',compact('inbox'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
