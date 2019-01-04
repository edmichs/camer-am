<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assure
 * 
 * @property int $ID
 * @property int $RemboursementsID
 * @property int $PoliceID
 * @property int $SuccursaleID
 * @property int $Code_familleID
 * @property int $Type_EmployeID
 * @property int $ExerciceID
 * @property string $Matricule
 * @property string $Nom
 * @property string $Avatar
 * @property string $Lieu_naiss
 * @property \Carbon\Carbon $Datenaiss
 * @property int $Situa_marital
 * @property int $Type
 * @property string $Fct_employe
 * @property string $Observation
 * @property float $Taux_couverture
 * @property float $Plafond
 * @property float $Encour_conso
 * @property float $Solde
 * @property string $Nationalite
 * @property \Carbon\Carbon $Date_incorporation
 * @property string $Discriminator
 * @property int $AssureID
 * @property int $Montant_prime
 *
 * @property \App\Models\CodeFamille $code_famille
 * @property \App\Models\Succursale $succursale
 * @property \App\Models\Exercice $exercice
 * @property \App\Models\Police $police
 * @property \App\Models\TypeEmploye $type_employe
 * @property \Illuminate\Database\Eloquent\Collection $bonus_maluses
 * @property \Illuminate\Database\Eloquent\Collection $bpcs
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 * @property \Illuminate\Database\Eloquent\Collection $extrait_bpcs
 * @property \Illuminate\Database\Eloquent\Collection $remboursements
 *
 * @package App\Models
 */
class Assure extends Model
{
	protected $table = 'assure';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'RemboursementsID' => 'int',
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
		'RemboursementsID',
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
		'AssureID',
		'Montant_prime'
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

	public function bonus_maluses()
	{
		return $this->hasMany(\App\Models\BonusMalus::class, 'AssureID');
	}

	public function bpcs()
	{
		return $this->hasMany(\App\Models\Bpc::class, 'AssureID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'AssureID');
	}

	public function extrait_bpc()
	{
		return $this->hasMany(\App\Models\ExtraitBpc::class, 'AssureID');
	}

	public function remboursements()
	{
		return $this->hasMany(\App\Models\Remboursement::class, 'AssureID');
	}
}
