<?php

namespace Database\Seeders;

use App\Models\Whitelist;
use Illuminate\Database\Seeder;

class WhitelistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Whitelist::factory()
            ->count(10)
            ->hasTwitterAccounts(1)
            ->hasDiscordAccounts(1)
            ->hasTelegramAccounts(1)
            ->create();
    }
}
