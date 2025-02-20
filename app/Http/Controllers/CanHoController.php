<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canho;
use App\Models\ToaNha;
use Illuminate\Support\Facades\DB;

class CanHoController extends Controller
{
    /**
     * Hiển thị danh sách tất cả các căn hộ.
     */
    public function index()
    {
        $apartments = Canho::all();
        return view('admin.quan_ly_can_ho', ['apartments' => $apartments]);
    }

    /**
     * Hiển thị form thêm mới căn hộ.
     */
    public function create()
    {
        $listToaNha = DB::table('toanha')->select('ma_toa_nha', 'ten_toa_nha')->get();
        $listCuDan = DB::table('cudan')->select('MaCuDan', 'HoTenCuDan')->get();
        return view('admin.them_moi_can_ho', compact('listToaNha', 'listCuDan'));

    }

    /**
     * Lưu căn hộ mới được thêm vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        Canho::create($request->all());
        return redirect()->route('apartments.index');
    }


    /**
     * Xóa một căn hộ.
     */
    public function destroy($id)
    {
        try {
            // Tìm căn hộ dựa trên ID
            $apartment = Canho::findOrFail($id);

            // Xóa căn hộ
            $apartment->delete();

            return redirect()->route('apartments.index')->with('success', 'Căn hộ đã được xóa thành công.');
        } catch (\Exception $e) {
            return redirect()->route('apartments.index')->with('error', 'Không thể xóa căn hộ. Vui lòng thử lại sau.');
        }
    }
    /**
     * Hiển thị form chỉnh sửa thông tin của một căn hộ.
     */
    public function edit($id)
    {
        $apartment = Canho::findOrFail($id);
        $listToaNha = DB::table('toanha')->select('ma_toa_nha', 'ten_toa_nha')->get();
        $listCuDan = DB::table('cudan')->select('MaCuDan', 'HoTenCuDan')->get();
        return view('admin.chinh_sua_can_ho', ['apartment' => $apartment, 'listToaNha' => $listToaNha, 'listCuDan' => $listCuDan]);
    }

    /**
     * Cập nhật thông tin của một căn hộ.
     */
    public function update(Request $request, $id)
    {
        $apartment = Canho::findOrFail($id);
        $apartment->update($request->all());
        return redirect()->route('apartments.index');
    }
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $keyword = $request->input('keyword');

        // Tìm kiếm các căn hộ có mã căn hộ, mã tòa nhà hoặc mã cư dân chứa từ khóa
        $apartments = Canho::where('MaCanHo', 'like', "%$keyword%")
                            ->orWhere('ma_toa_nha', 'like', "%$keyword%")
                        ->orWhere('MaCuDan', 'like', "%$keyword%")
                        ->orWhere('SoPhong', 'like', "%$keyword%")
                        ->orWhere('DienTich', 'like', "%$keyword%")
                        ->orWhere('TinhTrang', 'like', "%$keyword%")
                        ->get();
        // Trả về view hiển thị danh sách căn hộ tìm kiếm được
        return view('admin.quan_ly_can_ho', ['apartments' => $apartments]);
    }




}
