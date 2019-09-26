<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puissance
 * 
 * @property int $id
 * @property string $numero
 * 
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 *
 * @package App\Models
 */
class Puissance extends Model
{

    protected $fillable = [
        'min',
        'max',
        'type'
    ];

    public function tarif()
    {
        return $this->hasMany(\App\Models\Tarif::class,'puissance_id');
    }

    public function carte_grise()
    {
        return $this->hasMany(\App\Models\CarteGrise::class, 'puissance');
    }
}
