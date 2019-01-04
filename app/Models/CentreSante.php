<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CentreSante
 * 
 * @property int $ID
 * @property string $Code
 * @property string $Nom
 * @property string $Telephone
 * @property string $Adresse
 * @property string $Email
 * @property string $Nom_contact
 * @property string $Ville
 * @property string $Quartier
 * @property string $Pays
 *
 * @package App\Models
 */
class CentreSante extends Model
{
	protected $table = 'centre_sante';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Code',
		'Nom',
		'Telephone',
		'Adresse',
		'Email',
		'Nom_contact',
		'Ville',
		'Quartier',
		'Pays'
	];

	public function bpc()
	{
		return $this->hasMany(\App\Models\Bpc::class, 'Centre_santeID');
	}
}
