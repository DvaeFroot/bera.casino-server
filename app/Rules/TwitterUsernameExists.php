<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class TwitterUsernameExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $domain = env('VALIDATION_API_DOMAIN');
            Http::timeout(10)->get("$domain/api/twitter?username=$value");
        } catch (\Exception $e) {
            $fail("An unexpected error occured while validating the Twitter username. Twitter username most likely does not exist");
        }
    }
}
