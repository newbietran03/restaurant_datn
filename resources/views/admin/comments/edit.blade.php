@extends('admin.layoutadmin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh Sửa Bình Luận</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">Trang Chủ</a></li>
            <li><a>Quản Lý Bình Luận</a></li>
            <li class="active"><strong>Chỉnh Sửa Bình Luận</strong></li>
        </ol>
    </div>
    <div class="col-lg-2 text-right">
        <a href="{{ route('comments.index') }}" class="btn btn-primary" style="margin-top: 20px;">Quay Lại</a>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Chỉnh Sửa Bình Luận</h5>
                </div>
                <div class="ibox-content">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="noiDung">Nội Dung</label>
                            <textarea class="form-control" id="noiDung" name="noiDung" rows="5" required>{{ $comment->noiDung }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Người Dùng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $comment->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="news_id">Bài Viết</label>
                            <select class="form-control" id="news_id" name="news_id" required>
                                @foreach($news as $new)
                                    <option value="{{ $new->id }}" {{ $new->id == $comment->news_id ? 'selected' : '' }}>
                                        {{ $new->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
