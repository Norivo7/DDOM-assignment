<?php

namespace App\Validator\Rules;

use App\Enums\ValidationError;

interface RuleInterface
{
    public function validate(string $input): bool | ValidationError;
}