<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Prestation
 * 
 * @property int $ID
 * @property int $Categorie_PrestationID
 * @property string $Code_prestation
 * @property string $Description
 * 
 * @property \App\Models\CategoriePrestation $categorie_prestation
 * @property \Illuminate\Database\Eloquent\Collection $bareme_prestations
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 * @property \Illuminate\Database\Eloquent\Collection $extrait_bpcs
 * @property \Illuminate\Database\Eloquent\Collection $remboursements
 *
 * @package App\Models
 */
class Prestation extends Eloquent
{
	protected $table = 'prestation';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Categorie_PrestationID' => 'int'
	];

	protected $fillable = [
		'Categorie_PrestationID',
		'Code_prestation',
		'Description'
	];

	public function categorie_prestation()
	{
		return $this->belongsTo(\App\Models\CategoriePrestation::class, 'Categorie_PrestationID');
	}

	public function bareme_prestations()
	{
		return $this->hasMany(\App\Models\BaremePrestation::class, 'PrestationID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'PrestationID');
	}

	public function extrait_bpcs()
	{
		return $this->hasMany(\App\Models\ExtraitBpc::class, 'PrestationID');
	}

	public function remboursements()
	{
		return $this->hasMany(\App\Models\Remboursement::class, 'PrestationID');
	}
}
