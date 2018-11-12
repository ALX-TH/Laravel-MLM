<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminFAQController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('admin');

    }



    public function index()
    {
        //

        $faqs = Faq::all();


        return view('admin.Faq.index', compact('faqs'));


    }
    public function edit($id)
    {
        //

        $faq = Faq::find($id);


        return view('admin.Faq.edit', compact('faq'));


    }
    public function store(Request $request)
    {
        //


        $this->validate($request, [

            'title'=> 'required|max:200',
            'body' => 'required|max:3000',

        ]);


        $faq = Faq::create([

            'title' => $request->title,
            'content' => $request->body,

        ]);


        session()->flash('message', 'The Website F.A.Q Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');


        return redirect()->route('adminFAQ');


    }

    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [

            'title'=> 'required|max:200',
            'body' => 'required|max:3000',

        ]);

        $faq = Faq::find($id);

        $faq->title = $request->title;
        $faq->content = $request->body;

        $faq->save();



        session()->flash('message', 'The Website F.A.Q Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');


        return redirect()->route('adminFAQ');


    }
    public function destroy($id)
    {
        //

        $faq = Faq::find($id);

        $faq->delete();

        session()->flash('message', 'The Website F.A.Q Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


        return redirect()->route('adminFAQ');


    }
}
