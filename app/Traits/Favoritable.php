<?php
namespace App\Traits;

use App\Models\Favorite;

trait Favoritable
{

    public function favorites(){
        return $this->morphMany(Favorite::class,'favorite');
    }
    public function favorite($userId=null){
        if (! $this->favorites()->where('user_id',auth()->id())->exists()) {
               return $this->favorites()->create(['user_id' => $userId ?? auth()->id()]);
        }
    }
    public function unFavorite($userId=null){
        if ($this->favorites()->where(['user_id'=>$userId??auth()->id()])->exists()){
            return $this->favorites()->get()->each->delete();
//                ->each(function ($favorite){
//                return $favorite->delete();
//            });
        }
    }
    public function getIsFavoritedAttribute(){
        return !! $this->favorites->where('user_id',auth()->id())->count();
    }
    public function getFavoritesCountAttribute(){
        return $this->favorites->count();
    }
}
