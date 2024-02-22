<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Renluyen
 *
 * @property string $MaDV
 * @property string $HocKy
 * @property int $Diem
 * @property string $XepLoai
 *
 * @package App\Models
 */
class Renluyen extends Model
{
    protected $table = 'renluyen';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'MaDV';
    protected $casts = [
        'Diem' => 'int'
    ];

    protected $fillable = [
        'MaDV',
        'HocKy',
        'Diem',
        'XepLoai'
    ];
}
