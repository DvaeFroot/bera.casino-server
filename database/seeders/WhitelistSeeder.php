<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WhitelistSeeder extends Seeder
{
    public function run()
    {
        DB::table('whitelists')->insert([
            [
                "xAcc" => "@x-username",
                "discordAcc" => "@discord-username",
                "telegramAcc" => "@telegram-account",
                "berachainAdd" => "dsa123123dasdTSAFasdf234",
                "createdAt" => Carbon::now(),
            ],
            [
                "xAcc" => "@another-x-user",
                "discordAcc" => "@another-discord",
                "telegramAcc" => "@another-telegram",
                "berachainAdd" => "asdzxczxc23423ewrasdf",
                "createdAt" => Carbon::now(),
            ],
            [
                "xAcc" => "@sepirothx-x-villain",
                "discordAcc" => "@sepirothx-discord",
                "telegramAcc" => "@sepirothx-telegram",
                "berachainAdd" => "weragwer2342dzg3245",
                "createdAt" => Carbon::now(),
            ]
        ]);
    }
}
