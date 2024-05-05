@extends('dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa thông tin cư dân</h3>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Thanh bên trái --}}
                <div class="col-8">
                    <form action="{{ route('cap_nhat_cu_dan', ['id' => $cu_dan->MaCuDan]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->HoTenCuDan }}"
                                aria-label="Họ và tên của cư dân" aria-describedby="basic-addon1" name="HoTenCuDan">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Ngày sinh</span>
                            <input type="date" class="form-control" value="{{ $cu_dan->NgaySinh }}" name="NgaySinh">
                            <span class="input-group-text">Giới tính</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->GioiTinh }}"
                                aria-label="Giới tính của cư dân" name="GioiTinh">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">CCCD</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->CCCD }}"
                                aria-label="Số căn cước công dân của cư dân" name="CCCD">
                            <span class="input-group-text">Số điện thoại</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->SoDienThoai }}"
                                aria-label="Số điện thoại của cư dân" name="SoDienThoai">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->Email }}"
                                aria-label="Email của cư dân" name="Email">
                            <span class="input-group-text">Trạng thái</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->TrangThai }}"
                                aria-label="Trạng thái của cư dân" name="TrangThai">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Địa chỉ thường trú</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->DiaChi }}"
                                aria-label="Địa chỉ thường trú của cư dân" aria-describedby="basic-addon1" name="DiaChi">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Ngày thuê</span>
                            <input type="date" class="form-control" value="{{ $cu_dan->RentStart }}" name="RentStart">
                            <span class="input-group-text">Ngày hết hạn thuê</span>
                            <input type="date" class="form-control" value="{{ $cu_dan->RentEnd }}" name="RentEnd">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text">Số phòng</span>
                            <select class="form-control" id="SoPhong" name="SoPhong">
                                @foreach($listCanho as $id => $soPhong)
                                    <option value="{{ $id }}">{{ $soPhong }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text">Tòa nhà</span>
                            <input type="text" class="form-control" value="{{ $cu_dan->ToaNha }}"
                                aria-label="Tòa nhà của cư dân" name="ToaNha">
                        </div> --}}

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>

                {{--  Thanh bên phải --}}
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ảnh đại diện</h5>
                        </div>
                        <div class="card-body">
                            @if ($cu_dan->AnhDaiDien)
                            <img src="{{ url( $cu_dan->AnhDaiDien) }}" alt="Ảnh đại diện" class="img-fluid">

                            @else
                                <p>Không có ảnh đại diện</p>
                            @endif
                            <!-- Form để upload ảnh -->
                            <form action="{{ route('upload_avatar', ['id' => $cu_dan->MaCuDan]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control" name="avatar" id="avatar">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Đăng ảnh</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" href="{{ route('quan_ly_cu_dan') }}" role="button">Quay lại</a>
    </div>
    </div>
@endsection
