<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarantiAutomobile extends Model
{
    protected $table = 'garanti_automobile';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'automobile_id' => 'int',
        'tarifs_id' => 'int',
        'garanti_id' => 'int',
    ];



    protected $fillable = [
        'automobile_id',
        'tarifs_id',
        'garanti_id',
        'etat',
    ];
    public function automobile()
    {
        return $this->belongsTo(\App\Models\Automobile::class, 'automobile_id');
    }

    public function tarifs()
    {
        return $this->belongsTo(\App\Models\Tarif::class, 'tarifs_id');
    }

    public function garanti()
    {
        return $this->belongsTo(\App\Models\Garanti::class, 'garanti_id');
    }
}
