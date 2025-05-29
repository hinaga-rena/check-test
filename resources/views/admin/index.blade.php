@extends('layouts.app')

@push('styles')

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endpush

@section('show-logout')
@endsection

@section('logout-label', 'logout')
@section('heading', 'Admin')

@if(View::hasSection('show-logout'))
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        style="border: 1px solid #cbfae; padding: 4px 12px; color: #cbfae; text-decoration: none;">
        @yield('logout-label', 'logout')
    </a>
@endif
@section('content')

<div class="container">
    <form method="GET" action="{{ route('admin.index') }}" class="search-form">
    <div class="search-group">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
            <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
            <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>
    </div>
    </form>

    <form method="GET" action="{{ route('admin.export') }}">
        <input type="hidden" name="keyword" value="{{ request('keyword') }}">
        <input type="hidden" name="gender" value="{{ request('gender') }}">
        <input type="hidden" name="category" value="{{ request('category') }}">
        <input type="hidden" name="date" value="{{ request('date') }}">
        <button type="submit">エクスポート</button>
    </form>

    <table class="contact-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ $contact->gender === 'male' ? '男性' : ($contact->gender === 'female' ? '女性' : 'その他') }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->name}}</td>
                <td>
                <button class="detail-button"
                    data-id="{{ $contact->id }}"
                    data-name="{{ $contact->last_name }}　{{ $contact->first_name }}"
                    data-gender="{{ $contact->gender }}"
                    data-email="{{ $contact->email }}"
                    data-tel="{{ $contact->tel }}"
                    data-address="{{ $contact->address }}"
                    data-building="{{ $contact->building }}"
                    data-category="{{ $contact->category->name }}"
                    data-content="{{ $contact->content }}"
                    data-delete-url="{{ route('admin.destroy', $contact->id) }}"
                >詳細</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contacts->appends(request()->query())->links() }}
</div>

@include('admin.modal')
@endsection
