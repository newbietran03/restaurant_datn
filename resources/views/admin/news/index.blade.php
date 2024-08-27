@extends('admin.layoutadmin')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Danh Sách Tin</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Trang Chủ</a>
                </li>
                <li>
                    <a>Quản Lý Loại Tin</a>
                </li>
                <li class="active">
                    <strong>Danh Sách Tin</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2 text-right">
            <a href="{{ route('news.create') }}" class="btn btn-primary" style="margin-top: 20px;">Thêm Tin Mới</a>
        </div>
    </div>
    @if ($errors->has('error'))
        <span>{{ $errors->first('error') }}</span>
    @endif
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh Sách Loại Tin</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a></li>
                                <li><a href="#">Config option 2</a></li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-posts">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ngôn Ngữ</th>
                                        <th>Loại Tin</th>
                                        <th>Tiêu Đề</th>
                                        <th>Image</th>
                                        {{-- <th>Nội Dung</th> --}}
                                        <th>Thứ Tự</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->lang }}</td>
                                            {{-- <td>{{ $item->ten }}</td> --}}
                                            <td>{{ App\Models\Category::find($item->idLT)->ten }}</td>
                                            <td>{{ $item->tieuDe }}</td>
                                            <td> <img src="{{ asset('' . $item->urlHinh) }}" height="64" alt=""
                                                    srcset=""></td>
                                            {{-- <td>{!! $item->noiDung!!}</td> --}}
                                            <td>{{ $item->thuTu }}</td>
                                            <td>
                                                <div
                                                    class="btn btn-icon btn-sm text-white edit-data {{ $item->anHien == 1 ? 'btn-primary' : 'btn-danger' }}">
                                                    {{ $item->anHien == 1 ? 'Hiện' : 'Ẩn' }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('news.destroy', $item->id) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Xác nhận xóa?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    {{-- <tr>
                                    <th>ID</th>
                                    <th>Ngôn Ngữ</th>
                                    <th>Loại Tin</th>
                                    <th>Thứ Tự</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr> --}}
                                </tfoot>
                            </table>
                        </div>
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
            // Check if DataTable is already initialized and destroy it
            if ($.fn.DataTable.isDataTable('.dataTables-posts')) {
                $('.dataTables-posts').DataTable().destroy();
            }

            // Initialize DataTable
            $('.dataTables-posts').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'DanhSachLoaiTin'
                    },
                    {
                        extend: 'pdf',
                        title: 'DanhSachLoaiTin'
                    },
                    {
                        extend: 'print',
                        title: 'DanhSachLoaiTin',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });
    </script>
@endsection
