@extends('layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

<div class="welcome">

    <div class="attendance">
        @if( Auth::check() )
        <div>
            <h3>今日の欠席連絡</h3>

            @if (session('status'))
                <div class="alert" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if( $today_attendance === null )
            <div class="attendance_flex">
                <form action="{{ route('attendance.add',Auth::id()) }}" method="POST" class="attendance_form">
                    @csrf
                    <input type="text" name="attendance_id" value="2" hidden>
                    <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
                    <button class="attendance_button_absence">欠席</button>
                </form>
                <form action="{{ route('attendance.add',Auth::id()) }}" method="POST" class="attendance_form">
                    @csrf
                    <input type="text" name="attendance_id" value="3" hidden>
                    <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
                    <button class="attendance_button_lateness">遅刻</button>
                </form>
                <form action="{{ route('attendance.add',Auth::id()) }}" method="POST" class="attendance_form">
                    @csrf
                    <input type="text" name="attendance_id" value="4" hidden>
                    <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" hidden>
                    <button class="attendance_button_early">早退</button>
                </form>
            </div>
            @else
            <p>今日はすでに連絡済みです</p>
            <form action="{{ route('attendance.delete',[ 'id' => Auth::id(), 'date' => \Carbon\Carbon::now()->format("Y-m-d") ]) }}" method="POST" class="attendance_form">
                @csrf
                <button class="attendance_button_delete">取り消し</button>
            </form>
            @endif
            <div class="attendance_another_day">
                <a href="/attendance/another_day">別日の欠席連絡はこちら</a>
            </div>
        </div>
        @elseif( !Auth::check() )
        <div class="attendance_login">
            <a href="/login">ログインはこちら</a>
        </div>
        @endif
    </div>

    <div class="blog">
        <h3>毎日ブログ</h3>
        <p>このブログでは､その日の給食画像や出来事を毎日アップしています</p>
        <div class="blog_cards">
            @foreach($blogs as $blog)
            <a class="blog_card_item" href="/blog/detail/{{ $blog->id }}">
                <h4>{{ $blog['title'] }}</h4>
                <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
            </a>
            @endforeach
        </div>
        <div>
        {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class="event">
        <img src="{{ Storage::url('img/blog_bg.jpg') }}" alt="">
        <div>
            <h3>イベント情報</h3>
            <ul>
                @foreach( $event_lists as $event_list )
                    <li class="event_li_date">{{ $event_list['date'] }}</li>
                    <li class="event_li_content">
                        <span class="arrow_right_icon"></span>
                        <a href="/event/detail/{{ $event_list['event_id'] }}">{{ $event_list['event']['name'] }}</a>
                    </li>
                @endforeach
            </ul>
            {{ $event_lists->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>





@endsection