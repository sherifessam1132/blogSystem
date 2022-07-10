<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Inspections\Spam;
use App\Models\Channel;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use App\Notifications\YouWereMentioned;

class RepliesController extends Controller
{
   public function __construct(){
        $this->middleware('auth')->except(['index']);
    }
    public function index(Channel $channel,Post $post)
    {
        return $post->replies()->paginate(20);
    }
    public function store(Channel $channel, Post $post, createPostRequest $request){



      return $post->addReply([
                'body'=>request('body'),
                'user_id'=>auth()->id(),
            ])->load('owner');




    }
    public function destroy(Reply $reply){

       $this->authorize('update',$reply);

       $reply->delete();
       if (\request()->expectsJson()){
           return response(['message'=>'Reply Deleted']);
       }
    }
    public function update(Reply $reply,Spam $spam){
        $this->validate(request(),[
            'body'=>['required','string'],
        ]);
        $this->authorize('update',$reply);
        $spam->detect(request('body'));
        $reply->update(['body'=>\request('body')]);

    }
}
