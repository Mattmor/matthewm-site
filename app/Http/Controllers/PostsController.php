<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Auth\AuthController;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:Admin', ['only' => ['create', 'edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle = "Blog";
        $posts = Post::latest('updated_at')->get();
        return view('blog.index')->with(['posts' => $posts, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = "Create new blog post";
        return view('blog.create')->with('pagetitle', $pagetitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        $post = new Post($request->all());

        // Needs to be put somewhere else
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $imagePath = public_path().'/images/uploaded/'.$image->getClientOriginalName();
            Image::make($image->getRealPath())->save($imagePath);
            $post->uploaded_image = '/images/uploaded/'.$image->getClientOriginalName();
        }

        $post->slug = $post->title;
        $post->excerpt = $post->body;
        \Auth::user()->posts()->save($post);
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $pagetitle = $post->title;
        return view('blog.show')->with(['post' => $post, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $pagetitle = "Edit: ".$post->slug;
        return view('blog.edit')->with(['post' => $post, 'pagetitle' => $pagetitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->slug = $request->get('title');
        $post->excerpt = $request->get('body');

        // Needs to be put somewhere else
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $imagePath = public_path().'/images/uploaded/'.$image->getClientOriginalName();
            Image::make($image->getRealPath())->save($imagePath);
            $post->uploaded_image = '/images/uploaded/'.$image->getClientOriginalName();
        }

        $post->update($request->all());

        return redirect('blog');
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
