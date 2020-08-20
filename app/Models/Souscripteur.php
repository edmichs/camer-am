<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
class Souscripteur extends Model
{
	protected $primaryKey = 'ID';
	protected $table = 'souscripteur';
	protected $casts = [
		'nombre_total_assure' => 'int'
	];

	protected $fillable = [

		'raison_social',
		'nom',
		'statut',
		'activite',
		'adresse',
		'telephone',
		'nom_contact',
		'ville',
		'pays',
		'email',
		'localisation_geo',
		'nombre_total_assure',
	];

	public function succursales()
	{
		return $this->hasMany(\App\Models\Succursale::class, 'SouscripteurID');
	}

	public function automobile()
	{
		return $this->hasMany(\App\Models\Souscripteur::class, 'souscripteur_id');
	}
}
