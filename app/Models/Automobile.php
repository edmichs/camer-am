<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Automobile
 *
 * @property bigint $id
 * @property int $police_id
 * @property bigint $carte_grise_id
 * @property int $assure_id
 * @property int $garanti_id
 * @property string $conducteur_habituel
 * @property string $type
 *
 * @property \App\Models\Police $police
 * @property \App\Models\CarteGrise $carte_grise
 * @property \App\Models\Assure $assure
 * @property \App\Models\Garanti $garanti
 *
 * @package App\Models
 */
class Automobile extends Model
{
    protected $table = 'automobile';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'police_id' => 'int',
        'souscripteur_id' => 'int',
        'carte_grise_id' => 'int',
        'exercice_id' => 'int',
        'assure_id' => 'int',
        'statut' => 'int'
    ];



    protected $fillable = [
        'police_id',
        'souscripteur_id',
        'carte_grise_id',
        'exercice_id',
        'assure_id',
        'conducteur_habituel',
        'type',
        'statut',
    ];

        public function police()
        {
            return $this->belongsTo(\App\Models\Police::class, 'police_id');
        }

        public function assure()
        {
            return $this->belongsTo(\App\Models\Assure::class, 'assure_id');
        }

        public function carte_grise()
        {
            return $this->belongsTo(\App\Models\CarteGrise::class, 'carte_grise_id');
        }

        public function garanti()
        {
            return $this->belongsTo(\App\Models\Garanti::class, 'garanti_id');
        }
        public function souscripteur()
        {
            return $this->belongsTo(\App\Models\Souscripteur::class, 'souscripteur_id');
        }

        public function garanti_automobile()
        {
            return $this->hasMany(\App\Models\GarantiAutomobile::class, 'automobile_id');
        }

}
