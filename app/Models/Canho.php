<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Canho
 * 
 * @property int $MaCanHo
 * @property int|null $MaToaNha
 * @property int|null $MaCuDan
 * @property int|null $SoPhong
 * @property float|null $DienTich
 * @property string|null $TinhTrang
 *
 * @package App\Models
 */
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
}
