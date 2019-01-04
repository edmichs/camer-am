<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Etablissement
 * 
 * @property int $ID
 * @property string $Nom
 * @property string $Adresse
 * @property string $Email
 * @property string $Telephone
 * @property string $Nom_contact
 * @property string $Telephone_contact
 * @property string $Localisation
 * @property string $Bp
 * @property string $Pays
 * @property string $Ville
 * @property string $Contribuable
 * @property string $Logo
 * @property string $Nom_dg
 * @property string $Raison_social
 * @property int $Nombre_employe
 * 
 * @property \Illuminate\Database\Eloquent\Collection $police
 *
 * @package App\Models
 */
class Etablissement extends Model
{
	protected $table = 'etablissement';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Nombre_employe' => 'int'
	];

	protected $fillable = [
		'Nom',
		'Adresse',
		'Email',
		'Telephone',
		'Nom_contact',
		'Telephone_contact',
		'Localisation',
		'Bp',
		'Pays',
		'Ville',
		'Contribuable',
		'Logo',
		'Nom_dg',
		'Raison_social',
		'Nombre_employe'
	];

	public function police()
	{
		return $this->hasMany(\App\Models\Police::class, 'EtablissementID');
	}
}
