@extends('teacher.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\calendar.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/event.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
<link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endif

    <div class="calendar_form">

        <h3>イベントカレンダー</h3>
        
        <div class="calendar">
            <div class="calendar_flex">
                <div>
                    <a href="{{ route('teacher.event', ['year' => $firstDayOfMonth->copy()->subMonth()->year, 'month' => $firstDayOfMonth->copy()->subMonth()->month]) }}">前月</a>
                </div>
                <div>
                    <a href="{{ route('teacher.event', ['year' => $firstDayOfMonth->copy()->addMonth()->year, 'month' => $firstDayOfMonth->copy()->addMonth()->month]) }}">次月</a>
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
                                    <div class="calendar_event">
                                    @foreach( $event_dates as $event_date )
                                        @if( App\Models\EventDate::where('date', $date)->exists() )
                                            @if( $event_date['date'] == $date->format('Y-m-d') )
                                                <h4>{{ $event_date['event']['name']  }}</h4> 
                                                <div>
                                                    <form action="{{ route('teacher.event.delete',$event_date['id']) }}" method="POST">
                                                        @csrf
                                                        <div class="button">
                                                            <button class="delete_button">削除</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    </div>
                                    <div>
                                        <form action="{{ route('teacher.event.add',$date->format('Y-m-d')) }}" method="POST">
                                            @csrf
                                            <select name="event_id">
                                                @foreach( $event_lists as $event_list )
                                                <option value="{{ $event_list['id'] }}">{{ $event_list['name']  }}</option>
                                                @endforeach
                                            </select>
                                            <div class="button">
                                                <button class="add_button">追加</button>
                                            </div>
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
        </div>

    </div>

    <div class="event_responce">

        <div class="event_create">

            <h3>新しいイベントの登録</h3>

            <form action="{{ route('teacher.event.create') }}" method="POST">
                @csrf
                <div>
                    <label for="name">イベント名：</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="content">イベント内容：</label>
                    <textarea name="content" cols="30" rows="10"></textarea>
                </div>
                <div class="button">
                    <button class="add_button">登録</button>
                </div>
            </form>

        </div>

        <div class="event_lists">

            <h3>イベントリスト</h3>

            @foreach( $event_lists as $event_list )
            <div class="event_list">
                <form action="{{ route('teacher.event.update',$event_list['id']) }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">イベント名：</label>
                        <input type="text" name="name" value="{{ $event_list['name'] }}">
                    </div>
                    <div>
                        <label for="content">イベント内容：</label>
                        <textarea name="content" cols="30" rows="10">{{ $event_list['content'] }}</textarea>
                    </div>
                    <div class="button_flex">
                        <div class="button">
                            <button class="update_button">更新</button>
                        </div>
                </form>
                        <form action="{{ route('teacher.event.create_delete',$event_list['id']) }}" method="POST">
                            @csrf
                            <div class="button">
                                <button class="delete_button">削除</button>
                            </div>
                        </form>
                    </div>
            </div>
            @endforeach

        </div>

    </div>

@endsection