<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Incorporation
 * 
 * @property int $id
 * @property string $code_famille
 * @property string $reference
 * @property string $nom
 * @property string $avatar
 * @property string $lieu_naiss
 * @property string $datenaiss
 * @property int $situa_marital
 * @property int $type
 * @property string $nationalite
 * @property string $nom_ste
 * @property string $observation
 * @property int $numero_police
 * @property float $taux_couverture
 * @property float $plafond
 * @property float $encour_conso
 * @property float $solde
 * @property int $etablissement_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Incorporation extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'situa_marital' => 'int',
		'type' => 'int',
		'numero_police' => 'int',
		'taux_couverture' => 'float',
		'plafond' => 'float',
		'encour_conso' => 'float',
		'solde' => 'float',
		'etablissement_id' => 'int'
	];

	protected $fillable = [
		'code_famille',
		'reference',
		'nom',
		'avatar',
		'lieu_naiss',
		'datenaiss',
		'situa_marital',
		'type',
		'nationalite',
		'nom_ste',
		'observation',
		'numero_police',
		'taux_couverture',
		'plafond',
		'encour_conso',
		'solde',
		'etablissement_id'
	];
}
