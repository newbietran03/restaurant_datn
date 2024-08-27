@extends('admin.layoutadmin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh Sửa Người Dùng</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">Trang Chủ</a></li>
            <li><a>Quản Lý Người Dùng</a></li>
            <li class="active"><strong>Chỉnh Sửa</strong></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thông Tin Người Dùng</h5>
                </div>
                <div class="ibox-content">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện Thoại</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="UserName">Tên Người Dùng</label>
                            <input type="text" name="UserName" value="{{ $user->UserName }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="DateBirth">Ngày Sinh</label>
                            <input type="date" name="DateBirth" value="{{ $user->DateBirth }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Sex">Giới Tính</label>
                            <select name="Sex" class="form-control">
                                <option value="Nam" {{ $user->Sex == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ $user->Sex == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Xác Nhận Mật Khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
