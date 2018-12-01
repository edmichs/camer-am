<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

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
class TypeEmploye extends Eloquent
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

	public function bareme_prestations()
	{
		return $this->hasMany(\App\Models\BaremePrestation::class, 'Type_EmployeID');
	}
}
