@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endpush

@section('background-color', '#fffff')
@section('heading', 'Confirm')
@section('content')
    
    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <table class="confirm-table">
            <tr><th>お名前</th><td>{{ $inputs['last_name'] ?? '' }} {{ $inputs['first_name'] ?? '' }}</td></tr>
            <tr><th>性別</th><td>{{ $inputs['gender'] ?? '' }}</td></tr>
            <tr><th>メールアドレス</th><td>{{ $inputs['email'] ?? '' }}</td></tr>
            <tr><th>電話番号</th><td>{{ $inputs['tel'] ?? '' }}</td></tr>
            <tr><th>住所</th><td>{{ $inputs['address'] ?? '' }}</td></tr>
            <tr><th>建物名</th><td>{{ $inputs['building'] ?? '' }}</td></tr>
            <tr><th>お問い合わせの種類</th><td>{{ $inputs['category'] ?? '' }}</td></tr>
            <tr><th>お問い合わせ内容</th><td>{{ $inputs['content'] ?? '' }}</td></tr>
        </table>

        {{-- hidden --}}
        @foreach ($inputs as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="buttons">
            <button type="submit">送信</button>
        </div>
    </form>

    <form method="GET" action="{{ route('contact.create') }}">
        @foreach ($inputs as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="buttons">
            <button type="submit">修正</button>
        </div>
    </form>
@endsection