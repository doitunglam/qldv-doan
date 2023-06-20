<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sodoan
 *
 * @property string $MaSD
 * @property string $MaDV
 * @property int $SoLanKhenThuong
 * @property int $SoLanKyLuat
 * @property string $NangKhieu
 * @property string $XepLoai
 * @property string $NhanXet
 *
 * @package App\Models
 */
class Sodoan extends Model
{
	protected $table = 'sodoan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SoLanKhenThuong' => 'int',
		'SoLanKyLuat' => 'int'
	];

	protected $fillable = [
		'MaSD',
		'MaDV',
		'SoLanKhenThuong',
		'SoLanKyLuat',
		'NangKhieu',
		'XepLoai',
		'NhanXet'
	];
}
