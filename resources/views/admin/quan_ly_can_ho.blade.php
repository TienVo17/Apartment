@extends('dashboard')

@section('content')
    <a href="{{ route('apartments.create') }}" class="btn btn-primary">Thêm mới</a>
<div class="mb-3 d-flex justify-content-end">
    
    <form action="{{ route('apartments.search') }}" method="GET" class="form-inline ml-3">
        <div class="input-group">
            <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" class="form-control">
            <div class="input-group-append">
                <button type="submit" class="btn btn-success">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã Căn hộ</th>
                <th scope="col">Mã Tòa nhà</th>
                <th scope="col">Mã Cư Dân</th>
                <th scope="col">Số Phòng</th>
                <th scope="col">Diện Tích</th>
                <th scope="col">Tình Trạng</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
                <tr>
                    <td>{{ $apartment->MaCanHo }}</td>
                    <td>{{ $apartment->MaToaNha }}</td>
                    <td>{{ $apartment->MaCuDan }}</td>
                    <td>{{ $apartment->SoPhong }}</td>
                    <td>{{ $apartment->DienTich }}</td>
                    <td>{{ $apartment->TinhTrang }}</td>
                    <td>
                        <a href="{{ route('apartments.edit', $apartment->MaCanHo) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('apartments.destroy', $apartment->MaCanHo) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa căn hộ này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
