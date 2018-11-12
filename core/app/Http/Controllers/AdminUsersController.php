<?php

namespace App\Http\Controllers;

use App\Notifications\AdminCreateUser;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
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
    public function index(Request $request)
    {
        //
        $s= $request->input('s');

        $users = User::latest()->search($s)->paginate(10);

        return view('admin.users.index',compact('users','s'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('admin.users.create');


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

        $this->validate($request, [

            'name'=> 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'admin'=>0,
            'active'=>0,
            'membership_id'=>1,
            'membership_started'=>date('Y-m-d'),
            'membership_expired'=>'2020-12-31',
            'token'=>str_random(25),

        ]);

        $profile = Profile::create([

            'user_id' => $user->id,
            'avatar'=>'uploads/avatars/default.jpg'

        ]);

        $data = (object) array(

            "email"=>$request->email,
            "password"=>$request->password,
            "token"=>$user->token,
        );

        (new User)->forceFill([
            'email' => $request->email,
        ])->notify(new AdminCreateUser($data));

        session()->flash('message', 'The User Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');

        return redirect()->route('admin.users.index');


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $user=User::find($id);

        return view('admin.users.edit',compact('user'));


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

            $this->validate($request, [

                'name'=> 'required',
                'email' => 'required|email',
                'occupation' => 'required|max:30',
                'mobile' => 'required|min:8|max:16',
                'address' => 'required|max:50',
                'city' => 'required|max:30',
                'state' => 'required|max:30',
                'postcode' => 'required|max:20'

            ]);

            $user = User::find($id);


        if ($request->hasFile('avatar')){

            $this->validate($request, [

                'avatar' => 'required|image'
            ]);



            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/'. $avatar_new_name;

            $user->profile->save();

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->profile->main_balance = $request->main_balance;
        $user->profile->referral_balance = $request->referral_balance;
        $user->profile->deposit_balance = $request->deposit_balance;
        $user->profile->occupation = $request->occupation;
        $user->profile->mobile = $request->mobile;
        $user->profile->address = $request->address;
        $user->profile->address2 = $request->address2;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->postcode = $request->postcode;
        $user->profile->country = $request->country;
        $user->profile->facebook = $request->facebook;
        $user->profile->about = $request->about;


        $user->save();

        $user->profile->save();

        if ($request->has('password')){

            $user->password = bcrypt($request->password);

            $user->save();


        }



        session()->flash('message', 'The User Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');

        return redirect(route('admin.users.index'));

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
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('message', 'The User Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');

        return redirect()->back();


    }
    public function admin($id)
    {
        $user = User::find($id);

        $user->admin=1;

        $user->save();

        session()->flash('message', 'The User Has Been Successfully Get Admin Permission.');
        Session::flash('type', 'success');
        Session::flash('title', 'Permission Granted');

        return redirect()->back();

    }
    public function adminRemove($id)
    {
        $user = User::find($id);

        $user->admin=0;

        $user->save();

        session()->flash('message', 'The User Has Been Successfully Removed Admin Permission.');
        Session::flash('type', 'success');
        Session::flash('title', 'Permission Removed');

        return redirect()->back();


    }

}
