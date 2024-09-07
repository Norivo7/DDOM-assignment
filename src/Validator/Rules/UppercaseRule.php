<?php

namespace App\Validator\Rules;

use App\Enums\ValidationError;

class UppercaseRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return preg_match('/[A-Z]/', $input) ? true : ValidationError::NO_UPPERCASE;
    }
}