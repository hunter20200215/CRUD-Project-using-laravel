<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Description;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }
    public function __construct()
    {
        $this->middleware('custom_auth');
    }


    public function index()
    {
        //
        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::rootCategories()->get();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // $request->validate([
        //     'subject' => 'required|unique:posts|max:255',
        //     'intro' => 'required|max:255',
        //     'description.content' => 'required|max:255'
        // ], [
        //     'required' => 'This field is required',
        //     'min' => 'This field should be greater than :min characters',
        // ]);

        $post = new Post;
        $post->category_id = $request->category_id;
        $post->subject = $request->subject;
        $post->intro = $request->intro;
        $post->created_by = $request->user()->id;
        $post->save();

        $description = new Description;
        $description->content = $request->description['content'];

        $post->description()->save($description);

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::rootCategories()->get();
        return view('admin.posts.edit', compact(['categories', 'post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'subject' => [
                'required',
                Rule::unique('posts')->ignore($post->id),
                'max:255'],
            'intro' => 'required|max:255',
            'description.content' => 'required|max:255'
        ], [
            'required' => 'This field is required',
            'min' => 'This field should be greater than :min characters',
        ]);

        $post->category_id = $request->category_id;
        $post->subject = $request->subject;
        $post->intro = $request->intro;
        $post->created_by = $request->user()->id;

        $post->description->content = $request->description['content'];
        
        $post->push();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
