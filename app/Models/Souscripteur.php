<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Souscripteur
 * 
 * @property int $ID
 * @property string $Statut
 * @property string $Nom
 * @property string $Raison_social
 * @property string $Activite
 * @property string $Adresse
 * @property string $Telephone
 * @property string $Email
 * @property string $Nom_contact
 * @property string $Localisation_geo
 * @property int $Nombre_total_assure
 * 
 * @property \Illuminate\Database\Eloquent\Collection $succursales
 *
 * @package App\Models
 */
class Souscripteur extends Eloquent
{
	protected $table = 'souscripteur';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Nombre_total_assure' => 'int'
	];

	protected $fillable = [
		'Statut',
		'Nom',
		'Raison_social',
		'Activite',
		'Adresse',
		'Telephone',
		'Email',
		'Nom_contact',
		'Localisation_geo',
		'Nombre_total_assure'
	];

	public function succursales()
	{
		return $this->hasMany(\App\Models\Succursale::class, 'SouscripteurID');
	}
}
