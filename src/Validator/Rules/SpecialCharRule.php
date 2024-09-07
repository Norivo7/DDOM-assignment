<?php

namespace App\Validator\Rules;

use App\Enums\ValidationError;

class SpecialCharRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return preg_match('/[\W_]/', $input) ? true : ValidationError::NO_SPECIAL_CHAR;
    }
}