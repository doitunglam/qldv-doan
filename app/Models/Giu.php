<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Giu
 *
 * @property string $MaDV
 * @property string $MaChucVu
 * @property Carbon $NgayNhanChuc
 * @property Carbon $NgayHetNhiemKy
 *
 * @package App\Models
 */
class Giu extends Model
{
	protected $table = 'giu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NgayNhanChuc' => 'datetime',
		'NgayHetNhiemKy' => 'datetime'
	];

	protected $fillable = [
		'MaDV',
		'MaChucVu',
		'NgayNhanChuc',
		'NgayHetNhiemKy'
	];
}
