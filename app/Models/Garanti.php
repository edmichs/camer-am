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
		'Description',
		'categorie_garanti_id',
		'isDefaultChecked'
	];

	public function categorie_garanti()
	{
		return $this->belongsTo(\App\Models\CategorieGaranti::class, 'categorie_garanti_id');
	}
	public function automobile()
	{
		return $this->hasMany(\App\Models\Automobile::class, 'garanti_id');
	}
	public function tarif()
	{
		return $this->hasMany(\App\Models\Tarif::class,'garanti_id');
	}
	public function garanti_automobile()
	{
		return $this->hasMany(\App\Models\GarantiAutomobile::class,'garanti_id');
	}
}
