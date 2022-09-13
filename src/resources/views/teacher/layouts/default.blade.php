<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <title>ABC保育園</title>
</head>
<body>

    <header class="default_header">

        <h1><a class="header_title" href="/">ABC保育園</a></h1>
        <div class="header_login">
            @if( Auth::check('teachers') )
            <h2>{{ Auth::user()['name'] }} 様</h2>
            <a href="/teacher/dashboard">マイページ</a>
            <form action="{{ route('teacher.logout') }}" method="POST">
                @csrf
                <button>logout</button>
            </form>
            @endif
        </div>

    </header>

    <main class="default_main">

        <!-- Validation Errors -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error_li">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @yield('contents')
        
    </main>

    <footer class="default_footer">

        <ul>
            <li><a href="">QRコード</a></li>
            <li><a href="/admin/login">管理者用ログイン</a></li>
            <li><a href="/teacher/login">教員用ログイン</a></li>
        </ul>
        
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
        $('.js-upload-file').on('change', function () { //ファイルが選択されたら
            var file = $(this).prop('files')[0]; //ファイルの情報を代入(file.name=ファイル名/file.size=ファイルサイズ/file.type=ファイルタイプ)
            $('.js-upload-filename').text(file.name); //ファイル名を出力
        });
        });
    </script>

</body>
</html>