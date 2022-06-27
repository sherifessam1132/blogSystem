<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;

use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }
    public function store(Channel $channel,Post $post,Request $request){
        $this->validate(request(),[
            'body'=>['required']
        ]);
        $post->addReply([
            'body'=>request('body'),
            'user_id'=>auth()->id(),
        ]);
        return redirect()->back()->with('flash','added sucessfully');
    }
    public function destroy(Reply $reply){

       $this->authorize('update',$reply);

       $reply->delete();
       if (\request()->expectsJson()){
           return response(['message'=>'Reply Deleted']);
       }
    }
    public function update(Reply $reply){
        $this->validate(request(),[
            'body'=>['required','string'],
        ]);
        $this->authorize('update',$reply);
        $reply->update(['body'=>\request('body')]);

    }
}
