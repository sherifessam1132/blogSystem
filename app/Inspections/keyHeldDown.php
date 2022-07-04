<?php

namespace App\Inspections;

class keyHeldDown
{

    public function detect($body){
        if(preg_match('/(.)\\1{4,}/',$body)){
            throw new \Exception('your Reply contains spam.');
        }
    }
}
