@extends('layouts.default')
@section('contents')
  <div class="login">
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="post">
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