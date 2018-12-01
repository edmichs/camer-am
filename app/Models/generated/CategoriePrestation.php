<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CategoriePrestation
 * 
 * @property int $ID
 * @property string $Libelle
 * 
 * @property \Illuminate\Database\Eloquent\Collection $prestations
 *
 * @package App\Models
 */
class CategoriePrestation extends Eloquent
{
	protected $table = 'categorie_prestation';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Libelle'
	];

	public function prestations()
	{
		return $this->hasMany(\App\Models\Prestation::class, 'Categorie_PrestationID');
	}
}
