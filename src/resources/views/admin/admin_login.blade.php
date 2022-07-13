@extends('admin.admin_layouts.admin_default')
@section('admin_content')
  <div class="admin_login">
    <h2>管理者Login</h2>
    <form action="{{ route('admin.login') }}" method="post">
    @csrf
        <div>mail:
          <input type="email" name="email">
        </div>
        <div>pass:
          <input type="password" name="password">
        </div>
        <button type="submit">Login</button>
    </form>
  </div>
@endsection