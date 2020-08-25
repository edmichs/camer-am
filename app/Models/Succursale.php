<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Succursale
 * 
 * @property int $ID
 * @property int $SouscripteurID
 * @property int $Statut
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
 * @property \App\Models\Souscripteur $souscripteur
 * @property \Illuminate\Database\Eloquent\Collection $assures
 * @property \Illuminate\Database\Eloquent\Collection $police
 *
 * @package App\Models
 */
class Succursale extends Model
{
	protected $primaryKey = 'ID';
	protected $table = 'succursale';
	protected $casts = [
		'SouscripteurID' => 'int',
		'Statut' => 'int',
		'Nombre_total_assure' => 'int'
	];

	protected $fillable = [
		'SouscripteurID',
		'Statut',
		'Nom',
		'Raison_social',
		'Activite',
		'Adresse',
		'Telephone',
		'Email',
		'Nom_contact',
		'Localisation_geo',
		'Nombre_total_assure',
		'Ville',
		'Pays',
		'exercice_id'
	];

	public function souscripteur()
	{
		return $this->belongsTo(\App\Models\Souscripteur::class, 'SouscripteurID');
	}

	public function assures()
	{
		return $this->hasMany(\App\Models\Assure::class, 'SuccursaleID');
	}
	public function incorporations()
	{
		return $this->hasMany(\App\Models\Incorporation::class, 'SuccursaleID');
	}

	public function police()
	{
		return $this->hasMany(\App\Models\Police::class, 'SuccursaleID');
	}
	public function exercice()
	{
		return $this->belongsTo(App\Models\Exercice::class, 'exercice_id');
	}
}
