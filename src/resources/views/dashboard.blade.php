@extends('layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\calendar.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css\photo.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
<link rel="stylesheet" href="{{ asset('css/photo.css') }}">
@endif

<div class="calendar_form">

    <h3>出欠カレンダー</h3>

    <div class="calendar">

        <div class="calendar_flex">
            <div>
                <a href="{{ route('dashboard', ['year' => $firstDayOfMonth->copy()->subMonth()->year, 'month' => $firstDayOfMonth->copy()->subMonth()->month]) }}">前月</a>
            </div>
            <div>
                <a href="{{ route('dashboard', ['year' => $firstDayOfMonth->copy()->addMonth()->year, 'month' => $firstDayOfMonth->copy()->addMonth()->month]) }}">次月</a>
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
                                                <form action="{{ route('attendance.update',$user_attendance['id']) }}" method="POST">
                                                    @csrf
                                                    <select name="attendance_id">
                                                        <option value="">{{ $user_attendance['attendance']['name'] }}</option>
                                                        @foreach( $attendance_lists as $attendance_list )
                                                        <option value="{{ $attendance_list['id'] }}">{{ $attendance_list['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="button">
                                                        <button class="update_button">更新</button>
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

<div class="photo_gallary">

    <h3>ギャラリー</h3>

    <div class="photo_gallary_response">
        @foreach( $gallerys as $gallery )
        <div class="gallery">
            <a href="/photo/{{ $gallery['id'] }}/shop/"><img src="{{ Storage::url($gallery['img_path']) }}" alt="クラスimage"></a>
        </div>
        @endforeach
    </div>

</div>

@endsection