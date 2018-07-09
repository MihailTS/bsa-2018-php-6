<?php

namespace App\Services\Contracts;

use App\Services\Currency;

interface CurrencyPresenter
{
    public static function present(Currency $currency): array;
}