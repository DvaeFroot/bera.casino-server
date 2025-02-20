<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Whitelist>
 */
class WhitelistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $username = $this->faker->userName();
        return [
            'x_acc' => $username,
            'discord_acc' => $username,
            'telegram_acc' => $username,
            'berachain_add' => $this->faker->randomAscii(),
            'create_at' => $this->faker->dateTime()
        ];
    }
}
