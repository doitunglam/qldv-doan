<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Khoa
 *
 * @property string $MaKhoa
 * @property string $TenKhoa
 * @property string $SDT
 *
 * @package App\Models
 */
class Khoa extends Model
{
	protected $table = 'khoa';
	protected $primaryKey = 'MaKhoa';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'MaKhoa',
		'TenKhoa',
		'SDT'
	];
}
