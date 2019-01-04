<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Remboursement
 * 
 * @property int $ID
 * @property int $PoliceID
 * @property int $PrestationID
 * @property int $DecompteID
 * @property int $ExerciceID
 * @property float $Montant_prestation
 * @property float $Montant_retenu
 * @property float $Montant_payer
 * @property float $Taux_remboursement
 * @property int $AssureID
 * @property smallint $statut
 * @property \App\Models\Decompte $decompte
 * @property \App\Models\Exercice $exercice
 * @property \App\Models\Assure $assure
 * @property \App\Models\Prestation $prestation
 * @property \App\Models\Police $police
 *
 * @package App\Models
 */
class Remboursement extends Model
{
	protected $primaryKey = 'ID';
	public $timestamps = false;
	protected $table = 'remboursements';

	protected $casts = [
		'PoliceID' => 'int',
		'PrestationID' => 'int',
		'DecompteID' => 'int',
		'ExerciceID' => 'int',
		'Montant_prestation' => 'float',
		'Montant_retenu' => 'float',
		'Montant_payer' => 'float',
		'Taux_remboursement' => 'float',
		'AssureID' => 'int'
	];

	protected $fillable = [
		'PoliceID',
		'PrestationID',
		'DecompteID',
		'ExerciceID',
		'Montant_prestation',
		'Montant_retenu',
		'Montant_payer',
		'Taux_remboursement',
		'AssureID',
		'statut'
	];

	public function decompte()
	{
		return $this->belongsTo(\App\Models\Decompte::class, 'DecompteID');
	}

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}

	public function prestation()
	{
		return $this->belongsTo(\App\Models\Prestation::class, 'PrestationID');
	}

	public function police()
	{
		return $this->belongsTo(\App\Models\Police::class, 'PoliceID');
	}
}
