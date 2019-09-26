<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * Class categorie_garanti
 * 
 * @property int $id
 * @property int $code
 * @property string $libelle
 * 
 * @package App\Models
 */
class CategorieGaranti extends Model
{
    protected $table = 'categorie_garanti';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		
	];

	protected $fillable = [
		'code',
		'libelle',
		
	];

	public function garanti()
	{
		return $this->hasMany(\App\Models\Garanti::class,'categorie_garanti_id');
	}
}
