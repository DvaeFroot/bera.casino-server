<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreWhitelistRequest;
use App\Http\Resources\V1\WhitelistCollection;
use App\Http\Resources\V1\WhitelistResource;
use App\Models\TwitterAccount;
use App\Models\DiscordAccount;
use App\Models\TelegramAccount;
use Illuminate\Support\Facades\DB;
use App\Models\Whitelist;
use PDO;

class WhitelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whitelists = Whitelist::with(['twitterAccounts', 'discordAccounts', 'telegramAccounts'])->get();

        return new WhitelistCollection($whitelists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWhitelistRequest $request)
    {
        DB::beginTransaction();

        try {
            $whitelist = Whitelist::create([
                'berachain_add' => $request->berachain_add
            ]);

            if ($request->has('twitter_acc')) {
                $twitterAccountData = $request->input('twitter_acc');
                TwitterAccount::create(
                    [
                        'whitelist_id' => $whitelist->id,
                        'username' => $twitterAccountData['username'],
                        'public_name' => $twitterAccountData['public_name']
                    ],
                );
            }

            if ($request->has('discord_acc')) {
                $discordAccountData = $request->input('discord_acc');
                DiscordAccount::create(
                    [
                        'whitelist_id' => $whitelist->id,
                        'username' => $discordAccountData['username'],
                        'public_name' => $discordAccountData['public_name']
                    ],
                );
            }

            if ($request->has('telegram_acc')) {
                $telegramAccountData = $request->input('telegram_acc');
                TelegramAccount::create(
                    [
                        'whitelist_id' => $whitelist->id,
                        'username' => $telegramAccountData['username'],
                        'public_name' => $telegramAccountData['public_name']
                    ],
                );
            }

            DB::commit();

            $whitelistWithRelations = Whitelist::with(['twitterAccounts', 'discordAccounts', 'telegramAccounts'])->find($whitelist->id);
            return new WhitelistResource($whitelistWithRelations);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'There was an error saving the data.',
                'message' => $e->getMessage()
            ]);
        }
    }
}
