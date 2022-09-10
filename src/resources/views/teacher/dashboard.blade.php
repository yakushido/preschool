@extends('teacher.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/teacher_dashboard.css') }}">

<div class="dashboard">

    <h3>教員用ページ</h3>

    <div class="user_list">

        <h4>{{ $teacher['team']['name'] }}組園児リスト</h4>
        
        <table class="user_list_table">
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
                    <form action="{{ route('teacher.attendance.add',$team_user['id']) }}" method="POST" class="user_list_table_form">
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

<div class="category">

    <div class="category_mail">    
        <a href="/teacher/mail">
            <img src="/storage/img/icon_mail.jpg" alt="">
            <span>メールの送信</span>  
        </a>
    </div>

    <div class="category_blog">
        <a href="/teacher/blog">
            <img src="/storage/img/icon_blog.jpg" alt="">
            <span>ブログの追加</span>
        </a>
    </div>

    <div class="category_photo">
        <a href="/teacher/photo">
            <img src="/storage/img/icon_photo.jpg" alt="">
            <span>写真の追加</span>
        </a>
    </div>

    <div class="category_event">
        <a href="{{ route('teacher.event') }}">
            <img src="/storage/img/icon_event.jpg" alt="">
            <span>イベントの追加</span>
        </a>
    </div>

    <div class="category_user">
        <a href="/register">
            <img src="/storage/img/icon_user.jpg" alt="">
            <span>園児の追加</span>
        </a>
    </div>
    
</div>





@endsection