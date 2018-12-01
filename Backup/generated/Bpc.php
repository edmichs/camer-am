<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

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
class Bpc extends Eloquent
{
	protected $table = 'bpc';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ExerciceID' => 'int',
		'AssureID' => 'int',
		'Plafond_remboursement' => 'float',
		'Taux_couverture' => 'float'
	];

	protected $fillable = [
		'ExerciceID',
		'AssureID',
		'Numero_bpc',
		'Formation_sanitaire',
		'Plafond_remboursement',
		'Taux_couverture'
	];

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'BpcID');
	}

	public function extrait_bpcs()
	{
		return $this->hasMany(\App\Models\ExtraitBpc::class, 'BpcID');
	}
}
