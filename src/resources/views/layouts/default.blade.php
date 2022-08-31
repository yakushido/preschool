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
    
    <div>
        <h1><a href="/">ABC保育園</a></h1>
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