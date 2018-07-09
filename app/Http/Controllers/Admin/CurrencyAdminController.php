<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyPresenter;

class CurrencyAdminController extends Controller
{
    private $currencyPresenter;
    private $currencyRepository;

    public function __construct
    (
        CurrencyPresenter $currencyPresenter,
        CurrencyRepositoryInterface $currencyRepository
    )
    {
        $this->currencyPresenter = $currencyPresenter;
        $this->currencyRepository = $currencyRepository;
    }

    public function index()
    {
        $currencies = $this->currencyRepository->findAll();
        return view('currencies', ['currencies' => $currencies]);
    }
}
