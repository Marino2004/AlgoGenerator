<?php

namespace App\Config;

enum TypeOfReturn
{
    case VOID;
    case BOOLEAN;
    case FLOAT;
    case INTEGER;
    case STRING;
}