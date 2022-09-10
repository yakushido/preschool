@extends('layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/attendance_another_day.css') }}">

<div class="attendance_another_day">
    
    <h3>別日の欠席連絡フォーム</h3>

    <form action="{{ route('attendance.add',Auth::id()) }}" method="POST">
        @csrf
        <table>
            <tr>
                <th>日にち：</th>
                <td>
                    <input type="date" name="date">
                </td>
            </tr>
            <tr>
                <th>項目：</th>
                <td>
                    <select name="attendance_id">
                        @foreach( $attendance_lists as $attendance_list )
                            <option value="{{ $attendance_list['id'] }}">{{ $attendance_list['name'] }}</option>
                        @endforeach
                    </select>                
                </td>
            </tr>
        </table>
        <div class="button">
            <button>送信</button>
        </div>
    </form>
    
</div>

@endsection