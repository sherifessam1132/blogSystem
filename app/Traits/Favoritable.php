<?php
namespace App\Traits;

use App\Models\Favorite;

trait Favoritable
{

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
        return !! $this->favorites->where('user_id',auth()->id())->count();
    }
    public function getFavoritesCountAttribute(){
        return $this->favorites->count();
    }
}
