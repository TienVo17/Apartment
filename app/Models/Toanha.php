<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Toanha
 *
 * @property int $MaToaNha
 * @property string|null $TenToaNha
 * @property int|null $SoLuongCanHo
 * @property int|null $SoTang
 *
 * @package App\Models
 */
class Toanha extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'toanha';
    protected $primaryKey = 'ma_toa_nha';
    public $incrementing = true;

    protected $fillable = [
        'ten_toa_nha',
        'so_luong_can_ho',
        'so_tang',
    ];
}
