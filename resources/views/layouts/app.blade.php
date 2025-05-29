<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'FashionablyLate 管理画面')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSSの読み込み --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    @stack('styles')
</head>
<body>
    <header style="text-align: center; padding: 20px 0; background-color: #fff;">
        <h1 style="font-size: 32px; font-family: serif; color: #7b6e63;">FashionablyLate</h1>
        <div style="text-align: right; margin: 10px 20px;">

        {{-- ログアウトリンク（特定画面では非表示） --}}
        @yield('show-logout')
        @if(View::hasSection('show-logout'))
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        style="border: 1px solid #cbfae; padding: 4px 12px; color: #cbfae; text-decoration: none;">
        @yield('logout-label', 'logout')
        </a>
        @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    <main style="background: @yield('background-color', '#f3ede7'); padding: 40px 0; min-height: 100vh;">
    <div style="width: 90%; max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; font-family: serif; font-size: 28px; margin-bottom: 30px;">
            @yield('heading', 'Login')
        </h2>
        @yield('content')
    </div>
</main>

    {{-- JavaScript読み込みが必要であればここに --}}
    <script src="{{ asset('js/modal.js') }}"></script>
    @stack('scripts')
</body>

</html>