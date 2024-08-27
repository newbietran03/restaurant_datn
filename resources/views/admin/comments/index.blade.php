@extends('admin.layoutadmin')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh Sách Bình Luận</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">Trang Chủ</a></li>
            <li><a>Quản Lý Bình Luận</a></li>
            <li class="active"><strong>Danh Sách Bình Luận</strong></li>
        </ol>
    </div>
    <div class="col-lg-2 text-right">
        <a href="{{ route('comments.create') }}" class="btn btn-primary" style="margin-top: 20px;">Thêm Bình Luận</a>
    </div>
</div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Bình Luận</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-comments">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nội Dung</th>
                                    <th>Người Dùng</th>
                                    <th>Bài Viết</th>
                                    <th>Ngày Tạo</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->noiDung }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->news->title }}</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Xác nhận xóa?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nội Dung</th>
                                    <th>Người Dùng</th>
                                    <th>Bài Viết</th>
                                    <th>Ngày Tạo</th>
                                    <th>Thao Tác</th>
                                </tr>
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
        if ($.fn.DataTable.isDataTable('.dataTables-comments')) {
            $('.dataTables-comments').DataTable().destroy();
        }
        
        // Initialize DataTable
        $('.dataTables-comments').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy' },
                { extend: 'csv' },
                { extend: 'excel', title: 'DanhSachBinhLuan' },
                { extend: 'pdf', title: 'DanhSachBinhLuan' },
                {
                    extend: 'print',
                    title: 'DanhSachBinhLuan',
                    customize: function (win) {
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
