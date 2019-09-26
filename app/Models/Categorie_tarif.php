<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * Class categorie_tarif
 * 
 * @property int $id
 * @property int $numero
 * @property string $description
 * 
 * @package App\Models
 */
class Categorie_tarif extends Model
{
    protected $table = 'categorie_tarif';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		
		'numero' => 'int'
	];

	protected $fillable = [
		'numero',
		'description',
		
	];

	public function tarif()
	{
		return $this->hasMany(\App\Models\Tarif::class,'categorie_tarif_id');
	}
}
