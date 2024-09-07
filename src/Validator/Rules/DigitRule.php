<?php

namespace App\Validator\Rules;

use App\Enums\ValidationError;

class DigitRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return preg_match('/\d/', $input) ? true : ValidationError::NO_DIGIT;
    }
}