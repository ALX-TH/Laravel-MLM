<?php

namespace App\Http\Controllers;

use App\Kyc;
use App\Kyc2;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth');

    }


    public function index()
    {

        $user= Auth::user();

        $identity= Kyc::whereUser_id($user->id)->get();
        $address= Kyc2::whereUser_id($user->id)->get();

        $result1= Kyc::whereUser_id($user->id)->first();
        $result2= Kyc2::whereUser_id($user->id)->first();


        return view('user.profile',compact('user','identity','address','result1','result2'));

    }

    public function update(Request $request)
    {

        $user= Auth::user();

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


        if(!Hash::check($request->get('current_password'), $user->password)){

            session()->flash('message', 'Your current password does not matches with the password you provided. Please try again.');
            Session::flash('type', 'error');
            Session::flash('title', 'Password Not Match');

            return redirect()->back();

        }
        if(strcmp($request->get('current_password'), $request->get('password')) == 0){

            session()->flash('message', 'New Password cannot be same as your current password. Please choose a different password.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Password Same');


            return redirect()->back();
        }


        if ($request->hasFile('avatar')){

            $this->validate($request, [

                'avatar' => 'required|image|mimes:jpeg,bmp,png,jpg'
            ]);


            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/'. $avatar_new_name;

            $user->profile->save();

        }

        $user->name = $request->name;
        $user->email = $request->email;
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

        if ($request->password != null){
            $this->validate($request, [
                'password' => 'required|min:6|confirmed'
            ]);

            $user->password = bcrypt($request->password);

            $user->save();


        }



        session()->flash('message', 'Your Profile Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');

        return redirect()->back();

    }


}
