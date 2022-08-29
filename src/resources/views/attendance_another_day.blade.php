@extends('layouts.default')
@section('contents')

<div>
    <h3>別日の欠席連絡</h3>
    <form action="{{ route('attendance.add') }}" method="POST">
        @csrf
        <div>
            <label for="date">日にち：</label>
            <input type="date" name="date">
        </div>
        <div>
            <label for="attendance_id">項目：</label>
            <select name="attendance_id">
                @foreach( $attendance_lists as $attendance_list )
                    <option value="{{ $attendance_list['id'] }}">{{ $attendance_list['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button>送信</button>
        </div>
    </form>
</div>

@endsection