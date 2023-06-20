<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doanphi
 *
 * @property string $MaDV
 * @property int $HK1
 * @property int $HK2
 * @property int $HK3
 * @property int $HK4
 * @property int $HK5
 * @property int $HK6
 * @property int $HK7
 * @property int $HK8
 *
 * @package App\Models
 */
class Doanphi extends Model
{
	protected $table = 'doanphi';
	protected $primaryKey = 'MaDV';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'HK1' => 'int',
		'HK2' => 'int',
		'HK3' => 'int',
		'HK4' => 'int',
		'HK5' => 'int',
		'HK6' => 'int',
		'HK7' => 'int',
		'HK8' => 'int'
	];

	protected $fillable = [
        'MaDV',
		'HK1',
		'HK2',
		'HK3',
		'HK4',
		'HK5',
		'HK6',
		'HK7',
		'HK8'
	];
}
