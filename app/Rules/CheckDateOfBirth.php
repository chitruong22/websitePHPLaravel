<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckDateOfBirth implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 10;
        return (new DateTime)->diff(new DateTime($value))->y >= $minAge;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Năm sinh nhỏ hơn năm hiện tại ít nhất 10 năm';
    }
}
