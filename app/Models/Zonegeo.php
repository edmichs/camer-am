<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Zonegeo extends Model
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
