<?php

namespace App\Validator\Rules;

use App\Enums\ValidationError;

class LowercaseRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return preg_match('/[a-z]/', $input) ? true : ValidationError::NO_LOWERCASE;
    }
}