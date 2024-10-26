<?php

namespace App\Form\Model;

use App\Config\Level;

class AlgorithmModel
{
    public function __construct(
        public ?string $theme = null,
        public  Level $level = Level::EASY,
    ) { }
}