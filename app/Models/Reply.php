<?php

namespace App\Models;

use App\Traits\Favoritable;
use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory,Favoritable,RecordActivity;
    protected $guarded=[];
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

}
