

@extends('dashboard')

@section('content')
    <h1>Thêm mới Căn hộ</h1>
    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf
        <!-- <div class="form-group">
            <label for="MaCanHo">Mã Căn Hộ</label>
            <input type="text" class="form-control" id="MaCanHo" name="MaCanHo">
        </div> -->
        <div class="form-group">
            <label for="MaToaNha">Mã Tòa nhà</label>
            
            <select class="form-control" id="MaToaNhaSelect" name="MaToaNha">
                @foreach($listToaNha as $toaNha)
                    <option value="{{ $toaNha->ma_toa_nha }}">{{ $toaNha->ten_toa_nha }}</option>
                @endforeach
            </select>
  
        </div>
        <div class="form-group">
            <label for="MaCuDan">Mã Cư Dân</label>
            <select class="form-control" id="MaToaNhaSelect" name="MaCuDan">
                @foreach($listCuDan as $CuDan)
                    <option value="{{ $CuDan->MaCuDan }}">{{ $CuDan->HoTenCuDan	 }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="SoPhong">Số Phòng</label>
            <input type="number" class="form-control" id="SoPhong" name="SoPhong">
        </div>
        <div class="form-group">
            <label for="DienTich">Diện Tích</label>
            <input type="number" step="0.01" class="form-control" id="DienTich" name="DienTich">
        </div>
        <div class="form-group">
            <label for="TinhTrang">Tình Trạng</label>
            <select class="form-control" id="TinhTrang" name="TinhTrang">
                <option value="Chua">Chưa cho thuê</option>
                <option value="Da">Đã cho thuê</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
