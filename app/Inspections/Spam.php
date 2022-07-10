<?php

namespace App\Inspections;

class Spam
{

    protected $inspections=[
        InvalidKeyWords::class,
        keyHeldDown::class
    ];
    public function detect($body)
    {
        foreach ($this->inspections as $inspection){

            resolve($inspection)->detect($body);
        }

        return false;
    }


}
