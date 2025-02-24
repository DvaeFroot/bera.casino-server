<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WhitelistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'berachainAdd' => $this->berachain_add,
            'twitterAcc' => new TwitterAccountResource($this->whenLoaded('twitterAccounts')),
            'discordAcc' => new DiscordAccountResource($this->whenLoaded('discordAccounts')),
            'telegramAcc' => new TelegramAccountResource($this->whenLoaded('telegramAccounts')),
        ];
    }
}
