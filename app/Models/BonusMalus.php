<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class BonusMalus
 * 
 * @property int $ID
 * @property int $AssureID
 * @property int $ExerciceID
 * @property \Carbon\Carbon $Date_evenement
 * @property float $Montant
 * @property float $Montant_prime
 * @property bool $Status
 * 
 * @property \App\Models\Assure $assure
 * @property \App\Models\Exercice $exercice
 *
 * @package App\Models
 */
class BonusMalus extends Model
{
	protected $table = 'bonus_malus';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'AssureID' => 'int',
		'ExerciceID' => 'int',
		'Montant' => 'float',
		'Montant_prime' => 'float',
		'Status' => 'bool'
	];

	protected $dates = [
		'Date_evenement'
	];

	protected $fillable = [
		'AssureID',
		'ExerciceID',
		'Date_evenement',
		'Montant',
		'Montant_prime',
		'Status'
	];

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}
}
