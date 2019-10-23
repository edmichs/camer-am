<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    /**
 * Class Medecin
 * 
 * @property int $ID
 * @property string $souscripteur_id
 * @property string $
 * @property string $Email
 * @property string $Matricule
 *
 * @package App\Models
 */
class Maladie extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'souscripteur_id' => 'int',
        'centre_sante_id' => 'int',
        'garanti_extension' => 'boolean',
        'exercice_id' => 'int',
        'assure_id' => 'int',
    ];



    protected $fillable = [
        'centre_sante_id',
        'souscripteur_id',
        'garanti_extension',
        'exercice_id',
        'assure_id',
        'conducteur_habituel',
        'type'
    ];
}
