@extends('dashboard')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-success float-end" href="{{ route('them_cu_dan') }}" role="button">Thêm cư dân mới</a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cu_dan as $cd)
                    <tr>
                        <td>{{ $cd->MaCuDan }}</td>
                        <td>{{ $cd->HoTenCuDan }}</td>
                        <td>{{ $cd->NgaySinh }}</td>
                        <td>{{ $cd->GioiTinh }}</td>
                        <td>{{ $cd->DiaChi }}</td>
                        <td>{{ $cd->SoDienThoai }}</td>
                        <td>{{ $cd->Email }}</td>
                        <td>
                            <a class="btn btn-outline-info" href="{{ route('xem_thong_tin_cu_dan', ['id' => $cd->MaCuDan]) }}" role="button">Xem</a>
                            <a class="btn btn-outline-warning" href="{{ route('sua_cu_dan', ['id' => $cd->MaCuDan]) }}" role="button">Sửa</a>
                            <a class="btn btn-outline-danger" href="{{ route('xoa_cu_dan', ['id' => $cd->MaCuDan]) }}" role="button">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable(
                
            );
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

@endsection
