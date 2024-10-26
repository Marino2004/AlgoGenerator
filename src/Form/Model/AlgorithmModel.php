<?php

namespace App\Form\Model;

use App\Config\Level;
use App\Config\TypeOfReturn;

class AlgorithmModel
{
    public function __construct(
        public  Level $level = Level::EASY ,
        public TypeOfReturn $typeOfReturn = TypeOfReturn::VOID,
    ) { }
}