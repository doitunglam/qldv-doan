<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hoatdong
 *
 * @property string $MaHD
 * @property string $TenHD
 *
 * @package App\Models
 */
class Hoatdong extends Model
{
	protected $table = 'hoatdong';
	protected $primaryKey = 'MaHD';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'MaHD',
		'TenHD'
	];
}
