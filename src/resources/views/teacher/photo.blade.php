@extends('teacher.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\photo.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/photo.css') }}">
@endif

<div class="photo_responce">

    <div class="photo_add">

        <h3>写真の追加</h3>

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
                <div>写真：<span class="js-upload-filename">ファイルが未選択です</span></div>
                <label for="img_path" class="filelabel">ファイルを選択
                    <input type="file" name="img_path" id="img_path" class="js-upload-file">
                </label>
            </div>
            <div class="button">
                <button class="add_button">投稿</button>
            </div>
        </form>
    </div>

    <div class="photo_lists">
        
        <h3>投稿写真リスト</h3>

        <div class="photo_lists_flex">
            @foreach( $photo_lists as $photo_list )
            <div class="photo_list">
                <img src="{{ Storage::url($photo_list['img_path']) }}" alt="">
                <form action="{{ route('teacher.photo.delete',$photo_list['id']) }}" method="POST">
                    @csrf
                    <button>
                        <img src="{{ asset('img/icon_delete.jpg') }}" alt="">
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        {{ $photo_lists->links('pagination::bootstrap-4') }}
    </div>

</div>

@endsection