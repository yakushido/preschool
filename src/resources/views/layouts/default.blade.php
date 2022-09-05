<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <title>Document</title>
</head>

<body class="default_body">
<div>
    <header class="default_header">
        
        <h1><a class="header_title" href="/">ABC保育園</a></h1>
        <div class="header_login">
            @if( Auth::check('users') )
            <h2>{{ Auth::user()['name'] }} 様</h2>
            <a href="/dashboard">マイページ</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>logout</button>
            </form>
            @endif
        </div>

    </header>

    <main>
        @yield('contents')
    </main>

    <footer class="default_footer">

        <ul>
            <li><a href="">QRコード</a></li>
            <li><a href="/admin/login">管理者用ログイン</a></li>
            <li><a href="/teacher/login">教員用ログイン</a></li>
        </ul>
        
    </footer>

</body>

</html>