@extends('teacher.layouts.default')
@section('contents')

<div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">氏名：

            <input id="name" type="text" name="name" :value="old('name')" autofocus />
        </div>

        <!-- class -->
        <div>
            <label for="team_id">クラス：

            <select name="team_id">
                @foreach( $team_lists as $team_list )
                <option value="{{  $team_list['id'] }}">{{ $team_list['name'] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">メールアドレス：

            <input id="email" type="email" name="email" :value="old('email')" />
        </div>

        <!-- Password -->
        <div>
            <label for="password">パスワード：

            <input id="password"
                            type="password"
                            name="password"
                            autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">パスワード（確認用）：

            <input id="password_confirmation"
                            type="password"
                            name="password_confirmation" />
        </div>

        <div>
            <button>登録</button>
        </div>

    </form>

</div>

@endsection
