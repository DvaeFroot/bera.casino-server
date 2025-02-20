<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    /** @use HasFactory<\Database\Factories\WhitelistFactory> */
    use HasFactory;

    protected $fillable = [
        'x_acc',
        'discord_acc',
        'telegram_acc',
        'berachain_add',
    ];
}
