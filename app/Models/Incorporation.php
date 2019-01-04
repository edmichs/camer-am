<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Incorporation
 * 
 * @property int $id
 * @property string $code_famille
 * @property string $reference
 * @property string $nom
 * @property string $avatar
 * @property string $lieu_naiss
 * @property string $datenaiss
 * @property int $situa_marital
 * @property int $type
 * @property string $nationalite
 * @property string $nom_ste
 * @property string $observation
 * @property int $numero_police
 * @property float $taux_couverture
 * @property float $plafond
 * @property float $encour_conso
 * @property float $solde
 * @property int $etablissement_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Incorporation extends Model
{
	public $incrementing = false;
	protected $table = 'incorporation';
	protected $primaryKey = 'ID';
	public $timestamps = false;
	protected $casts = [
		'PoliceID' => 'int',
		'SuccursaleID' => 'int',
		'Code_familleID' => 'int',
		'Type_EmployeID' => 'int',
		'ExerciceID' => 'int',
		'Situa_marital' => 'int',
		'Type' => 'int',
		'Taux_couverture' => 'float',
		'Plafond' => 'float',
		'Encour_conso' => 'float',
		'Solde' => 'float',
		'AssureID' => 'int'
	];
	protected $dates = [
		'Datenaiss',
		'Date_incorporation'
	];

	protected $fillable = [
		'PoliceID',
		'SuccursaleID',
		'Code_familleID',
		'Type_EmployeID',
		'ExerciceID',
		'Matricule',
		'Nom',
		'Avatar',
		'Lieu_naiss',
		'Datenaiss',
		'Situa_marital',
		'Type',
		'Fct_employe',
		'Observation',
		'Taux_couverture',
		'Plafond',
		'Encour_conso',
		'Solde',
		'Nationalite',
		'Date_incorporation',
		'Discriminator',
		'AssureID'
	];
	public function code_famille()
	{
		return $this->belongsTo(\App\Models\CodeFamille::class, 'Code_familleID');
	}

	public function succursale()
	{
		return $this->belongsTo(\App\Models\Succursale::class, 'SuccursaleID');
	}

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}

	public function police()
	{
		return $this->belongsTo(\App\Models\Police::class, 'PoliceID');
	}

	public function type_employe()
	{
		return $this->belongsTo(\App\Models\TypeEmploye::class, 'Type_EmployeID');
	}
}
