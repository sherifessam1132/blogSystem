<?php

namespace App\Models;

use App\Traits\Favoritable;
use App\Traits\RecordActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory,Favoritable,RecordActivity;
    protected $guarded=[];
    protected $appends=['favoritesCount','isFavorited'];
    protected $with=['owner','favorites'];
    public  function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function path(){
        return $this->post->path() . `#reply-{$this->id}`;
    }
    public function wasJustPublished(){
        return $this->created_at->gt(Carbon::now()->subMinute());
    }
    public function setBodyAttribute($body){
        $this->attributes['body']=preg_replace('/@([\w\-]+)/','<a href="/profiles/$1">$0</a>',$body);
    }
}
