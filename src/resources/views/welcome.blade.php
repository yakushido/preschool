@extends('layouts.default')
@section('contents')

<div>
    @if( Auth::check() )
    <h2>{{ Auth::user()['name'] }} 様</h2>
    <div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>logout</button>
        </form>
    </div>
    <div>
        <h3>今日の欠席連絡</h3>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if( $today_attendance === null )
        <form action="{{ route('attendance.add') }}" method="POST">
            @csrf
            <input type="text" name="attendance_id" value="2" hidden>
            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
            <button>欠席</button>
        </form>
        <form action="{{ route('attendance.add') }}" method="POST">
            @csrf
            <input type="text" name="attendance_id" value="3" hidden>
            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
            <button>遅刻</button>
        </form>
        <form action="{{ route('attendance.add') }}" method="POST">
            @csrf
            <input type="text" name="attendance_id" value="4" hidden>
            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
            <button>早退</button>
        </form>
        @else
        <p>今日はすでに連絡済みです</p>
        <form action="{{ route('attendance.delete') }}" method="POST">
            @csrf
            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
            <button>取り消しはこちら</button>
        </form>
        @endif
        <a href="/attendance/another_day">別日の欠席連絡はこちら</a>
    </div>
    @elseif( !Auth::check() )
    <h2><a href="/login">ログインはこちら</a></h2>
    @endif
</div>

<div class="blog">
    <h3>毎日ブログ</h3>
    <div>
        <p>このブログでは､その日の給食画像や出来事を毎日アップしています</p>
        <div class="blog_card">
            @foreach($blogs as $blog)
            <a class="blog_card_item" href="/blog/detail/{{ $blog->id }}">
                <h4>{{ $blog['title'] }}</h4>
                <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
            </a>
            @endforeach
        </div>
        {{ $blogs->links('pagination::bootstrap-4') }}
    </div>
</div>

<div>
    <h3>イベント情報</h3>
    <div>
        <div>
            @foreach( $event_lists as $event_list )
                <p>{{ $event_list['date'] }}</p>
                <p>-> <a href="/event/detail/{{ $event_list['event_id'] }}">{{ $event_list['event']['name'] }}</a></p>
            @endforeach
        </div>
    </div>
</div>





@endsection