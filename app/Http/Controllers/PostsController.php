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

    /**
     * Only admin's can access create/edit functions
     */
    public function __construct()
    {
        $this->middleware('role:Admin', ['only' => ['create', 'edit']]);
    }

    /**
     * Display a listing of the posts.
     *
     * @return view(blog/index)
     */
    public function index()
    {
        $pagetitle = "Blog";
        $posts = Post::latest('created_at')->get();
        return view('blog.index')->with(['posts' => $posts, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return view(blog/create)
     */
    public function create()
    {
        $pagetitle = "Create new blog post";
        return view('blog.create')->with('pagetitle', $pagetitle);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect(blog)
     */
    public function store(Requests\PostRequest $request)
    {
        $post = new Post($request->all());

        $post->uploaded_image = $request->file('image');
        $post->slug = $post->title;
        $post->excerpt = $post->body;
        \Auth::user()->posts()->save($post);
        \Session::flash('flash_message', 'Your post has been successfully created.');
        return redirect('/blog');
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return view(blog/show)
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $pagetitle = $post->title;
        return view('blog.show')->with(['post' => $post, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return view(blog/edit)
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $pagetitle = "Edit: ".$post->slug;
        return view('blog.edit')->with(['post' => $post, 'pagetitle' => $pagetitle]);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * Update the resource with $id and $request
     * @return Redirect to Blog
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->uploaded_image = $request->file('image');
        $post->slug = $request->get('title');
        $post->excerpt = $request->get('body');

        $post->update($request->all());
        \Session::flash('flash_message', 'Your post has been successfully updated.');
        return redirect('blog');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        \Session::flash('flash_message', 'Your post has been successfully deleted.');
        return redirect('blog');
    }
}
