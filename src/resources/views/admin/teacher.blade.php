@extends('admin.admin_layouts.admin_default')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('css/teacher.css') }}">

<div class="teacher">
  <div class="user_list">
    <div>
      <h2>担当クラス：{{ $teacher['team']['name'] }}組</h2>
      <h2>担当者：{{ $teacher['name'] }}</h3>
    </div>
    <div>
      <h3>{{ $teacher['team']['name'] }}組園児リスト</h3>
      @if ($errors->has('date'))
        <li class="error_messages">{{ $errors->first('date') }}</li>
      @endif
      <ul>
        @foreach($team_users as $team_user)
        <li><a href="/admin/user/detail/{{ $team_user['id'] }}">{{ $team_user['name']}}</a></li>
        <li>
          <form action="{{ route('attendance.add') }}" method="POST">
          @csrf
            <input type="date" name="date">
            <input type="text" name="id" value="{{ $team_user['id'] }}" hidden>
            <input class="attend_btn" type="submit" name="attend" value="出席">
            <input class="absence_btn" type="submit" name="absence" value="欠席">
          </form>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="total_attendance">
    <h3>出席簿</h3>
    <div>
      <form action="{{ route('teacher.search') }}" method="POST">
      @csrf
        <input type="date" name="from" placeholder="from_date">
        <span>～<span>
        <input type="date" name="until" placeholder="until_date">
        <div class="search_btn">
          <button>検索</button>
        </div>
      </form>
    </div>
    @foreach( $team_users as $team_user )
    <table>
      <tr>
        <th>{{ $team_user['name'] }}</th>
      </tr>
      @foreach( $attendances as $attendance )
      <tr>
        @if( $team_user['name'] == $attendance['user']['name'] )
        <td>{{ substr($attendance['date'], 5,5) }}</td>
        <td>{{ $attendance['attendance']['name'] }}</td>
        <td>
          <form action="{{ route('attendance.update', ['id' => $attendance['id']]) }}" method="POST">
          @csrf
            <button class="update_btn">変更</button>
          </form>
        </td>
        <td>
          <form action="{{ route('attendance.delete', ['id' => $attendance['id']]) }}" method="POST">
          @csrf
            <button class="delete_btn">削除</button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
    </table>
    @endforeach
  </div>
</div>
@endsection