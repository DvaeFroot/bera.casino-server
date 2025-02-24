<?php

namespace Database\Factories;

use App\Models\Whitelist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TelegramAccount>
 */
class TelegramAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'whitelist_id' => Whitelist::factory(),
            'username' => $this->faker->userName(),
            'public_name' => $this->faker->userName(),
        ];
    }
}
