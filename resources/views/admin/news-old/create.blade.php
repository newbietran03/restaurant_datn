@extends('admin.layoutadmin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm Tin Mới</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Trang Chủ</a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}">Quản Lý Tin</a>
                </li>
                <li class="active">
                    <strong>Thêm Tin Mới</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thêm Tin Mới</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="lang">Ngôn Ngữ</label>
                                <input type="text" name="lang" id="lang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="idLT">Loại Tin</label>
                                <select name="idLT" id="idLT" class="form-control" required>
                                    @foreach (App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tieuDe">Tiêu Đề</label>
                                <input type="text" name="tieuDe" id="tieuDe" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="urlHinh">Ảnh</label>
                                <input type="file" name="urlHinh" id="urlHinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="noiDung">Nội Dung</label>
                                <textarea name="noiDung" id="noiDung" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="anHien">Trạng Thái</label>
                                <select name="anHien" id="anHien" class="form-control" required>
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('news.index') }}" class="btn btn-secondary">Hủy</a>
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
            CKEDITOR.replace('noiDung');
        });
    </script>
@endsection
