<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhitelistController;


Route::get('/whitelist', [WhitelistController::class, 'index']);
