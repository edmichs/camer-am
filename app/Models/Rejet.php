<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rejet
 * 
 * @property int $ID
 * @property string $Motif
 * 
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 *
 * @package App\Models
 */
class Rejet extends Eloquent
{
	protected $table = 'rejet';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Motif'
	];

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'RejetID');
	}
}
