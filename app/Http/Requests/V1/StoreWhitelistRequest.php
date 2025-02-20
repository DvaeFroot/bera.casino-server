<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreWhitelistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'xAcc' => ['required'],
            'discordAcc' => ['required'],
            'telegramAcc' => ['required'],
            'berachainAdd' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'x_acc' => $this->xAcc,
            'discord_acc' => $this->discordAcc,
            'telegram_acc' => $this->telegramAcc,
            'berachain_add' => $this->berachainAdd
        ]);
    }
}
