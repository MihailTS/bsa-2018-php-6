<?php

namespace App\Http\Requests\Contracts\Currency;

interface CurrencyRequest
{
    public function getName(): ?string;

    public function getShortName(): ?string;

    public function getActualCourse(): ?float;

    public function getActualCourseDate(): ?\DateTime;

    public function getIsActive(): ?bool;
}
