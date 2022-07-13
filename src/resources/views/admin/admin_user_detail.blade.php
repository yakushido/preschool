@extends('admin.admin_layouts.admin_default')
@section('admin_content')

  <div class="admin_user_detail">
    <h2>生徒詳細</h2>
    <table>
      <tr>
        <td>名前：</td>
        <td>{{ $admin_user['name'] }}</td>
      </tr>
      <tr>
        <td>性別：</td>
        <td>{{ $admin_user['gender']['name'] }}</td>
      </tr>
      <tr>
        <td>メールアドレス：</td>
        <td>{{ $admin_user['email'] }}</td>
      </tr>
      <tr>
        <td>誕生日：</td>
        <td>{{ $admin_user['birthday'] }}</td>
      </tr>
    </table>
  </div>

@endsection