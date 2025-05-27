@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <h1 class="page-title">お問い合わせ一覧</h1>

    <form method="GET" action="{{ route('admin.index') }}" class="search-form">
        <input type="text" name="name" placeholder="名前を入力してください" value="{{ request('name') }}">
        <input type="text" name="email" placeholder="メールアドレスを入力してください" value="{{ request('email') }}">

        <select name="gender">
            <option value="">性別</option>
            <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
            <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
            <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>

        <select name="category">
            <option value="">お問い合わせの種類</option>
            <option value="商品について" {{ request('category') == '商品について' ? 'selected' : '' }}>商品について</option>
            <option value="交換について" {{ request('category') == '交換について' ? 'selected' : '' }}>交換について</option>
            <option value="その他" {{ request('category') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>

        <input type="date" name="date" value="{{ request('date') }}">

        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}"><button type="button">リセット</button></a>
        <a href="{{ route('admin.export', request()->query()) }}"><button type="button">エクスポート</button></a>
    </form>

    <br>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>お名前</th>
                <th>メールアドレス</th>
                <th>性別</th>
                <th>お問い合わせの種類</th>
                <th>登録日</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->category }}</td>
                    <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                    <td><button class="detail-button" data-contact='@json($contact)'>詳細</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}

    <!-- ▼ モーダル -->
    <div id="detail-modal" class="modal-overlay">
        <div class="modal-content">
            <span id="modal-close" class="modal-close">&times;</span>
            <table>
                <tr><th>お名前</th><td id="modal-name"></td></tr>
                <tr><th>性別</th><td id="modal-gender"></td></tr>
                <tr><th>メールアドレス</th><td id="modal-email"></td></tr>
                <tr><th>電話番号</th><td id="modal-tel"></td></tr>
                <tr><th>住所</th><td id="modal-address"></td></tr>
                <tr><th>建物名</th><td id="modal-building"></td></tr>
                <tr><th>お問い合わせの種類</th><td id="modal-category"></td></tr>
                <tr><th>お問い合わせ内容</th><td id="modal-content"></td></tr>
            </table>

            <form id="delete-form" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">削除</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('detail-modal');
            const closeBtn = document.getElementById('modal-close');
            const deleteForm = document.getElementById('delete-form');
            const detailButtons = document.querySelectorAll('.detail-button');

            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const data = JSON.parse(button.dataset.contact);
                    document.getElementById('modal-name').textContent = data.name;
                    document.getElementById('modal-gender').textContent = data.gender;
                    document.getElementById('modal-email').textContent = data.email;
                    document.getElementById('modal-tel').textContent = data.tel;
                    document.getElementById('modal-address').textContent = data.address;
                    document.getElementById('modal-building').textContent = data.building;
                    document.getElementById('modal-category').textContent = data.category;
                    document.getElementById('modal-content').textContent = data.content;
                    deleteForm.action = `/admin/${data.id}`;
                    modal.style.display = 'flex';
                });
            });

            closeBtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });
    </script>
@endsection