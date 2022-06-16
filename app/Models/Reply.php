<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $guarded=[];
    public  function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function favorites(){
        return $this->morphMany(Favorite::class,'favorite');
    }
    public function favorite($userId=null){
        if ($favorite= $this->favorites()->where('user_id',auth()->id())->exists()){
            $favorite->delete();
        }
        return $this->favorites()->create(['user_id'=>$userId??auth()->id()]);
    }
    public function getIsFavoritedAttribute(){
        return $this->favorites()->where('user_id',auth()->id())->exists();
    }
}
