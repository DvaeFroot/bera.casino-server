<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class TelegramUsernameExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /*try {*/
        /*    $domain = env('VALIDATION_API_DOMAIN');*/
        /*    $response = Http::timeout(10)->get("$domain/api/telegram?username=$value");*/
        /*    $data = $response->json();*/
        /*    if (is_array($data) && array_key_exists('error', $data)) {*/
        /*        $fail("Telegram username doesn't exist.");*/
        /*    }*/
        /*} catch (\Exception $e) {*/
        /*    $fail("An unexpected error occured while validating the Telegram username. Telegram username most likely does not exist");*/
        /*}*/
    }
}
