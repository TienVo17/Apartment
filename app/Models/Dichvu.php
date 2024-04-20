<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dichvu
 * 
 * @property int $MaDichVu
 * @property string|null $TenDichVu
 * @property string|null $MoTa
 * @property float|null $Gia
 * @property string|null $LoaiDichVu
 *
 * @package App\Models
 */
class Dichvu extends Model
{
	protected $table = 'dichvu';
	protected $primaryKey = 'MaDichVu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MaDichVu' => 'int',
		'Gia' => 'float'
	];

	protected $fillable = [
		'TenDichVu',
		'MoTa',
		'Gia',
		'LoaiDichVu'
	];
}
