<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraitDecompte extends Model
{
    protected $table = 'extrait_decompte';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $casts = [
        'DecompteID' => 'int'

    ];

    protected $fillable = [
        'DecompteID'
    ];
}
