<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extrait_prestation extends Model
{
    protected $table = 'extrait_prestation';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $casts = [
        'PrestationID' => 'int',
        'BpcID' => 'int'
    ];

    protected $fillable = [
        'PrestationID',
        'BpcID'
    ];

    public function prestation()
    {
        return $this->belongsTo(\App\Models\Prestation::class, 'PrestationID');
    }
    public function bpc()
    {
        return $this->belongsTo(\App\Models\Bpc::class, 'BpcID');
    }


}
