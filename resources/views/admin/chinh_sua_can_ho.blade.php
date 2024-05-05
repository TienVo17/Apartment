@extends('dashboard')

@section('content')
    <h1>Chỉnh sửa thông tin căn hộ</h1>
    <form action="{{ route('apartments.update', $apartment->MaCanHo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="MaToaNha">Mã Tòa nhà</label>
            <select class="form-control" id="MaToaNhaSelect" name="MaToaNha">
                @if(isset($listToaNha))
                    @foreach($listToaNha as $toaNha)
                        <option value="{{ $toaNha->ma_toa_nha }}" {{ $toaNha->ma_toa_nha == $apartment->ma_toa_nha ? 'selected' : '' }}>{{ $toaNha->ten_toa_nha }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="MaCuDan">Mã Cư Dân</label>
            <select class="form-control" id="MaCuDanSelect" name="MaCuDan">
                @if(isset($listCuDan))
                    @foreach($listCuDan as $cuDan)
                        <option value="{{ $cuDan->MaCuDan }}" {{ $cuDan->MaCuDan == $apartment->MaCuDan ? 'selected' : '' }}>{{ $cuDan->HoTenCuDan }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="SoPhong">Số Phòng</label>
            <input type="number" class="form-control" id="SoPhong" name="SoPhong" value="{{ $apartment->SoPhong }}">
        </div>
        <div class="form-group">
            <label for="DienTich">Diện Tích</label>
            <input type="number" step="0.01" class="form-control" id="DienTich" name="DienTich" value="{{ $apartment->DienTich }}">
        </div>
        <div class="form-group">
            <label for="TinhTrang">Tình Trạng</label>
            <select class="form-control" id="TinhTrang" name="TinhTrang">
                <option value="Chua" {{ $apartment->TinhTrang == 'Chua' ? 'selected' : '' }}>Chưa cho thuê</option>
                <option value="Da" {{ $apartment->TinhTrang == 'Da' ? 'selected' : '' }}>Đã cho thuê</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
