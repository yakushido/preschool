@extends('teacher.layouts.default')
@section('contents')

<div>
    <h3>園児詳細ページ</h3>
    <h4>園児名：{{ $user_detail['name'] }}</h4>
</div>

<div>
    <h3>出欠カレンダー</h3>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <a href="{{ route('teacher.user_detail',['id' => $user_detail['id'], 'year' => $firstDayOfMonth->copy()->subMonth()->year, 'month' => $firstDayOfMonth->copy()->subMonth()->month]) }}">前月</a>
                </div>
                <div>
                    <a href="{{ route('teacher.user_detail',['id' => $user_detail['id'], 'year' => $firstDayOfMonth->copy()->addMonth()->year, 'month' => $firstDayOfMonth->copy()->addMonth()->month]) }}">次月</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
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
                            <div>
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
                                                <div>
                                                    <button>更新</button>
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

@endsection