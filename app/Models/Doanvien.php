<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doanvien
 *
 * @property string $MaDV
 * @property string $HoDV
 * @property string $TenDV
 * @property int $GioiTinh
 * @property Carbon $NgaySinh
 * @property string $Email
 * @property string $SDT
 * @property string $QueQuan
 * @property string $MaCD
 * @property Carbon $NgayVaoDoan
 *
 * @package App\Models
 */
class Doanvien extends Model
{
	protected $table = 'doanvien';
	protected $primaryKey = 'MaDV';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'GioiTinh' => 'int',
		'NgaySinh' => 'datetime',
		'NgayVaoDoan' => 'datetime'
	];

	protected $fillable = [
        'MaDV',
		'HoDV',
		'TenDV',
		'GioiTinh',
		'NgaySinh',
		'Email',
		'SDT',
		'QueQuan',
		'MaCD',
		'NgayVaoDoan'
	];
}
