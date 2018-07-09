<?php

namespace App\Providers;

use App\Services\CurrencyGenerator;
use Illuminate\Support\ServiceProvider;

use App\Services\CurrencyRepository;
use App\Services\CurrencyRepositoryInterface;

use App\Services\Contracts\CurrencyPresenter as CurrencyPresenterContract;
use App\Services\CurrencyPresenter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyRepositoryInterface::class, function () {
            return new CurrencyRepository(CurrencyGenerator::generate());
        });

        $this->app->bind(CurrencyPresenterContract::class, CurrencyPresenter::class);
    }
}
