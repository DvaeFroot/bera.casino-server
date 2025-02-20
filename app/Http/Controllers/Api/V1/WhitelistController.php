<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreWhitelistRequest;
use App\Http\Resources\V1\WhitelistCollection;
use App\Http\Resources\V1\WhitelistResource;
use App\Models\Whitelist;

class WhitelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new WhitelistCollection(Whitelist::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWhitelistRequest $request)
    {
        return new WhitelistResource(Whitelist::create($request->all()));
    }
}
