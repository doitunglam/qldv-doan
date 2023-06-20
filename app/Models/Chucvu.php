<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chucvu
 *
 * @property string $MaChucVu
 * @property string $TenChucVu
 *
 * @package App\Models
 */
class Chucvu extends Model
{
	protected $table = 'chucvu';
	protected $primaryKey = 'MaChucVu';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
        'MaChucVu',
		'TenChucVu'
	];
}
