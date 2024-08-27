@extends('admin.layoutadmin')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh Sách Người Dùng</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Trang Chủ</a>
            </li>
            <li>
                <a>Quản Lý Người Dùng</a>
            </li>
            <li class="active">
                <strong>Danh Sách Người Dùng</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 text-right">
        <a href="{{ route('users.create') }}" class="btn btn-primary" style="margin-top: 20px;">Thêm Người Dùng</a>
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
                    <h5>Danh Sách Người Dùng</h5>
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
                        <table class="table table-striped table-bordered table-hover dataTables-users">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Ngày Sinh</th>
                                    <th>Giới Tính</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->UserName }}</td>
                                    <td>{{ $user->DateBirth }}</td>
                                    <td>{{ $user->Sex }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
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
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Ngày Sinh</th>
                                    <th>Giới Tính</th>
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
        if ($.fn.DataTable.isDataTable('.dataTables-users')) {
            $('.dataTables-users').DataTable().destroy();
        }
        
        // Initialize DataTable
        $('.dataTables-users').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy' },
                { extend: 'csv' },
                { extend: 'excel', title: 'DanhSachNguoiDung' },
                { extend: 'pdf', title: 'DanhSachNguoiDung' },
                {
                    extend: 'print',
                    title: 'DanhSachNguoiDung',
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
