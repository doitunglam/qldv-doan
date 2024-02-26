<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lich
 * 
 * @property int $MaLich
 * @property string $MaCD
 * @property string $HocKy
 * @property Carbon $ThoiDiem
 * @property string|null $TrangThai
 *
 * @package App\Models
 */
class Lich extends Model
{
	protected $table = 'lich';
	protected $primaryKey = 'MaLich';
	public $timestamps = false;

	protected $casts = [
		'ThoiDiem' => 'datetime'
	];

	protected $fillable = [
		'MaCD',
		'HocKy',
		'ThoiDiem',
		'TrangThai'
	];
}
