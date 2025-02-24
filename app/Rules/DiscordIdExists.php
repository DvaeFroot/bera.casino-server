<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class DiscordIdExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $response = Http::timeout(10)->get("https://discordlookup.mesalytic.moe/v1/user/$value");
            $data = $response->json();
            if (array_key_exists('message', $data)) {
                $fail("Discord ID does not exist.");
            }
        } catch (\Exception $e) {
            $fail("An unexpected error occured while validating the Discord ID. Discord ID most likely does not exist");
        }
    }
}
