@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('logout-label', 'Login')

@section('content')
<div class="form-wrapper">

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password" placeholder="例: coachtech1106">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div style="text-align: center;">
            <button type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection