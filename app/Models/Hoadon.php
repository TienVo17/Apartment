<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hoadon
 *
 * @property int $MaHoaDon
 * @property int|null $MaYeuCau
 * @property int|null $SoLuong
 * @property float|null $DonGia
 * @property Carbon|null $NgayLap
 * @property string|null $TrangThai
 *
 * @package App\Models
 */
class Hoadon extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'MaHoaDon';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'MaHoaDon' => 'int',
        'MaYeuCau' => 'int',
        'SoLuong' => 'int',
        'DonGia' => 'float',
        'NgayLap' => 'datetime'
    ];

    protected $fillable = [
        'MaYeuCau',
        'SoLuong',
        'DonGia',
        'NgayLap',
        'TrangThai'
    ];
}
