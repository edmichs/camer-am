<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class CategoriePrestation extends Model
{
	protected $table = 'categorie_prestation';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Libelle','code'
	];

	public function prestations()
	{
		return $this->hasMany(\App\Models\Prestation::class, 'Categorie_PrestationID');
	}
}
