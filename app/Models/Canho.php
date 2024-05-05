<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canho extends Model
{
    protected $table = 'canho';
    protected $primaryKey = 'MaCanHo';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'MaCanHo' => 'int',
        'MaToaNha' => 'int',
        'MaCuDan' => 'int',
        'SoPhong' => 'int',
        'DienTich' => 'float'
    ];

    protected $fillable = [
        'MaToaNha',
        'MaCuDan',
        'SoPhong',
        'DienTich',
        'TinhTrang'
    ];

    // Lấy tất cả các căn hộ
    public static function layTatCaCacCanHo()
    {
        return self::all();
    }

    // Lấy một căn hộ cụ thể bằng ID
    public static function layCanHoTheoID($id)
    {
        return self::find($id);
    }

    // Thêm một căn hộ mới
    public static function themCanHo($data)
    {
        return self::create($data);
    }

    // Cập nhật một căn hộ đã tồn tại
    public static function capNhatCanHo($id, $data)
    {
        $canHo = self::find($id);
        if ($canHo) {
            $canHo->fill($data)->save();
            return $canHo;
        }
        return null;
    }

    // Xóa một căn hộ
    public static function xoaCanHo($id)
    {
        $canHo = self::find($id);
        if ($canHo) {
            $canHo->delete();
            return true;
        }
        return false;
    }
}
