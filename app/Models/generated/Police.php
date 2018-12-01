<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Police
 * 
 * @property int $ID
 * @property int $EtablissementID
 * @property int $SuccursaleID
 * @property int $ExerciceID
 * @property \Carbon\Carbon $Date_souscription
 * @property \Carbon\Carbon $Date_emission
 * @property \Carbon\Carbon $Date_effet
 * @property \Carbon\Carbon $Date_echeance
 * @property float $Prime_total
 * @property string $Accessoires
 * @property float $Prime_nette
 * @property float $Plafond_garanti
 * @property string $Numero_police
 * 
 * @property \App\Models\Etablissement $etablissement
 * @property \App\Models\Succursale $succursale
 * @property \App\Models\Exercice $exercice
 * @property \Illuminate\Database\Eloquent\Collection $assures
 * @property \Illuminate\Database\Eloquent\Collection $bareme_prestations
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 * @property \Illuminate\Database\Eloquent\Collection $remboursements
 *
 * @package App\Models
 */
class Police extends Eloquent
{
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'EtablissementID' => 'int',
		'SuccursaleID' => 'int',
		'ExerciceID' => 'int',
		'Prime_total' => 'float',
		'Prime_nette' => 'float',
		'Plafond_garanti' => 'float'
	];

	protected $dates = [
		'Date_souscription',
		'Date_emission',
		'Date_effet',
		'Date_echeance'
	];

	protected $fillable = [
		'EtablissementID',
		'SuccursaleID',
		'ExerciceID',
		'Date_souscription',
		'Date_emission',
		'Date_effet',
		'Date_echeance',
		'Prime_total',
		'Accessoires',
		'Prime_nette',
		'Plafond_garanti',
		'Numero_police'
	];

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'EtablissementID');
	}

	public function succursale()
	{
		return $this->belongsTo(\App\Models\Succursale::class, 'SuccursaleID');
	}

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}

	public function assures()
	{
		return $this->hasMany(\App\Models\Assure::class, 'PoliceID');
	}

	public function bareme_prestations()
	{
		return $this->hasMany(\App\Models\BaremePrestation::class, 'PoliceID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'PoliceID');
	}

	public function remboursements()
	{
		return $this->hasMany(\App\Models\Remboursement::class, 'PoliceID');
	}
}
