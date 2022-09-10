@extends('teacher.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/user_detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
<link rel="stylesheet" href="{{ asset('css/attendance_another_day.css') }}">

<div class="user_detail">

    <div class="user_detail_top">
        <h3>園児詳細ページ</h3>
        <h4>園児名：{{ $user_detail['name'] }}</h4>
    </div>

    <div class="calendar_form">
        
        <h3>出欠カレンダー</h3>

        <div class="calendar">
            <div class="calendar_flex">
                <div>
                    <a href="{{ route('teacher.user_detail',['id' => $user_detail['id'], 'year' => $firstDayOfMonth->copy()->subMonth()->year, 'month' => $firstDayOfMonth->copy()->subMonth()->month]) }}">前月</a>
                </div>
                <div>
                    <a href="{{ route('teacher.user_detail',['id' => $user_detail['id'], 'year' => $firstDayOfMonth->copy()->addMonth()->year, 'month' => $firstDayOfMonth->copy()->addMonth()->month]) }}">次月</a>
                </div>
            </div>

            <div class="calendar_scroll">
                <table>
                    <thead>
                    <tr>
                        @foreach($weeks as $i => $week)
                            <th @if($i===\Carbon\Carbon::SUNDAY) class="text-red"
                                @elseif($i===\Carbon\Carbon::SATURDAY) class="text-blue" @endif>
                                {{ $week }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dates as $date)
                        @if($date->isSunday())
                            <tr>
                                @endif
                                <td>
                                    <div class="calendar_date">
                                        {{ $date->format('n/j') }}
                                    </div>
                                    <div>
                                        @foreach( $user_attendances as $user_attendance )
                                            @if( App\Models\UserAttendance::where('date',$date)->exists() )
                                                @if( $user_attendance['date'] == $date->format('Y-m-d') )
                                                    <form action="{{ route('teacher.attendance.update',$user_attendance['id']) }}" method="POST">
                                                        @csrf
                                                        <select name="attendance_id">
                                                            <option value="{{ $user_attendance['attendance']['id'] }}">{{ $user_attendance['attendance']['name'] }}</option>
                                                            @foreach( $attendance_lists as $attendance_list )
                                                            <option value="{{ $attendance_list['id'] }}">{{ $attendance_list['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="button">
                                                            <button class="update_button">更新</button>
                                                        </div>
                                                    </form>
                                                    <form action="{{ route('teacher.attendance.delete',$user_attendance['id']) }}" method="POST">
                                                        @csrf
                                                        <div class="button">
                                                            <button class="delete_button">削除</button>
                                                        </div>
                                                    </form>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                                @if($date->isSaturday())
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="attendance_another_day">

        <h3>別日の出欠</h3>

        <form action="{{ route('teacher.attendance.add',$user_detail['id']) }}" method="POST">
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
                <button>追加</button>
            </div>
        </form>
    </div>

</div>
@endsection