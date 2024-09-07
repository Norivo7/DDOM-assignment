<?php

declare(strict_types=1);

namespace App\Validator;

use App\Enums\ValidationError;
use App\Validator\Rules\RuleInterface;

final class UserValidator
{
    private ?ValidationError $lastError = null;

    public function __construct(
        private readonly array $rules
    ) {}

    public function validateEmail(string $email): bool
    {
        $regex = '/^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z]+\.[a-zA-Z]{2,}$/';

        if (preg_match($regex, $email)) {
            $this->lastError = null;
            return true;
        }

        $this->lastError = ValidationError::INVALID_EMAIL_FORMAT;
        return false;
    }

    public function validatePassword(string $password): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule instanceof RuleInterface) {
                throw new \InvalidArgumentException('Each rule must implement RuleInterface');
            }

            $result = $rule->validate($password);
            if ($result !== true) {
                $this->lastError = $result;
                return false;
            }
        }

        $this->lastError = null;
        return true;
    }

    public function getLastError(): ?ValidationError
    {
        return $this->lastError;
    }
}