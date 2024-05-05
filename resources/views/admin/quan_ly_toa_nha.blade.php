@extends('dashboard')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Quản lý tòa nhà</h2>
          
            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addBuildingModal">+ Thêm tòa nhà</button>
            
          
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã toà nhà</th>
                        <th>Tên toà nhà</th>
                        <th>Số lượng căn hộ</th>
                        <th>Số tầng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toanha as $building)
                    <tr>
                        <td>{{ $building->ma_toa_nha }}</td>
                        <td>{{ $building->ten_toa_nha }}</td>
                        <td>{{ $building->so_luong_can_ho }}</td>
                        <td>{{ $building->so_tang }}</td>
                        <td>
                            <a href="#" class="btn btn-warning edit-building" data-toggle="modal" data-target="#editBuildingModal" data-id="{{ $building->ma_toa_nha }}">Sửa</a>
                            <form action="{{ route('quan_ly_toa_nha.destroy', $building->ma_toa_nha) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addBuildingModal" tabindex="-1" aria-labelledby="addBuildingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBuildingModalLabel">Thêm Tòa Nhà Mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBuildingForm" method="POST" action="{{ route('quan_ly_toa_nha.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="addBuildingName">Tên tòa nhà</label>
                        <input type="text" class="form-control" id="addBuildingName" name="ten_toa_nha" required>
                    </div>
                    <div class="form-group">
                        <label for="addNumApartments">Số lượng căn hộ</label>
                        <input type="number" class="form-control" id="addNumApartments" name="so_luong_can_ho" required>
                    </div>
                    <div class="form-group">
                        <label for="addNumFloors">Số tầng</label>
                        <input type="number" class="form-control" id="addNumFloors" name="so_tang" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editBuildingModal" tabindex="-1" aria-labelledby="editBuildingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBuildingModalLabel">Sửa Tòa Nhà</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editBuildingForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editBuildingName">Tên tòa nhà</label>
                        <input type="text" class="form-control" id="editBuildingName" name="ten_toa_nha" required>
                    </div>
                    <div class="form-group">
                        <label for="editNumApartments">Số lượng căn hộ</label>
                        <input type="number" class="form-control" id="editNumApartments" name="so_luong_can_ho" required>
                    </div>
                    <div class="form-group">
                        <label for="editNumFloors">Số tầng</label>
                        <input type="number" class="form-control" id="editNumFloors" name="so_tang" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
   $(document).ready(function() {
    $('.edit-building').click(function() {
        var buildingId = $(this).data('id');
        var url = "{{ route('quan_ly_toa_nha.edit', ':id') }}";
        url = url.replace(':id', buildingId);

        $.get(url, function(data) {
            $('#editBuildingForm').attr('action', "{{ route('quan_ly_toa_nha.update', ':id') }}".replace(':id', buildingId));
            $('#editBuildingName').val(data.ten_toa_nha);
            $('#editNumApartments').val(data.so_luong_can_ho);
            $('#editNumFloors').val(data.so_tang);
        });
    });
});
</script>

@endsection
