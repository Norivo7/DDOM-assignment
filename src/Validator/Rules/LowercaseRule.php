<?php

declare(strict_types=1);

namespace App\Validator\Rules;

use App\Enums\ValidationError;

final class LowercaseRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return preg_match('/[a-z]/', $input) ? true : ValidationError::NO_LOWERCASE;
    }
}
