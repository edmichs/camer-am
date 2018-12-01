<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Affection
 * @package App\Models
 * @version December 1, 2018, 6:07 am UTC
 *
 * @property string code
 * @property string description
 */
class Affection extends Model
{
    use SoftDeletes;

    public $table = 'affections';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'nullable',
        'description' => 'nullable'
    ];

    
}
