@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endpush

@section('content')
<div class="thanks-container">
    <p class="thanks-message">お問い合わせありがとうございました</p>
    <a href="{{ route('contact.create') }}">
        <button class="home-button">HOME</button>
    </a>
</div>
@endsection