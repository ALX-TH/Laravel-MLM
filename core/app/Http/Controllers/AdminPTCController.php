<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Membership;
use App\Ptc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPTCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisements= Ptc::paginate(10);

        return view('admin.paidtoclick.index', compact('advertisements'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $memberships= Membership::all();

        return view('admin.paidtoclick.create', compact('memberships'));
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

            'title'=> 'required|max:15',
            'details' => 'required|max:100',
            'duration' => 'required|numeric',
            'membership_id' => 'required',
            'ad_link' => 'required|url',
            'rewards' => 'required|numeric'

        ]);
        $ptc = Ptc::create([

            'title' => $request->title,
            'details' => $request->details,
            'duration' => $request->duration,
            'rewards' => $request->rewards,
            'ad_link' => $request->ad_link,
            'membership_id' => $request->membership_id,
        ]);

        session()->flash('message', 'The Paid To Click Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');


        return redirect()->route('admin.ptcs.index');


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

        $advertisement = Ptc::find($id);
        $memberships= Membership::all();

        return view('admin.paidtoclick.edit', compact('advertisement','memberships'));


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

            'title'=> 'required|max:15',
            'details' => 'required|max:100',
            'duration' => 'required|numeric',
            'membership_id' => 'required',
            'ad_link' => 'required|url',
            'rewards' => 'required|numeric'

        ]);


        Ptc::find($id)->update([

            'title' => $request->title,
            'details' => $request->details,
            'duration' => $request->duration,
            'rewards' => $request->rewards,
            'ad_link' => $request->ad_link,
            'membership_id' => $request->membership_id,

        ]);

        session()->flash('message', 'The Paid To Click Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');


        return redirect()->route('admin.ptcs.index');


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
        $advertisement = Ptc::find($id);

        $advert = Advert::wherePtc_id($advertisement->id);
        $advert->delete();
        $advertisement->delete();

        session()->flash('message', 'The PTC Advertisements Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');

        return redirect()->route('admin.ptcs.index');

    }
}
