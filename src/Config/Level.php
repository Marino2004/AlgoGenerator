<?php

namespace App\Config;

use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Contracts\Translation\TranslatableInterface;

enum Level implements TranslatableInterface
{
    case EASY;
    case MEDIUM;
    case COMPLEX;

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return match ($this)
        {
            self::EASY => 'Facile',
            self::MEDIUM => 'Moyen',
            self::COMPLEX => 'Complexe',
        };
    }
}