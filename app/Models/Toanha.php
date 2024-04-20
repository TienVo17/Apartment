<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
	protected $table = 'toanha';
	protected $primaryKey = 'MaToaNha';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MaToaNha' => 'int',
		'SoLuongCanHo' => 'int',
		'SoTang' => 'int'
	];

	protected $fillable = [
		'TenToaNha',
		'SoLuongCanHo',
		'SoTang'
	];
}
