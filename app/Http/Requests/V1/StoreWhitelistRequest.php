<?php

namespace App\Http\Requests\V1;

use App\Rules\TwitterUsernameExists;
use App\Rules\DiscordIdExists;
use App\Rules\TelegramUsernameExists;
use Illuminate\Foundation\Http\FormRequest;

class StoreWhitelistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'berachainAdd'              => ['required', 'string'],
            'twitterAcc.username'       => ['required', 'string', new TwitterUsernameExists],
            'twitterAcc.publicName'     => ['required', 'string'],
            'discordAcc.discordId'      => ['required', 'string', new DiscordIdExists],
            'discordAcc.username'       => ['required', 'string'],
            'discordAcc.publicName'     => ['required', 'string'],
            'telegramAcc.username'      => ['required', 'string', new TelegramUsernameExists],
            'telegramAcc.publicName'    => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'berachain_add'     => $this->input('berachainAdd'),
            'twitter_acc' => [
                'username'      => $this->input('twitterAcc.username'),
                'public_name'   => $this->input('twitterAcc.publicName'),
            ],
            'discord_acc' => [
                'discord_id'    => $this->input('discordAcc.discordId'),
                'username'      => $this->input('discordAcc.username'),
                'public_name'   => $this->input('discordAcc.publicName'),
            ],
            'telegram_acc' => [
                'username'      => $this->input('telegramAcc.username'),
                'public_name'   => $this->input('telegramAcc.publicName'),
            ]
        ]);
    }
}
