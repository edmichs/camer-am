<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MedecinConseil
 * 
 * @property int $ID
 * @property string $Noms
 * @property string $Telephone
 * @property string $Email
 * 
 * @property \Illuminate\Database\Eloquent\Collection $extrait_bpcs
 *
 * @package App\Models
 */
class MedecinConseil extends Eloquent
{
	protected $table = 'medecin_conseil';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Noms',
		'Telephone',
		'Email'
	];

	public function extrait_bpcs()
	{
		return $this->hasMany(\App\Models\ExtraitBpc::class, 'Medecin_conseilID');
	}
}
