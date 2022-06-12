<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }
    public function store(Post $post,Request $request){
        $this->validate(request(),[
            'body'=>['required']
        ]);
        $post->addReply([
            'body'=>request('body'),
            'user_id'=>auth()->id()
        ]);
        return redirect()->back()->withSuccess('added sucessfully');
    }
}
