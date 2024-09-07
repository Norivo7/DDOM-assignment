<?php

use App\Validator\Rules\DigitRule;
use App\Validator\Rules\LowercaseRule;
use App\Validator\Rules\PasswordLengthRule;
use App\Validator\Rules\SpecialCharRule;
use App\Validator\Rules\UppercaseRule;
use App\Validator\UserValidator;

require_once __DIR__ . '/vendor/autoload.php';

$testCases = [
    ['email' => 'johndoe@example.com', 'password' => 'StrongP@ssword1!'],
    ['email' => 'john.doe@example', 'password' => 'weakpassword'],
    ['email' => 'janedoe@example.co', 'password' => 'WeakP@ss'],
    ['email' => 'invalid@com', 'password' => 'NoSpecialChar1'],
    ['email' => 'user@domain.com', 'password' => 'MissingNumber!'],
    ['email' => 'valid.email@domain.com', 'password' => 'AllGood1!'],
    ['email' => 'valid.email@domain.com', 'password' => 'weak'],

];

$rules = [
    new PasswordLengthRule(),
    new UppercaseRule(),
    new LowercaseRule(),
    new DigitRule(),
    new SpecialCharRule(),
];

$validator = new UserValidator($rules);

$testCaseNumber = 1;

foreach ($testCases as $testCase) {
    $email = $testCase['email'];
    $password = $testCase['password'];

    echo "Test case $testCaseNumber\n";

    // emails
    echo "email: $email\n";
    echo match($validator->validateEmail($email)) {
        true => "email is valid.\n",
        false => "email is invalid: " . $validator->getLastError()->value . "\n"
    };

    // passwords
    echo "password: $password\n";
    if ($validator->validatePassword($password)) {
        echo "password is valid.\n";
    } else {
        echo "password is invalid due to the following reasons:\n";
        foreach ($validator->getPasswordErrors() as $error) {
            echo "- $error->value\n";
        }
    }
    echo "\n";
    $testCaseNumber++;

}

