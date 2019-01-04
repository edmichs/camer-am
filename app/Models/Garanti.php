<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Garanti extends Model
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
