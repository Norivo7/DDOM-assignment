<?php

declare(strict_types=1);

namespace App\Validator\Rules;

use App\Enums\ValidationError;

class PasswordLengthRule implements RuleInterface
{
    public function validate(string $input): bool | ValidationError
    {
        return strlen($input) >= 8 ? true : ValidationError::PASSWORD_TOO_SHORT;
    }
}
