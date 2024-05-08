<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

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
    use HasCompositeKey;
    protected $table = 'renluyen';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = ['MaDV', 'HocKy'];
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
