<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;

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
}
