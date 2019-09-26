<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tarif extends Model
{
    protected $table = 'tarifs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'categorie_tarif_id' => 'int',
        'puissance_id' => 'int',
        'garanti_id' => 'int',
        'duree' => 'int',
        'prime_nette' => 'float',
        'pttc' => 'float',
        'carte_rose' => 'float',
        'accessoires' => 'float',
        'tva' => 'float',

    ];



    protected $fillable = [
        'categorie_tarif_id',
        'puissance_id',
        'garanti_id',
        'duree',
        'prime_nette',
        'pttc',
        'carte_rose',
        'accessoires',
        'carrosserie',
       'tva'
    ];

    public function categorie_tarif()
    {
        return $this->belongsTo(\App\Models\Categorie_tarif::class,'categorie_tarif_id');
    }

    public function puissance()
    {
        return $this->belongsTo(\App\Models\Puissance::class, 'puissance_id');
    }

    public function garanti()
    {
        return $this->belongsTo(\App\Models\Garanti::class,'garanti_id');
    }

    public function garanti_automobile()
    {
        return $this->hasMany(\App\Models\GarantiAutomobile::class,'tarifs_id');
    }
}
