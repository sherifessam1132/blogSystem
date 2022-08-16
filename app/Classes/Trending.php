<?php

namespace App\Classes;

use Illuminate\Support\Facades\Redis;

class Trending
{

    public function get(){
        return collect(Redis::zrevrange('trending_posts',0,4))->map(function ($post){
           return json_decode($post,true);
        });
//        $trending=collect(Redis::zrevrange('trending_posts',0,-1))->map(function ($post){
//            return json_decode($post,true);
//        });
    }
    public function push($post){
        Redis::zincrby('trending_posts',1,json_encode([
            'title'=>$post->title,
            'path'=>$post->path()
        ]));
    }
}
