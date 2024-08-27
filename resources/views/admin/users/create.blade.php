@extends('admin.layoutadmin')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thêm Người Dùng Mới</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Trang Chủ</a>
            </li>
            <li>
                <a>Quản Lý Người Dùng</a>
            </li>
            <li class="active">
                <strong>Thêm Người Dùng Mới</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thêm Người Dùng Mới</h5>
                </div>
                <div class="ibox-content">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện Thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="UserName">Tên Người Dùng</label>
                            <input type="text" name="UserName" id="UserName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="DateBirth">Ngày Sinh</label>
                            <input type="date" name="DateBirth" id="DateBirth" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Sex">Giới Tính</label>
                            <select name="Sex" id="Sex" class="form-control" required>
                                <option value="Male">Nam</option>
                                <option value="Female">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Xác Nhận Mật Khẩu</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {
        // Additional JavaScript if needed
    });
</script>
@endsection
