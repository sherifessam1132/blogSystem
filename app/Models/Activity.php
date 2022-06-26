<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table='activities';
    protected $guarded=[];
    public function subject(){
        return $this->morphTo();
    }
    public static function feed($user){
        return static::where('user_id',auth()->id())
            ->latest()
            ->with('subject')
            ->take(50)
            ->get()
            ->groupBy(function ($activity){
                    return $activity->created_at->format('Y-m-d');
            });
    }
}
