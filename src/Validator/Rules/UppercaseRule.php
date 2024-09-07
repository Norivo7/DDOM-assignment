<?php

declare(strict_types=1);

namespace App\Validator\Rules;

use App\Enums\ValidationError;

final class UppercaseRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return preg_match('/[A-Z]/', $input) ? true : ValidationError::NO_UPPERCASE;
    }
}