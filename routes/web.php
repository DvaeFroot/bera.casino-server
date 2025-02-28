<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function () {
    $credentials = [
        'email' => env("MAIL_FROM_ADDRESS"),
        'password' => env("MAIL_PASSWORD"),
    ];

    if (!Auth::attempt($credentials)) {
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);

        return [
            'admin' => $adminToken->plainTextToken,
        ];
    }
});
