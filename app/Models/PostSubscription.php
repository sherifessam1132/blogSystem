<?php

namespace App\Models;

use App\Notifications\PostWasUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSubscription extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function notify($post,$reply){
        $this->user->notify(new PostWasUpdated($post,$reply));
    }
}
