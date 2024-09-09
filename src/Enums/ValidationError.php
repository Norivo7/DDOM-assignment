<?php

namespace App\Enums;

enum ValidationError: string
{
    case PASSWORD_TOO_SHORT = 'Password must be at least 8 characters long.';
    case NO_UPPERCASE = 'Password must include at least one uppercase letter.';
    case NO_LOWERCASE = 'Password must include at least one lowercase letter.';
    case NO_DIGIT = 'Password must include at least one digit.';
    case NO_SPECIAL_CHAR = 'Password must include at least one special character.';

    case INVALID_EMAIL_FORMAT = 'Invalid email format.';
}
