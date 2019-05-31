<?php

namespace App\Http\Controllers\Blog;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('Blog.index',[
            'blog' => $blog
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = Blog::orderBy('sequence', 'desc')->first();
        $seq = $blog->sequence + 1;
        return view('Blog.create', ['seq' => $seq ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation($request) {
        return $this->validate($request,[
            'title' => 'required',
            'slug' => 'required',
            'sequence' => 'required',
            'content' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'title' => 'required',
            'slug' => 'required',
            'sequence' => 'required',
            'content' => 'required'
       ]);

        if ($validator->fails()) {
            // Session::flash('error', $validator->messages()->first());
            // return redirect()->back()->with('error', 'Error! Post submission failed..');
            return redirect()->back()->withInput()->with('error','Error! Please, fill the form appropriately.');
       } else {

        // dd($request);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->sequence = $request->sequence;
        $blog->content = $request->content;
        $blog->save();

        return redirect()->back()->with('success', 'Post was added successfully.'); 
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
        $blog = Blog::find($id);

        return view('Blog.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('Blog.edit', [
            'blog' => $blog
        ]);

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
