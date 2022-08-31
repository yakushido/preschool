@extends('teacher.layouts.default')
@section('contents')

<div>
    <h2>教員用ページ</h2>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

<div>
    <div class="user_list">
        <h3>{{ $teacher['team']['name'] }}組園児リスト</h3>
        <table>
            <tr>
                <th>名前</th>
                <th>今日の出欠</th>
            </tr>
            @foreach($team_users as $team_user)
            <tr>
                <td>
                    <a href="{{ route('teacher.user_detail',[ 'id' => $team_user['id'] ]) }}">{{ $team_user['name'] }}</a>
                </td>
                <td>
                    @if( $team_user['UserAttendances']->where('date','=',\Carbon\Carbon::now()->format("Y-m-d"))->where('user_id','=',$team_user['id'])->first() === null )
                    <form action="{{ route('teacher.attendance.add',$team_user['id']) }}" method="POST">
                        @csrf
                        <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
                        <select name="attendance_id">
                            @foreach( $attendance_lists as $attendance_list )
                            <option value="{{ $attendance_list['id'] }}">{{ $attendance_list['name'] }}</option>
                            @endforeach
                        </select>
                        <button>追加</button>
                    </form>
                    @else
                    <p>入力済み</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="mail">
    <a href="/teacher/mail">メールの送信はこちらから</a>
    <a href="/teacher/blog">ブログの追加はこちら</a>
    <a href="/teacher/photo">写真の追加はこちら</a>
    <a href="{{ route('teacher.event') }}">イベントの追加はこちら</a>
    <a href="/register">園児の追加はこちら</a>
</div>





@endsection