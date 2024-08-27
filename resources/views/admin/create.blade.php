{{-- @extends('admin.layoutadmin')

@section('content')
<div>
    <h1>Thêm tin mới</h1>
    <form method="POST" action="{{ url('/admin/tin/store') }}">
        @csrf
        <div>
            <label for="tieuDe">Tiêu đề:</label>
            <input type="text" id="tieuDe" name="tieuDe" required>
        </div>
        <div>
            <label for="tomTat">Tóm tắt:</label>
            <textarea id="tomTat" name="tomTat" required></textarea>
        </div>
        <div>
            <label for="urlHinh">URL hình ảnh:</label>
            <input type="text" id="urlHinh" name="urlHinh" required>
        </div>
        <div>
            <label for="noiDung">Nội dung:</label>
            <textarea id="noiDung" name="noiDung" required></textarea>
        </div>
        <div>
            <label for="loaiTin">Loại tin:</label>
            <select id="loaiTin" name="loaiTin">
                @foreach ($loaitins as $loaitin)
                    <option value="{{ $loaitin->id }}">{{ $loaitin->ten }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Thêm mới</button>
    </form>
</div>
@endsection --}}
