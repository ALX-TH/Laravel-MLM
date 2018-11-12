<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $memberships = Membership::all();

        return view('admin.memberships.index',compact('memberships'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.memberships.create');
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

            'name'=> 'required|max:15',
            'details' => 'required|max:400',
            'duration' => 'required|numeric',
            'ad_limit' => 'required|numeric',
            'price' => 'required|numeric'

        ]);
        $membership = Membership::create([

            'name' => $request->name,
            'details' => $request->details,
            'duration' => $request->duration,
            'price' => $request->price,
            'ad_limit' => $request->ad_limit,

        ]);

        session()->flash('message', 'The Membership Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');


        return redirect()->route('admin.memberships.index');

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
        //

        $membership= Membership::find($id);

        return view('admin.memberships.edit', compact('membership'));


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

            'name'=> 'required|max:15',
            'details' => 'required|max:400',
            'duration' => 'required|numeric',
            'ad_limit' => 'required|numeric',
            'price' => 'required|numeric'

        ]);
        Membership::find($id)->update([

                                            'name' => $request->name,
                                            'details' => $request->details,
                                            'duration' => $request->duration,
                                            'price' => $request->price,
                                            'ad_limit' => $request->ad_limit,

                                             ]);

        session()->flash('message', 'The Membership Has Been Successfully Saved.');
        Session::flash('type', 'success');
        Session::flash('title', 'Saved Successful');


        return redirect()->route('admin.memberships.index');


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

        $membership = Membership::findOrFail($id);

        foreach ($membership->users as $user){

            $user->membership_id = 1;
            $user->save();
        }

        $membership->delete();

        session()->flash('message', 'The Membership Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');

        return redirect()->route('admin.memberships.index');


    }
}
