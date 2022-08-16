<?php
namespace App\Traits;

use Illuminate\Support\Facades\Redis;

trait Visits
{

    public function visits()
    {
        return new \App\Classes\Visits($this);
    }
//    public function restVisits(){
//        Redis::del($this->visitsCacheKey());
//        return $this;
//    }

}
