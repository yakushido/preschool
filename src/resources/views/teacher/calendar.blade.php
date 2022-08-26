@extends('teacher.layouts.default')
@section('contents')

<div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('calendar', ['year' => $firstDayOfMonth->copy()->subMonth()->year, 'month' => $firstDayOfMonth->copy()->subMonth()->month]) }}">前月</a>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('calendar', ['year' => $firstDayOfMonth->copy()->addMonth()->year, 'month' => $firstDayOfMonth->copy()->addMonth()->month]) }}">次月</a>
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
                        @foreach( $event_dates as $event_date )
                            @if( App\Models\EventDate::where('date', $date)->exists() )
                                @if( $event_date['date'] == $date->format('Y-m-d') )
                                    <a href="/teacher/event/detail/{{ $event_date['event_id'] }}">{{ $event_date['event']['name']  }}</a> 
                                    <div>
                                        <form action="{{ route('teacher.event.delete',$event_date['id']) }}" method="POST">
                                            @csrf
                                            <button>削除</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        </div>
                        <div>
                            <form action="{{ route('teacher.event.get_add',$date->format('Y-m-d')) }}" method="GET">
                                @csrf
                                <button>追加</button>
                            </form>
                        </div>
                    </td>
                    @if($date->isSaturday())
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>

<div>
    <a href="{{ route('teacher.event.create_get') }}">イベント項目の登録はこちら</a>
</div>
@endsection