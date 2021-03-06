<?php

namespace App\Services;

use App\Services\Contracts\CurrencyPresenter as CurrencyPresenterContract;

class CurrencyPresenter implements CurrencyPresenterContract
{
    /**
     * @param Currency $currency
     * @return array
     */
    public static function present(Currency $currency): array
    {
        return [
            'id' => $currency->getId(),
            'name' => $currency->getName(),
            'short_name' => $currency->getShortName(),
            'actual_course' => $currency->getActualCourse(),
            'actual_course_date' => $currency->getActualCourseDate()->format('Y-m-d H-i-s'),
            'active' => $currency->isActive()
        ];
    }
}