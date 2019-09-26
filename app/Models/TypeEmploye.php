<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


/**
 * Class TypeEmploye
 * 
 * @property int $ID
 * @property string $Libelle
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assures
 * @property \Illuminate\Database\Eloquent\Collection $bareme_prestations
 *
 * @package App\Models
 */
class TypeEmploye extends Model
{
	protected $table = 'type_employe';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Libelle'
	];

	public function assures()
	{
		return $this->hasMany(\App\Models\Assure::class, 'Type_EmployeID');
	}
	public function incorporations()
	{
		return $this->hasMany(\App\Models\Incorporation::class, 'Type_EmployeID');
	}

	public function bareme_prestations()
	{
		return $this->hasMany(\App\Models\BaremePrestation::class, 'Type_EmployeID');
	}
	public function categorie_assure()
	{
		return $this->hasMany(\App\Models\CategorieAssure::class, 'typeEmployeId');
	}
}
