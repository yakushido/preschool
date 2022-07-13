@extends('admin.admin_layouts.admin_default')
@section('admin_content')
  <div>
    <form action="{{ route('admin.update', $teacher_detail['id']) }}" method="POST">
    @csrf
      <table>
        <tr>
          <th>名前</th>
          <th>担当クラス</th>
          <th>メールアドレス</th>
        </tr>
          <tr>
            <td><input type="text" name="name" value="{{ $teacher_detail['name'] }}"></td>
            <td>
              <select name="team_id">
                @foreach($team_lists as $team_list)
                  <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
                @endforeach
              </select>
            </td>
            <td><input type="email" name="email" value="{{ $teacher_detail['email'] }}"></td>
          </tr>
      </table>
      <div>
        <button>変更</button>
      </div>
    </form>
  </div>
@endsection