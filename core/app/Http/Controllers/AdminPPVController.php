<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Ppv;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPPVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisements= Ppv::paginate(10);

        return view('admin.paidtoview.index', compact('advertisements'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberships= Membership::all();
        return view('admin.paidtoview.create', compact('memberships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title'         => 'required|max:15',
            'details'       => 'required|max:100',
            'code'          => 'required|max:30',
            'membership_id' => 'required',
            'rewards'       => 'required|numeric',
            'duration'      => 'required|numeric'

        ]);
        $ppv = Ppv::create([

            'title'         => $request->title,
            'details'       => $request->details,
            'duration'      => $request->duration,
            'rewards'       => $request->rewards,
            'code'          => $request->code,
            'membership_id' => $request->membership_id,
        ]);

        session()->flash('message', 'The Pay Per View Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');


        return redirect()->route('admin.ppvs.index');
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
        $advertisement = Ppv::find($id);
        $memberships= Membership::all();
        return view('admin.paidtoview.edit', compact('advertisement','memberships'));
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
        $this->validate($request, [

            'title'         => 'required|max:15',
            'details'       => 'required|max:100',
            'duration'      => 'required|numeric',
            'membership_id' => 'required',
            'code'          => 'required|max:30',
            'rewards'       => 'required|numeric'

        ]);


        Ppv::find($id)->update([

            'title'         => $request->title,
            'details'       => $request->details,
            'duration'      => $request->duration,
            'rewards'       => $request->rewards,
            'code'          => $request->code,
            'membership_id' => $request->membership_id,

        ]);

        session()->flash('message', 'The Pay Per View Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');

        return redirect()->route('admin.ppvs.index');
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
        $advertisement = Ppv::find($id);
        $advert = Video::wherePpv_id($advertisement->id);
        $advert->delete();

        $advertisement->delete();

        session()->flash('message', 'The Pay Per View Advertisements Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');

        return redirect()->route('admin.ppvs.index');

    }
}
