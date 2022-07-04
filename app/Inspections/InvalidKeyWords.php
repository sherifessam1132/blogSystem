<?php

namespace App\Inspections;

class InvalidKeyWords
{

    protected $invalidKeywords=[
        'yahoo customer support'
    ];
    public function detect($body)
    {

        foreach ($this->invalidKeywords as $keyword){
            if (stripos($body,$keyword) !== false){
                throw new \Exception('your Reply contains spam.');
            }
        }
    }
}
