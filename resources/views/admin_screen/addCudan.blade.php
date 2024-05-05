@extends('dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm mới cư dân</h3>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Thanh bên trái --}}
                <div class="col-12">
                    <form action="{{ route('them_moi_cu_dan') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                            <input type="text" class="form-control" placeholder="Họ và tên của cư dân" aria-label="Họ và tên của cư dân" aria-describedby="basic-addon1" name="HoTenCuDan">
                        </div>                          
                        <div class="input-group mb-3">
                            <span class="input-group-text">Ngày sinh</span>
                            <input type="date" class="form-control" name="NgaySinh">
                            <span class="input-group-text">Giới tính</span>
                            <input type="text" class="form-control" placeholder="Giới tính của cư dân" aria-label="Giới tính của cư dân" name="GioiTinh">
                        </div>  
                        <div class="input-group mb-3">
                            <span class="input-group-text">CCCD</span>
                            <input type="text" class="form-control" placeholder="Số căn cước công dân của cư dân" aria-label="Số căn cước công dân của cư dân" name="CCCD">
                            <span class="input-group-text">Số điện thoại</span>
                            <input type="text" class="form-control" placeholder="Số điện thoại của cư dân" aria-label="Số điện thoại của cư dân" name="SoDienThoai">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="text" class="form-control" placeholder="Email của cư dân (nếu có)" aria-label="Email của cư dân" name="Email">
                            <span class="input-group-text">Trạng thái</span>
                            <input type="text" class="form-control" placeholder="Trạng thái của cư dân" aria-label="Trạng thái của cư dân" name="TrangThai">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Địa chỉ thường trú</span>
                            <input type="text" class="form-control" placeholder="Địa chỉ thường chú của cư dân" aria-label="Địa chỉ thường trú của cư dân" aria-describedby="basic-addon1" name="DiaChi">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Ngày thuê</span>
                            <input type="date" class="form-control" name="RentStart">
                            <span class="input-group-text">Ngày hết hạn thuê</span>
                            <input type="date" class="form-control" name="RentEnd">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text">Số phòng</span>
                            <input type="text" class="form-control" placeholder="Số phòng của cư dân" aria-label="Số phòng của cư dân" name="SoPhong">
                            <span class="input-group-text">Tòa nhà</span>
                            <input type="text" class="form-control" placeholder="Tòa nhà của cư dân" aria-label="Tòa nhà của cư dân" name="ToaNha">
                        </div> --}}
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Thêm cư dân</button>
                        </div>
                    </form>
                </div>

                {{--  Thanh bên phải --}}
                {{-- <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ảnh đại diện</h5>
                          </div>
                          <div class="card-body">
                            <!-- Form để upload ảnh -->
                            <form action="{{ route('upload_avatar', ['id' => $cu_dan->MaCuDan]) }}" method="post" enctype="multipart/form-data">
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
                </div> --}}
              </div>
            
        </div>
    </div>

@endsection
