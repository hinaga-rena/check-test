@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('content')
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password" placeholder="例: coachtech1106">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">ログイン</button>
    </form>
@endsection
