<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Affection
 * @package App\Models
 * @version December 1, 2018, 7:13 am UTC
 *
 * @property string code
 * @property string description
 */
class Affection extends Model
{
   // use SoftDeletes;

    public $table = 'affection';
    protected $primaryKey = 'ID';

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'Code',
        'Description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Code' => 'string',
        'Description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Code' => 'nullable',
        'Description' => 'nullable'
    ];

    public function bpc()
    {
        return $this->hasMany(\App\Models\Bpc::class, 'AffectionID');
    }
    public function decomptes()
    {
        return $this->hasMany(\App\Models\Decompte::class, 'AffectionID');
    }
}
