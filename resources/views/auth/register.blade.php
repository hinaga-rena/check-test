@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
<div class="register-container">
    <h2 class="title">Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">お名前 <span class="required">※</span></label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="例：山田　太郎" required autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">メールアドレス <span class="required">※</span></label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード <span class="required">※</span></label>
            <input id="password" type="password" name="password" placeholder="例：coachtech1106" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="register-button">
                登録
            </button>
        </div>
    </form>
</div>
@endsection