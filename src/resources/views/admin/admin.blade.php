@extends('admin.admin_layouts.admin_default')
@section('admin_content')
  <div>

    <div class="teacher_list">
      <h2>教員一覧</h2>
      <table>
        <tr>
          <th>名前</th>
          <th>担当クラス</th>
          <th>メールアドレス</th>
        </tr>
        @foreach($teachers as $teacher)
          <tr>
            <td><a href="/admin/update/{{ $teacher['id'] }}">{{ $teacher['name'] }}</a></td>
            <td>{{ $teacher['team']['name'] }}</td>
            <td>{{ $teacher['email'] }}</td>
            <td class="teacher_delete">
              <form action="{{ route('admin.delete') }}" method='POST'>
              @csrf
                <input type="text" name="id" value="{{ $teacher['id'] }}" hidden>
                <button>削除</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>

    <div class="teacher_add">
      <form action="{{ route('admin.add') }}" method="POST">
      @csrf
        <div>
          <label>名前：</label><input type="text" name="name">
        </div>
        <div>
          <h2>教員の追加</h2>
          <label>担当クラス：</label>
          <select name="team_id">
            @foreach($team_lists as $team_list)
              <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>メールアドレス</label>
          <input type="email" name="email">
        </div>
        <div>
          <label>パスワード</label>
          <input type="text" name="password">
        </div>
        <button>追加</button>
      </form>
    </div>

  </div>
@endsection