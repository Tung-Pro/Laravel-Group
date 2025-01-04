<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailDomain implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Kiểm tra email có đuôi @deha-soft.com
        if (!str_ends_with($value, '@deha-soft.com')) {
            $fail('The :attribute must end with @deha-soft.com.');
        }
    }
}
