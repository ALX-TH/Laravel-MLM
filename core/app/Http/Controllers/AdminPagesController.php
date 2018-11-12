<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit', compact('page'));
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

            'name'      => 'required|min:3|max:100',
            'status'    => 'required|boolean',
            'body'      => 'required|min:50|max:50000',

        ]);

        $page= Page::find($id);

        $page->name = $request->name;
        $page->name_h1 = $request->name_h1;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->content = $request->body;
        $page->status = $request->status;
        $page->is_deletable = $request->is_deletable;
        $page->slug = str_slug($request->name);
        $page->save();

        session()->flash('message', 'The Website Page Has Been Successfully Edited.');
        Session::flash('type', 'success');
        Session::flash('title', 'Edited Successful');

        return redirect()->route('adminPages');
    }

    public function publish($id)
    {
        $page = Page::find($id);
        $page->status = 1;
        $page->save();

        session()->flash('message', 'This Page Has Been Successfully Published.');
        Session::flash('type', 'success');
        Session::flash('title', 'Published Successful');

        return redirect()->route('adminPages');
    }


    public function unPublish($id)
    {
        $page = Page::find($id);
        $page->status = 0;
        $page->save();

        session()->flash('message', 'This Page Has Been Successfully Un-Published.');
        Session::flash('type', 'success');
        Session::flash('title', 'Un-Published Successful');

        return redirect()->route('adminPages');
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
