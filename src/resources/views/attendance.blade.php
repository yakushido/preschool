@extends('layouts.default')
@section('contents')

  <div>
    <h3>こちらで欠席の連絡が出来ます。</h3>
    <form action="{{ route('user.attendance.add') }}" method="POST">
    @csrf
      <div>
        <input type="date" name="date">
        <select name="attendance">
          @foreach( $attendances as $attendance )
          <option value="{{ $attendance['id'] }}">{{ $attendance['name'] }}</option>
          @endforeach
        </select>
        <label>理由</label>
        <select name="reason">
          @foreach( $reasons as $reason )
          <option value="{{ $reason['id'] }}">{{ $reason['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <button>連絡する</button>
      </div>
    </form>
  </div>
  
@endsection