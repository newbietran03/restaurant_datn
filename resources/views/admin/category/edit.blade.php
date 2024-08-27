@extends('admin.layoutadmin')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sửa Loại Tin</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin') }}">Trang Chủ</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">Quản Lý Loại Tin</a>
            </li>
            <li class="active">
                <strong>Sửa Loại Tin</strong>
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
                    <h5>Sửa Loại Tin</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Ngôn Ngữ</label>
                            <select name="lang" id="lang" class="form-control" required="">
                                <option value="vi" {{ $category->lang == 'vi' ? 'selected' : '' }}>Tiếng Việt</option>
                                <option value="en" {{ $category->lang == 'en' ? 'selected' : '' }}>Tiếng Anh</option>
                                <option value="fr" {{ $category->lang == 'fr' ? 'selected' : '' }}>Tiếng Pháp</option>
                                <option value="es" {{ $category->lang == 'es' ? 'selected' : '' }}>Tiếng Tây Ban Nha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ten">Loại Tin</label>
                            <input type="text" class="form-control" id="ten" name="ten" value="{{ $category->ten }}" required>
                        </div>
                        <div class="form-group">
                            <label for="thuTu">Thứ Tự</label>
                            <input type="number" class="form-control" id="thuTu" name="thuTu" value="{{ $category->thuTu }}" required>
                        </div>
                        <div class="form-group">
                            <label for="anHien">Trạng Thái</label>
                            <select class="form-control" id="anHien" name="anHien" required>
                                <option value="1" {{ $category->anHien == 1 ? 'selected' : '' }}>Hiện</option>
                                <option value="0" {{ $category->anHien == 0 ? 'selected' : '' }}>Ẩn</option>
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
