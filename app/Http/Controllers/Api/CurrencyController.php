<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyPresenter;

class CurrencyController extends Controller
{
    private $currencyPresenter;
    private $currencyRepository;

    public function __construct(
        CurrencyPresenter $currencyPresenter,
        CurrencyRepositoryInterface $currencyRepository
    )
    {
        $this->currencyPresenter = $currencyPresenter;
        $this->currencyRepository = $currencyRepository;
    }

    public function index()
    {
        $currencies = $this->currencyRepository->findActive();
        $result = [];

        foreach ($currencies as $currency) {
            $result[] = $this->currencyPresenter::present($currency);
        }

        return response()->json($result);
    }

    public function show(int $id)
    {
        $currency = $this->currencyRepository->findById($id);

        if($currency === null){
            abort(404);
        }
        $result = $this->currencyPresenter::present($currency);

        return response()->json($result);
    }

}
