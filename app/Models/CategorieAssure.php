<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class CategorieAssure
 *
 * @property int $id
 * @property string $plafond
 *@property string $montant_prime
 *
 * @property \Illuminate\Database\Eloquent\Collection $police
 * @property \Illuminate\Database\Eloquent\Collection $typeEmploye
 *
 * @package App\Models*/

class CategorieAssure extends Model
{
    protected $table = 'categorie_assures';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'policeId','typeEmployeId', 'plafond','montant_prime','exerciceId'
    ];

    public function police()
    {
        return $this->belongsTo(\App\Models\Police::class, 'policeId');
    }
    public function type_employe()
    {
        return $this->belongsTo(\App\Models\TypeEmploye::class, 'typeEmployeId');
    }
    public function exercice()
    {
        return $this->belongsTo(\App\Models\Exercice::class, 'exerciceId');
    }


}
