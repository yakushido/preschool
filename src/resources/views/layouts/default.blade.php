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
<body>
    <header>
        <h1>ABC保育園</h1>
        <div>
            @if( Auth::check() )
            <h2>{{ Auth::user()['name'] }} 様</h2>
            <a href="">logout</a>
            @endif
        </div>

    </header>

    <main>
        @yield('contents')
    </main>

</body>
</html>