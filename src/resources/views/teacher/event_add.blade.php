@extends('teacher.layouts.default')
@section('contents')

<div>

    <h3>イベントの追加</h3>
    <h4>追加日：{{ $event_date }}</h4>

    <div>
        <form action="{{ route('teacher.event.add',$event_date) }}" method="POST">
            @csrf
            <div>
                <label for="event_id">イベント名：</label>
                <select name="event_id">
                    @foreach( $events as $event )
                    <option value="{{ $event['id'] }}">{{ $event['name']  }}</option>
                    @endforeach
                </select>
                <input type="date" name="date" value="{{ $event_date }}" hidden>
            </div>
            <div>
                <button>追加</button>
            </div>
        </form>
    </div>

</div>



@endsection