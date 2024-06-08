<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thongbao
 * 
 * @property int $MaTB
 * @property int $MaDV
 * @property int $Khoa
 * @property string $NoiDung
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Thongbao extends Model
{
	protected $table = 'thongbao';
	protected $primaryKey = 'MaTB';

	protected $casts = [
		'MaDV' => 'int',
		'Khoa' => 'int'
	];

	protected $fillable = [
		'MaDV',
		'Khoa',
		'NoiDung'
	];
}
