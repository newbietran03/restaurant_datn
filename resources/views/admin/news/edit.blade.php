@extends('admin.layoutadmin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Chỉnh Sửa Tin Tức</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}">Trang Chủ</a></li>
                <li><a href="{{ route('news.index') }}">Quản Lý Tin</a></li>
                <li class="active"><strong>Chỉnh Sửa Tin</strong></li>
            </ol>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thông Tin Tin Tức</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="lang">Ngôn Ngữ</label>
                                <input type="text" name="lang" id="lang" value="{{ $news->lang }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tieuDe">Tiêu Đề</label>
                                <input type="text" name="tieuDe" id="tieuDe" value="{{ $news->tieuDe }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="idLT">Loại Tin</label>
                                <select name="idLT" id="idLT" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $news->idLT == $category->id ? 'selected' : '' }}>
                                            {{ $category->ten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="file">Ảnh</label>
                                <input type="file" name="file" id="file" class="form-control">
                                @if ($news->urlHinh)
                                    <img src="{{ asset($news->urlHinh) }}" height="64" alt="Current Image">
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="noiDung" id="Content" class="form-control">
                                    {{ $news->noiDung }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="anHien">Trạng Thái</label>
                                <select name="anHien" id="anHien" class="form-control" required>
                                    <option value="1" {{ $news->anHien == 1 ? 'selected' : '' }}>Hiện</option>
                                    <option value="0" {{ $news->anHien == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize CKEditor for the 'noiDung' textarea
            CKEDITOR.replace('noiDung');
        });
    </script>
@endsection
