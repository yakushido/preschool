@extends('teacher.layouts.default')
@section('contents')

<div>
    <h3>イベント項目の登録</h3>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
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
        <div>
            <button>登録</button>
        </div>
    </form>
</div>

<div>
    @foreach( $event_lists as $event_list )
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
        <div>
            <button>更新</button>
        </div>
    </form>
    <form action="{{ route('teacher.event.create_delete',$event_list['id']) }}" method="POST">
        @csrf
        <div>
            <button>削除</button>
        </div>
    </form>
    @endforeach
</div>
@endsection