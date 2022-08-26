@extends('teacher.layouts.default')
@section('contents')

<div class="photp_add">
    <form action="{{ route('teacher.photo.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="team_id">クラス：</label>
            <select name="team_id">
                @foreach( $team_lists as $team_list )
                <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="img_path">写真：</label>
            <input type="file" name="img_path">
        </div>
        <div>
            <button>投稿</button>
        </div>
    </form>
</div>

<div class="photo_lists">
    @foreach( $photo_lists as $photo_list )
    <div>
        <img src="{{ Storage::url($photo_list['img_path']) }}" alt="">
    </div>
    <div>
        <form action="{{ route('teacher.photo.delete',$photo_list['id']) }}" method="POST">
            @csrf
            <button>削除</button>
        </form>
    </div>
    @endforeach
</div>

@endsection