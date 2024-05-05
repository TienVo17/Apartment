<?php

namespace App\Http\Controllers;

use App\Models\CuDan;
use App\Models\Canho;

use Illuminate\Http\Request;

class CuDanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cu_dan = CuDan::all(); // Lấy tất cả dữ liệu cư dân từ database
        return view('admin.quan_ly_cu_dan', compact('cu_dan')); // Truyền dữ liệu vào view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_screen.addCudan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'HoTenCuDan' => 'required|string|max:255',
            'SoDienThoai' => 'nullable|string|max:20',
            'Email' => 'nullable|email|max:255',
            'DiaChi' => 'nullable|string|max:255',
            'NgaySinh' => 'nullable|date',
            'GioiTinh' => 'nullable|string|max:255',
            'CCCD' => 'nullable|string|max:20',
            'RentStart' => 'nullable|date',
            'RentEnd' => 'nullable|date',
        ]);

        $cudan = new Cudan();
        $cudan->HoTenCuDan = $request->input('HoTenCuDan');
        $cudan->SoDienThoai = $request->input('SoDienThoai');
        $cudan->Email = $request->input('Email');
        $cudan->DiaChi = $request->input('DiaChi');
        $cudan->NgaySinh = $request->input('NgaySinh');
        $cudan->GioiTinh = $request->input('GioiTinh');
        $cudan->CCCD = $request->input('CCCD');
        $cudan->RentStart = $request->input('RentStart');
        $cudan->RentEnd = $request->input('RentEnd');

        $cudan->save();

        return redirect()->route('quan_ly_cu_dan')->with('success', 'Thêm mới cư dân thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cu_dan = CuDan::findOrFail($id);
        $listCanho = Canho::pluck('SoPhong', 'MaCanHo'); // Lấy danh sách số phòng và ID của căn hộ
        return view('admin_screen.infoCuDan', compact('cu_dan', 'listCanho'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cu_dan = CuDan::findOrFail($id);
        $listCanho = Canho::pluck('SoPhong', 'MaCanHo'); // Lấy danh sách số phòng và ID của căn hộ
        return view('admin_screen.editCuDan', compact('cu_dan', 'listCanho'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cu_dan = CuDan::find($id);

        if (!$cu_dan) {
            return redirect()->back()->with('error', 'Không tìm thấy cư dân.');
        }

        $cu_dan = CuDan::findOrFail($id);

        if ($request->filled('HoTenCuDan')) {
            $cu_dan->HoTenCuDan = $request->input('HoTenCuDan');
        }
        if ($request->filled('NgaySinh')) {
            $cu_dan->NgaySinh = $request->input('NgaySinh');
        }
        if ($request->filled('GioiTinh')) {
            $cu_dan->GioiTinh = $request->input('GioiTinh');
        }
        if ($request->filled('SoDienThoai')) {
            $cu_dan->SoDienThoai = $request->input('SoDienThoai');
        }
        if ($request->filled('Email')) {
            $cu_dan->Email = $request->input('Email');
        }
        if ($request->filled('DiaChi')) {
            $cu_dan->DiaChi = $request->input('DiaChi');
        }
        if ($request->filled('CCCD')) {
            $cu_dan->CCCD = $request->input('CCCD');
        }
        if ($request->filled('RentStart')) {
            $cu_dan->RentStart = $request->input('RentStart');
        }
        if ($request->filled('RentEnd')) {
            $cu_dan->RentEnd = $request->input('RentEnd');
        }

        $cu_dan->save();

        return redirect()->route('quan_ly_cu_dan')->with('success', 'Cập nhật thông tin cư dân thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuDan = CuDan::find($id);

        if (!$cuDan) {
            return abort(404);
        }

        $cuDan->delete();

        return redirect()->back()->with('success', 'Xóa cư dân thành công!');
    }

    public function uploadAvatar(Request $request, $id)
    {
        // Lấy thông tin cư dân từ ID
        $cu_dan = CuDan::findOrFail($id);

        // Kiểm tra xem người dùng đã chọn ảnh chưa
        if ($request->hasFile('avatar')) {
            // Lưu ảnh vào thư mục public/uploads
            $avatarPath = $request->file('avatar')->store('public/uploads');

            // Cập nhật đường dẫn ảnh vào cột AnhDaiDien
            $cu_dan->AnhDaiDien = $avatarPath;

            // Lưu thay đổi vào database
            $cu_dan->save();
        }

    }
}
