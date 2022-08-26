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

    <h1><a href="/teacher/dashboard">ABC保育園</a></h1>
        <div class="header_login">
            @if( Auth::check() )
            <h2>{{ Auth::user()['name'] }} 様</h2>
            <form action="{{ route('teacher.logout') }}" method="POST">
                @csrf
                <button>logout</button>
            </form>
            @endif
        </div>

    </header>

    <main>
        @yield('contents')
    </main>

</body>
</html>