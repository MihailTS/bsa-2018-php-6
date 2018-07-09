<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Contracts\Currency\CurrencyRequest as CurrencyRequestContract;

class CurrencyRequest extends FormRequest implements CurrencyRequestContract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'actual_course' => 'numeric',
            'actual_course_date' => 'date_format:Y-m-d H-i-s',
            'active' => 'boolean'
        ];
    }

    public function getName(): ?string
    {
        return $this->get('name');
    }

    public function getShortName(): ?string
    {
        return $this->get('short_name');
    }

    public function getActualCourse(): ?float
    {
        return (float) $this->get('actual_course');
    }

    public function getActualCourseDate(): ?\DateTime
    {
        if(
            $this->has('actual_course_date') &&
            $dateFromRequest = \DateTime::createFromFormat(
                    'Y-m-d H-i-s',
                    $this->get('actual_course_date')
            )
        ){
            $actualCourseDate = $dateFromRequest;
        }else{
            $actualCourseDate = new \DateTime;
        }
        return $actualCourseDate;
    }

    public function getIsActive(): ?bool
    {
        return (bool) $this->get('active');
    }
}
