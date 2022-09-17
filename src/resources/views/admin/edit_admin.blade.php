@extends('admin.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\edit_admin.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/edit_admin.css') }}">
@endif

<div class="edit_admin">

    <h3>管理者編集フォーム</h3>

    <div class="admin_lists">
        @foreach( $admin_lists as $admin_list )
            <div class="admin_list">
                <form action="{{ route('admin.admin_update', $admin_list['id']) }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">名前：</label>
                        <input type="text" name="name" value="{{ $admin_list['name'] }}">
                    </div>
                    <div>
                        <label for="email">メールアドレス：</label>
                        <input type="email" name="email" value="{{ $admin_list['email'] }}">
                    </div>
                    <div class="edit_admin_flex">
                    <div>
                        <button class="update_button">更新</button>
                    </div>
                </form>
                <form action="{{ route('admin.admin_delete', $admin_list['id']) }}" method="POST">
                    @csrf
                    <div>
                        <button class="delete_button">削除</button>
                    </div>
                </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection