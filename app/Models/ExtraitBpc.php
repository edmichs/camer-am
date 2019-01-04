<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExtraitBpc
 * 
 * @property int $ID
 * @property int $PrestationID
 * @property int $Medecin_conseilID
 * @property int $AssureID
 * @property int $BpcID
 * @property int $Centre_santeID
 *
 * @property \App\Models\Assure $assure
 * @property \App\Models\Prestation $prestation
 * @property \App\Models\Bpc $bpc
 * @property \App\Models\MedecinConseil $medecin_conseil
 *
 * @package App\Models
 */
class ExtraitBpc extends Model
{
	protected $table = 'extrait_bpc';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'AffectionID' => 'int',
		'Medecin_conseilID' => 'int',
		'AssureID' => 'int',
		'BpcID' => 'int',
		'Centre_santeID' => 'int',
		'PoliceID' => 'int'
	];

	protected $fillable = [
		'AffectionID',
		'Medecin_conseilID',
		'AssureID',
		'BpcID',
		'Centre_santeID',
		'PoliceID'
	];

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}
	public function affection()
	{
		return $this->belongsTo(\App\Models\Affection::class, 'AffectionID');
	}

	public function police()
	{
		return $this->belongsTo(\App\Models\Police::class, 'PoliceID');
	}

	public function bpc()
	{
		return $this->belongsTo(\App\Models\Bpc::class, 'BpcID');
	}

	public function medecin_conseil()
	{
		return $this->belongsTo(\App\Models\MedecinConseil::class, 'Medecin_conseilID');
	}
	public function centre_sante()
	{
		return $this->belongsTo(\App\Models\CentreSante::class, 'Centre_santeID');
	}
	public function extrait_bpc()
	{
		return $this->hasMany(\App\Models\Extrait_prestation::class, 'Extrait_bpcID');
	}
}
