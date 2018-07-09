<?php

namespace App\Services;

use GuzzleHttp\Client;

class CurrencyGenerator
{
    const CURRENCY_LIST_API_URL = 'https://api.coinmarketcap.com/v2/ticker/';

    /**
     * @return array
     */
    public static function generate(): array
    {
        $client = new Client();
        $data = $client->get(self::CURRENCY_LIST_API_URL)->getBody();
        $currenciesData = json_decode($data)->data;
        $currencies = [];

        //Currencies I've got from API are all active.
        //So I'll set isActive property false for all currencies with even id ¯\_(ツ)_/¯
        foreach ($currenciesData as $currency){
            $actualCourseDateTime = new \DateTime();
            $actualCourseDateTime->setTimestamp($currency->last_updated);
            $currencies[$currency->id] = new Currency(
                $currency->id,
                $currency->name??"",
                $currency->symbol??"",
                $currency->quotes->USD->price??0,
                $actualCourseDateTime,
                $currency->id % 2
            );
        }
        return $currencies;
    }
}