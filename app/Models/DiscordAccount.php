<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscordAccount extends Model
{
    /** @use HasFactory<\Database\Factories\DiscordAccountFactory> */
    use HasFactory;

    protected $fillable = [
        'whitelist_id',
        'discord_id',
        'username',
        'public_name',
    ];

    public function whitelist()
    {
        return $this->belongsTo(Whitelist::class);
    }
}
