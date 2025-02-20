<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cudan
 *
 * @property int $MaCuDan
 * @property string|null $HoTenCuDan
 * @property string|null $SoDienThoai
 * @property string|null $Email
 * @property string|null $DiaChi
 * @property Carbon|null $NgaySinh
 * @property string|null $GioiTinh
 * @property bool|null $LaChuHo
 *
 * @package App\Models
 */
class Cudan extends Model
{
    protected $table = 'cudan';
    protected $primaryKey = 'MaCuDan';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'MaCuDan' => 'int',
        'NgaySinh' => 'datetime',
        'LaChuHo' => 'bool'
    ];

    protected $fillable = [
        'HoTenCuDan',
        'SoDienThoai',
        'Email',
        'DiaChi',
        'NgaySinh',
        'GioiTinh',
        'LaChuHo',
        'AnhDaiDien',
        'CCCD',
        'RentStart',
        'RentEnd',

    ];
}
