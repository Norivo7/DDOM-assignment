<?php

declare(strict_types=1);

namespace App\Validator;

use App\Enums\ValidationError;
use App\Validator\Rules\RuleInterface;
use InvalidArgumentException;

final class Validator
{
    private array $passwordErrors = [];
    private ?ValidationError $lastError = null;

    /**
     * @param RuleInterface[] $rules
     */
    public function __construct(
        private readonly array $rules
    ) {
    }

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
        $this->passwordErrors = [];

        foreach ($this->rules as $rule) {
            if (!$rule instanceof RuleInterface) {
                throw new InvalidArgumentException('Invalid rule.');
            }

            $result = $rule->validate($password);
            if ($result !== true) {
                $this->passwordErrors[] = $result;
            }
        }

        return count($this->passwordErrors) === 0;
    }

    public function getPasswordErrors(): array
    {
        return $this->passwordErrors;
    }

    public function getLastError(): ?ValidationError
    {
        return $this->lastError;
    }
}
