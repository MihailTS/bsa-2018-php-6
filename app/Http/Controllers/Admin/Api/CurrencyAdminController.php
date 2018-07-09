<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Services\Currency;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyPresenter;
use App\Http\Requests\Currency\CurrencyRequest;

class CurrencyAdminController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = $this->currencyRepository->findAll();
        $result = [];

        foreach ($currencies as $currency) {
            $result[] = $this->currencyPresenter::present($currency);
        }

        return response()->json($result);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $currency = new Currency(
            $this->currencyRepository->getLastID()+1,
            $request->getName(),
            $request->getShortName(),
            $request->getActualCourse(),
            $request->getActualCourseDate(),
            $request->getIsActive()
        );
        $this->currencyRepository->save($currency);

        $result = $this->currencyPresenter::present($currency);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = $this->currencyRepository->findById($id);

        if($currency === null){
            abort(404);
        }

        $result = $this->currencyPresenter::present($currency);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  CurrencyRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        $currency = $this->currencyRepository->findById($id);

        if($currency === null){
            abort(404);
        }

        $currency = $this->currencyRepository->findById($id);

        if($request->has('name')) {
            $currency->setName($request->getName());
        }
        if($request->has('short_name')) {
            $currency->setShortName($request->getShortName());
        }
        if($request->has('actual_course')) {
            $currency->setActualCourse($request->getActualCourse());
        }
        if($request->has('actual_course_date')) {
            $currency->setActualCourseDate($request->getActualCourseDate());
        }
        if($request->has('active')) {
            $currency->setIsActive($request->getIsActive());
        }

        $result = $this->currencyPresenter::present($currency);
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = $this->currencyRepository->findById($id);
        if($currency === null) {
            abort(404);
        }

        $this->currencyRepository->delete($currency);

        $result = $this->currencyPresenter::present($currency);
        return response()->json($result);
    }
}
