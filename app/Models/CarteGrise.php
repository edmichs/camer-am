<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class CarteGrise
 *
 * @property bigint $id
 * @property int $puissance
 * @property int $ptac
 * @property int $puissance_reelle
 * @property int $energie
 * @property int $nbre_places
 * @property string $immatriculation
 * @property string $marque
 * @property string $type
 * @property string $genre
 * @property date $date_first_circulation
 * @property string $nom
 * @property string $ssdt
 * @property string $carrosserie
 * @property string $numero_serie
 * @property float valeur_neuf
 * @property float $valeur_venale
 * @property float $poids_vide
 * @property string $chassis
 * @property date $date_delivre
 *
 * @package App\Models */

class CarteGrise extends Model
{
    protected $primaryKey = 'id';
    public $table = 'carte_grise';
    protected $casts = [
        'puissance' => 'int',
        'ptac' => 'int',
        'puissance_reelle' => 'int',
        'valeur_neuf' => 'float',
        'valeur_venale' => 'float',
        'energie' => 'int',
        'nbre_places' => 'int',
        'poids_vide' => 'float',
        'date_delivre' => 'date',
    ];



    protected $fillable = [
        'immatriculation',
        'marque',
        'puissance_id',
        'type',
        'genre',
        'date_first_circulation',
        'nom',
        'ssdt',
        'carrosserie',
        'ptac',
        'numero_serie',
        'puissance_reelle',
        'valeur_neuf',
        'valeur_venale',
        'energie',
        'nbre_places',
        'poids_vide',
        'chassis',
        'charge_utile',
        'date_delivre'
    ]; 


    public function automobile()
    {
        return $this->hasMany(\App\Models\Automobile::class, 'carte_grise_id');
    }

    public function puissance()
    {
        return $this->belongsTo(\App\Models\Puissance::class,'puissance_id');
    }
}
