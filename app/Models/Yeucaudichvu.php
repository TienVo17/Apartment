<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Yeucaudichvu
 * 
 * @property int $MaYeuCau
 * @property int|null $MaCanHo
 * @property int|null $MaDichVu
 * @property Carbon|null $ThoiGianYeuCau
 * @property string|null $GhiChu
 *
 * @package App\Models
 */
class Yeucaudichvu extends Model
{
	protected $table = 'yeucaudichvu';
	protected $primaryKey = 'MaYeuCau';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MaYeuCau' => 'int',
		'MaCanHo' => 'int',
		'MaDichVu' => 'int',
		'ThoiGianYeuCau' => 'datetime'
	];

	protected $fillable = [
		'MaCanHo',
		'MaDichVu',
		'ThoiGianYeuCau',
		'GhiChu'
	];
}
