<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Exercice
 * 
 * @property int $ID
 * @property \Carbon\Carbon $Date_debut
 * @property \Carbon\Carbon $Date_fin
 * @property bool $Cloture
 * @property \Carbon\Carbon $Date_cloture
 * @property string $Code
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assures
 * @property \Illuminate\Database\Eloquent\Collection $bonus_maluses
 * @property \Illuminate\Database\Eloquent\Collection $bpcs
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 * @property \Illuminate\Database\Eloquent\Collection $police
 * @property \Illuminate\Database\Eloquent\Collection $remboursements
 *
 * @package App\Models
 */
class Exercice extends Model
{
	protected $table = 'exercice';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Cloture' => 'bool'
	];

	protected $dates = [
		'Date_debut',
		'Date_fin',
		'Date_cloture'
	];

	protected $fillable = [
		'Date_debut',
		'Date_fin',
		'Cloture',
		'Date_cloture',
		'Code'
	];

	public function assures()
	{
		return $this->hasMany(\App\Models\Assure::class, 'ExerciceID');
	}
	public function categorie_assure()
	{
		return $this->hasMany(\App\Models\CategorieAssure::class, 'exerciceId');
	}
	public function incorporations()
	{
		return $this->hasMany(\App\Models\Incorporation::class, 'ExerciceID');
	}

	public function bonus_maluses()
	{
		return $this->hasMany(\App\Models\BonusMalus::class, 'ExerciceID');
	}

	public function bpcs()
	{
		return $this->hasMany(\App\Models\Bpc::class, 'ExerciceID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'ExerciceID');
	}

	public function police()
	{
		return $this->hasMany(\App\Models\Police::class, 'ExerciceID');
	}

	public function remboursements()
	{
		return $this->hasMany(\App\Models\Remboursement::class, 'ExerciceID');
	}
}
