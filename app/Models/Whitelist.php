<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    /** @use HasFactory<\Database\Factories\WhitelistFactory> */
    use HasFactory;

    protected $fillable = [
        'berachain_add',
    ];

    public function twitterAccounts()
    {
        return $this->hasOne(TwitterAccount::class);
    }

    public function discordAccounts()
    {
        return $this->hasOne(DiscordAccount::class);
    }

    public function telegramAccounts()
    {
        return $this->hasOne(TelegramAccount::class);
    }
}
