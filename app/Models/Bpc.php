<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bpc
 * 
 * @property int $ID
 * @property int $ExerciceID
 * @property int $AssureID
 * @property string $Numero_bpc
 * @property string $Formation_sanitaire
 * @property float $Plafond_remboursement
 * @property float $Taux_couverture
 * 
 * @property \App\Models\Exercice $exercice
 * @property \App\Models\Assure $assure
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 * @property \Illuminate\Database\Eloquent\Collection $extrait_bpcs
 *
 * @package App\Models
 */
class Bpc extends Model
{
	protected $table = 'bpc';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ExerciceID' => 'int',
		'AssureID' => 'int',
		'Centre_santeID' => 'int',
		'AffectionID' => 'int',
		'Medecin_conseilID' => 'int',
		'PoliceID' => 'int'
	];

	protected $fillable = [
		'ExerciceID',
		'AssureID',
		'Numero_bpc',
		'Formation_sanitaire',
		'Centre_santeID',
		'Medecin_conseilID',
		'AffectionID',
		'PoliceID',
		'Date_declaration',
		'Date_sinistre'
	];

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}
    public function centre_sante()
	{
		return $this->belongsTo(\App\Models\CentreSante::class, 'Centre_santeID');
	}
    public function medecin_conseil()
	{
		return $this->belongsTo(\App\Models\MedecinConseil::class, 'Medecin_conseilID');
	}
    public function affection()
	{
		return $this->belongsTo(\App\Models\Affection::class, 'AffectionID');
	}
    public function police()
	{
		return $this->belongsTo(\App\Models\Police::class, 'PoliceID');
	}

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'BpcID');
	}

	public function extrait_bpc()
	{
		return $this->hasMany(\App\Models\ExtraitBpc::class, 'BpcID');
	}
	public function extrait_prestation()
	{
		return $this->hasMany(\App\Models\Extrait_prestation::class, 'BpcID');
	}
}
