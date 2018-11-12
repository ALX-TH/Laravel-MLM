<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class AdminInvestController
 * @package App\Http\Controllers
 */
class AdminInvestController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plan.index', compact('plans'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        $styles = Style::all();
        return view('admin.plan.edit', compact('plan','styles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'                      => 'required|max:100',
            'style_id'                  => 'required|numeric|min:1|max:200',
            'minimum'                   => 'required|numeric|min:1',
            'maximum'                   => 'required|numeric|min:1',
            'percentage'                => 'required|numeric',
            'repeat'                    => 'required|numeric|min:1',
            'start_duration'            => 'required|numeric',
            'status'                    => 'required|boolean',
            'availability_reinvestment' => 'required|boolean',
        ]);

        $plan = new Plan;

        $plan->name = $request->name;
        $plan->style_id = $request->style_id;
        $plan->minimum = $request->minimum;
        $plan->maximum = $request->maximum;
        $plan->percentage = $request->percentage;
        $plan->repeat = $request->repeat;
        $plan->start_duration = $request->start_duration;
        $plan->status = $request->status;
        $plan->availability_reinvestment = $request->availability_reinvestment;
        $plan->save();

        session()->flash('message', 'The Invest Plan Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');

        return redirect()->route('adminInvest');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $styles = Style::all();
        return view('admin.plan.create', compact('styles'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name'                      => 'required|max:100',
            'style_id'                  => 'required|numeric|min:1|max:200',
            'minimum'                   => 'required|numeric|min:1',
            'maximum'                   => 'required|numeric|min:1',
            'percentage'                => 'required|numeric',
            'repeat'                    => 'required|numeric|min:1',
            'start_duration'            => 'required|numeric',
            'status'                    => 'required|boolean',
            'availability_reinvestment' => 'required|boolean',

        ]);

        $plan = Plan::find($id);

        $plan->name = $request->name;
        $plan->style_id = $request->style_id;
        $plan->minimum = $request->minimum;
        $plan->maximum = $request->maximum;
        $plan->percentage = $request->percentage;
        $plan->repeat = $request->repeat;
        $plan->start_duration = $request->start_duration;
        $plan->status = $request->status;
        $plan->availability_reinvestment = $request->availability_reinvestment;
        $plan->save();

        session()->flash('message', 'The Invest Plan Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');

        return redirect()->route('adminInvest');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $style = Plan::find($id);
        $style->delete();

        session()->flash('message', 'The Invest Plan Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');

        return redirect()->route('adminInvest');
    }

}
