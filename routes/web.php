<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

#region Socialite logins

Route::get('login/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github.redirect');

Route::get('auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::query()->firstOrCreate(['email' => $githubUser->getEmail()], [
        'name' => $githubUser->getName(),
        'password' => bcrypt(Str::random(10)),
    ]);

    Auth::login($user);
    return redirect('/admin');
});

#endregion