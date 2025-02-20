<?php


namespace App\Http\Controllers;
use App\Models\Whitelist;
use Illuminate\Http\JsonResponse;
//use Illuminate\Http\Requests;

class WhitelistController extends Controller
{
    public function index(): JsonResponse
    {
        $whitelist = Whitelist::all();

        return response()->json($whitelist, 200);
    }
}
