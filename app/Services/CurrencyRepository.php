<?php

namespace App\Services;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    /**
     * @param Currency[]
     */
    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * @return Currency[]
     */
    public function findAll(): array
    {
        return $this->currencies;
    }

    public function findActive(): array
    {
        return array_filter($this->currencies, function($currency){
            /**
             * @var Currency $currency
             */
            return $currency->isActive();
        });
    }

    public function findById(int $id): ?Currency
    {
        return key_exists($id,$this->currencies)?$this->currencies[$id]:null;
    }

    public function save(Currency $currency): void
    {
        $this->currencies[$currency->getId()] = $currency;
    }

    public function delete(Currency $currency): void
    {
        unset($this->currencies[$currency->getId()]);
    }

    public function getLastID(): int
    {
        if(count($this->currencies) === 0){
            return 0;
        }
        return max(array_keys($this->currencies));
    }
}