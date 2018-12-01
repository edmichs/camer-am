<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Zonegeo
 * 
 * @property int $ID
 * @property string $Code
 * @property string $Libelle
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bareme_prestations
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 *
 * @package App\Models
 */
class Zonegeo extends Eloquent
{
	protected $table = 'zonegeo';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Code',
		'Libelle'
	];

	public function bareme_prestations()
	{
		return $this->hasMany(\App\Models\BaremePrestation::class, 'zonegeoID');
	}

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'zonegeoID');
	}
}
