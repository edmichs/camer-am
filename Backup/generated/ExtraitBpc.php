<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ExtraitBpc
 * 
 * @property int $ID
 * @property int $PrestationID
 * @property int $Medecin_conseilID
 * @property int $AssureID
 * @property int $BpcID
 * 
 * @property \App\Models\Assure $assure
 * @property \App\Models\Prestation $prestation
 * @property \App\Models\Bpc $bpc
 * @property \App\Models\MedecinConseil $medecin_conseil
 *
 * @package App\Models
 */
class ExtraitBpc extends Eloquent
{
	protected $table = 'extrait_bpc';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'PrestationID' => 'int',
		'Medecin_conseilID' => 'int',
		'AssureID' => 'int',
		'BpcID' => 'int'
	];

	protected $fillable = [
		'PrestationID',
		'Medecin_conseilID',
		'AssureID',
		'BpcID'
	];

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}

	public function prestation()
	{
		return $this->belongsTo(\App\Models\Prestation::class, 'PrestationID');
	}

	public function bpc()
	{
		return $this->belongsTo(\App\Models\Bpc::class, 'BpcID');
	}

	public function medecin_conseil()
	{
		return $this->belongsTo(\App\Models\MedecinConseil::class, 'Medecin_conseilID');
	}
}
