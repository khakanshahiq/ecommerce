<?php
// app/Rules/PasswordComplexityRule.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordComplexityRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the password meets complexity requirements
        $length = strlen($value);
        //$hasUppercase = preg_match('/[A-Z]/', $value);
         $startsUppercase = ctype_upper(substr($value, 0, 1));
        $hasNumber = preg_match('/[0-9]/', $value);
        $hasSpecialCharacter = preg_match('/[^A-Za-z0-9]/', $value);

        return $length >= 8 && $startsUppercase && $hasNumber && $hasSpecialCharacter;
    }

    public function message()
    {
        return 'The password must start with captial letter,attribute must be at least 8 characters long , one number, and one special character.';
    }
}


?>