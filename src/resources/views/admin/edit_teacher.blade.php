@extends('admin.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\edit_teacher.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/edit_teacher.css') }}">
@endif

<div class="teacher_lists">

    <h3>教員編集フォーム</h3>

    <div class="team_lists">
    @foreach( $teacher_team_lists as $teacher_team_list )
    <h3>{{ $teacher_team_list['name'] }}組</h3>
    <div>
        @foreach( $teacher_lists as $teacher_list )
            @if( $teacher_team_list['id'] === $teacher_list['team_id'])
                <div class="team_list">
                    <form action="{{ route('admin.teacher_update',$teacher_list['id']) }}" method="POST">
                        @csrf
                        <ul>
                            <li>
                                <label for="name">名前：</label>
                                <input type="text" name="name" value="{{ $teacher_list['name'] }}">
                            </li>
                            <li>
                                <label for="email">メールアドレス：</label>
                                <input type="email" name="email" value="{{ $teacher_list['email'] }}">
                            </li>
                            <li>
                                <label for="team_id">担当クラス：</label>
                                <select name="team_id">
                                    <option value="{{ $teacher_list['team_id'] }}">{{ $teacher_list['team']['name'] }}</option>
                                    @foreach( $team_lists as $team_list )
                                    <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                        <div class="team_lists_flex">
                        <div class="button">
                            <button class="update_button">更新</button>
                        </div>
                    </form>
                    <form action="{{ route('admin.teacher_delete', $teacher_list['id']) }}" method="POST">
                        @csrf
                        <div class="button">
                            <button class="delete_button">削除</button>
                        </div>
                    </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @endforeach
    </div>
</div>

@endsection