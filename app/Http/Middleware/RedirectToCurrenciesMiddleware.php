<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToCurrenciesMiddleware
{
    public function handle()
    {
        return redirect(route('currencyList'));
    }
}
