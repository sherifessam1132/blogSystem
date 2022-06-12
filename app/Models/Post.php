<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function filter(){
        
    }

    public function path(){
        return "posts/{$this->channel->slug}/{$this->id}";
    }
    public function addReply($reply){
         $this->replies()->create($reply);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function creator(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function channel(){
        return $this->belongsTo(Channel::class);
    }
}
