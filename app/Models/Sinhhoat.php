<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sinhhoat
 *
 * @property string $MaDV
 * @property string $MaHD
 * @property Carbon $NgayBatDau
 * @property Carbon $NgayKetThuc
 * @property string $DiaDiem
 *
 * @package App\Models
 */
class Sinhhoat extends Model
{
	protected $table = 'sinhhoat';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NgayBatDau' => 'datetime',
		'NgayKetThuc' => 'datetime'
	];

	protected $fillable = [
		'MaDV',
		'MaHD',
		'NgayBatDau',
		'NgayKetThuc',
		'DiaDiem'
	];
}
