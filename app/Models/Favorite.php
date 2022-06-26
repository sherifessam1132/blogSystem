<?php

namespace App\Models;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory,RecordActivity;
    protected $guarded=[];

    public function favorite(){
        return $this->morphTo();
    }
}
