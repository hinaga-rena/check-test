<?php

namespace App\Providers;

use App\Http\Requests\LoginRequest;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // 登録画面のビュー指定
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ログイン画面のビュー指定
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // ログイン認証ロジックの定義（バリデーション付き）
        Fortify::authenticateUsing(function (LoginRequest $request) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return Auth::user();
            }

            return null;
        });

        // ユーザー登録の処理バインド
        Fortify::createUsersUsing(CreateNewUser::class);
    }
}