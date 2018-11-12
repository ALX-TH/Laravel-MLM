<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
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

        $posts = Post::paginate(10);

        return view('admin.posts.index',compact('posts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();

        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count() == 0){

            if ($categories->count() == 0){

                session()->flash('message', 'You need at least 1 category to create a post.');
                Session::flash('type', 'warning');
                Session::flash('title', 'Need Category First');

                return redirect(route('admin.category.index'));
            }
            else
                session()->flash('message', 'You need at least 1 tags to create a post.');
                Session::flash('type', 'warning');
                Session::flash('title', 'Need Tags First');

                return redirect(route('admin.tags.index'));


        }


        return view('admin.posts.create', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Request
     */
    public function store(Request $request)
    {
        //



        $this->validate($request, [

            'title'=> 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
            'body' => 'required'

        ]);


        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([

            'title' => $request->title,
            'content' => $request->body,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'slug' => str_slug($request->title)

        ]);

        $post->tags()->attach($request->tags);

        session()->flash('message', 'The Blog Post Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');


        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        $categories = Category::all();


        return view('admin.posts.edit', compact('post','categories','tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [

            'title'=> 'required',
            'category_id' => 'required',
            'body' => 'required'

        ]);

        $post= Post::find($id);

        if ($request->hasFile('featured')){

            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'. $featured_new_name;

        }

        $post->title = $request->title;

        $post->content = $request->body;

        $post->category_id= $request->category_id;
        $post->slug = str_slug($request->title);

        $post->save();

        $post->tags()->sync($request->tags);


        session()->flash('message', 'The Blog Post Has Been Successfully Edited.');
        Session::flash('type', 'success');
        Session::flash('title', 'Edited Successful');


        return redirect()->route('admin.posts.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        //

        $post = Post::findOrFail($id);

        $post->delete();

        session()->flash('message', 'The Blog Post Has Been Successfully Trashed.');
        Session::flash('type', 'success');
        Session::flash('title', 'Soft Deleted Successful');

        return redirect()->route('admin.posts.index');

    }

    public function trashed()
    {
        //

        $posts = Post::onlyTrashed()->get();

       return view('admin.posts.trashed', compact('posts'));

    }

    public function kill($id)
    {
        //

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        session()->flash('message', 'The Blog Post Has Been Successfully Deleted Permanently.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


       return redirect()->back();

    }

    public function restore($id)
    {
        //

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        session()->flash('message', 'The Blog Post Has Been Successfully Restored.');
        Session::flash('type', 'success');
        Session::flash('title', 'Restored Successful');


        return redirect()->back();

    }



}
