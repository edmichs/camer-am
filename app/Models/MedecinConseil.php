<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class MedecinConseil extends Model
{
	protected $table = 'medecin_conseil';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Noms',
		'Telephone',
		'Email'
	];

	public function bpc()
	{
		return $this->hasMany(\App\Models\Bpc::class, 'Medecin_conseilID');
	}
}
