<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <title>Document</title>
</head>

<body>

<header>

    <h1><a href="/">ABC保育園</a></h1>
    <div>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

</header>

<main>
    @yield('contents')
</main>

<footer>

    <div>
        <a href="/admin/login">管理者用ログイン</a>
        <a href="/teacher/login">教員用ログイン</a>
    </div>

</footer>

</body>

</html>