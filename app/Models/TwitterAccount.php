<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterAccount extends Model
{
    /** @use HasFactory<\Database\Factories\TwitterAccountFactory> */
    use HasFactory;

    protected $fillable = [
        'whitelist_id',
        'username',
        'public_name',
    ];

    public function whitelist()
    {
        return $this->belongsTo(Whitelist::class);
    }
}
