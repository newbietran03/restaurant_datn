@extends('admin.layoutadmin')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thêm Loại Tin</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin') }}">Trang Chủ</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">Quản Lý Loại Tin</a>
            </li>
            <li class="active">
                <strong>Thêm Loại Tin</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thêm Loại Tin</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="lang">Ngôn Ngữ</label>
                            <select name="lang" id="lang" class="form-control" required="">
                                <option value="vi">Tiếng Việt</option>
                                <option value="en">Tiếng Anh</option>
                                <option value="fr">Tiếng Pháp</option>
                                <option value="es">Tiếng Tây Ban Nha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ten">Loại Tin</label>
                            <input type="text" class="form-control" id="ten" name="ten" required>
                        </div>
                        <div class="form-group">
                            <label for="thuTu">Thứ Tự</label>
                            <input type="number" class="form-control" id="thuTu" name="thuTu" required>
                        </div>
                        <div class="form-group">
                            <label for="anHien">Trạng Thái</label>
                            <select class="form-control" id="anHien" name="anHien" required>
                                <option value="1">Hiển Thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Loại Tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
