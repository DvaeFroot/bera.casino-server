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
            'xAcc' => $this->x_acc,
            'discordAcc' => $this->discord_acc,
            'telegramAcc' => $this->telegram_acc,
            'berachainAdd' => $this->berachain_add
        ];
    }
}
