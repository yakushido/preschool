@extends('teacher.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\user_update.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/user_update.css') }}">
@endif

<div class="user_update">

    <h3>園児編集フォーム</h3>

    <div>

    <form action="{{ route('teacher.user_update', $user['id']) }}" method="POST">
        @csrf
        <div>
            <label for="name">名前：</label>
            <input type="text" name="name" value="{{ $user['name'] }}">
        </div>
        <div>
            <label for="team_id">クラス：</label>
            <select name="team_id">
                <option value="{{ $user['team_id'] }}">{{ $user['team']['name'] }}</option>
                @foreach( $team_lists as $team_list )
                <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="email">メールアドレス：</label>
            <input type="email" name="email" value="{{ $user['email'] }}">
        </div>
        <div class="user_update_flex">
        <div class="button">
            <button class="update_button">更新</button>
        </div>
    </form>

    <form action="{{ route('teacher.user_delete', $user['id']) }}" method="POST">
        @csrf
        <div class="button">
            <button class="delete_button">削除</button>
        </div>
    </form>
    </div>

    </div>
</div>

@endsection