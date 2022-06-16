<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use App\Models\User;
use App\Filters\PostFilters;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel,PostFilters $filters)
    {

        $posts=$this->getPosts($channel,$filters);


        $posts=Post::filter($filters)->get();
        if (\request()->wantsJson()){
            return  $posts;
        }

        return view('posts/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'channel_id' => ['required', Rule::exists('channels', 'id')]
        ]);
        $post = Post::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'body' => request('body'),
            'title' => request('title')
        ]);
        return redirect($post->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Post $post)
    {

        return view('posts/show', [
            'post' => $post,
            'replies'=>$post->replies()->paginate(20)
        ]);
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
    protected function getPosts(Channel $channel,PostFilters $filters){
        $posts=Post::latest()->filter($filters);
        if ($channel->exists){
            $posts->where('channel_id',$channel->id);
        }

        return $posts->get();
    }

}
