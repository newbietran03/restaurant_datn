@extends('admin.layoutadmin')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thêm Bình Luận Mới</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">Trang Chủ</a></li>
            <li><a>Quản Lý Bình Luận</a></li>
            <li class="active"><strong>Thêm Bình Luận Mới</strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thêm Bình Luận Mới</h5>
                </div>
                <div class="ibox-content">
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="noiDung">Nội Dung</label>
                            <textarea name="noiDung" id="noiDung" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="id_user">Người Dùng</label>
                            <select name="id_user" id="id_user" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_new">Bài Viết</label>
                            <select name="id_new" id="id_new" class="form-control" required>
                                @foreach($news as $new)
                                <option value="{{ $new->id }}">{{ $new->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
