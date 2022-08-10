<?php

namespace App\Http\Controllers;

use App\Actions\PostAction;
use App\Jobs\PostJob;
use App\Services\PostService;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        // Using Model
        // $postsModel = new Post();
        // $posts = $post->getAllPosts();

        //Using Service Container 
        $postService = new PostService;
        $posts = $postService->getAllPosts();

        //Using Action Class 
        // $postAction = new PostAction;
        // $posts = $postAction->execute();

        // Using Job
        // $posts = dispatch(new PostJob);

        Mail::send(['html' => 'mail'], [], function ($message) {
            $message->from('abhishek.gupta@camplus.co.in', 'Abhishek Gupta');
            $message->to('abhishek.gupta@camplus.co.in', 'Abhishek Gupta');
            $message->subject('Test');
        });

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
