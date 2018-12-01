<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Garanti
 * 
 * @property int $ID
 * @property string $Code
 * @property string $Description
 * 
 * @property \Illuminate\Database\Eloquent\Collection $decomptes
 *
 * @package App\Models
 */
class Garanti extends Eloquent
{
	protected $table = 'garanti';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Code',
		'Description'
	];

	public function decomptes()
	{
		return $this->hasMany(\App\Models\Decompte::class, 'GarantiID');
	}
}
