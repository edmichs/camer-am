<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Police extends Model
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
		'Date_effet'
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
	public function categorie_assure()
	{
		return $this->hasMany(\App\Models\CategorieAssure::class, 'policeId');
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
	public function automobile()
	{
		return $this->hasMany(\App\Models\Automobile::class, 'police_id');
	}
	public function incorporations()
	{
		return $this->hasMany(\App\Models\Incorporation::class, 'PoliceID');
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
	public function bpc()
	{
		return $this->hasMany(\App\Models\Bpc::class, 'PoliceID');
	}

	/**
	 * @return int
	 */
	public function getID()
	{
		return $this->ID;
	}

	/**
	 * @param int $ID
	 */
	public function setID($ID)
	{
		$this->ID = $ID;
	}

	/**
	 * @return int
	 */
	public function getEtablissementID()
	{
		return $this->EtablissementID;
	}

	/**
	 * @param int $EtablissementID
	 */
	public function setEtablissementID($EtablissementID)
	{
		$this->EtablissementID = $EtablissementID;
	}

	/**
	 * @return int
	 */
	public function getSuccursaleID()
	{
		return $this->SuccursaleID;
	}

	/**
	 * @param int $SuccursaleID
	 */
	public function setSuccursaleID($SuccursaleID)
	{
		$this->SuccursaleID = $SuccursaleID;
	}

	/**
	 * @return int
	 */
	public function getExerciceID()
	{
		return $this->ExerciceID;
	}

	/**
	 * @param int $ExerciceID
	 */
	public function setExerciceID($ExerciceID)
	{
		$this->ExerciceID = $ExerciceID;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	public function getDateSouscription()
	{
		return $this->Date_souscription;
	}

	/**
	 * @param \Carbon\Carbon $Date_souscription
	 */
	public function setDateSouscription($Date_souscription)
	{
		$this->Date_souscription = $Date_souscription;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	public function getDateEmission()
	{
		return $this->Date_emission;
	}

	/**
	 * @param \Carbon\Carbon $Date_emission
	 */
	public function setDateEmission($Date_emission)
	{
		$this->Date_emission = $Date_emission;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	public function getDateEffet()
	{
		return $this->Date_effet;
	}

	/**
	 * @param \Carbon\Carbon $Date_effet
	 */
	public function setDateEffet($Date_effet)
	{
		$this->Date_effet = $Date_effet;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	public function getDateEcheance()
	{
		return $this->Date_echeance;
	}

	/**
	 * @param \Carbon\Carbon $Date_echeance
	 */
	public function setDateEcheance($Date_echeance)
	{
		$this->Date_echeance = $Date_echeance;
	}

	/**
	 * @return float
	 */
	public function getPrimeTotal()
	{
		return $this->Prime_total;
	}

	/**
	 * @param float $Prime_total
	 */
	public function setPrimeTotal($Prime_total)
	{
		$this->Prime_total = $Prime_total;
	}

	/**
	 * @return string
	 */
	public function getAccessoires()
	{
		return $this->Accessoires;
	}

	/**
	 * @param string $Accessoires
	 */
	public function setAccessoires($Accessoires)
	{
		$this->Accessoires = $Accessoires;
	}

	/**
	 * @return float
	 */
	public function getPrimeNette()
	{
		return $this->Prime_nette;
	}

	/**
	 * @param float $Prime_nette
	 */
	public function setPrimeNette($Prime_nette)
	{
		$this->Prime_nette = $Prime_nette;
	}

	/**
	 * @return float
	 */
	public function getPlafondGaranti()
	{
		return $this->Plafond_garanti;
	}

	/**
	 * @param float $Plafond_garanti
	 */
	public function setPlafondGaranti($Plafond_garanti)
	{
		$this->Plafond_garanti = $Plafond_garanti;
	}

	/**
	 * @return string
	 */
	public function getNumeroPolice()
	{
		return $this->Numero_police;
	}

	/**
	 * @param string $Numero_police
	 */
	public function setNumeroPolice($Numero_police)
	{
		$this->Numero_police = $Numero_police;
	}

}
