<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class CodeFamille
 * 
 * @property int $ID
 * @property string $Code
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assures
 *
 * @package App\Models
 */
class CodeFamille extends Model
{
	protected $table = 'code_famille';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Code'
	];

	public function assures()
	{
		return $this->hasMany(\App\Models\Assure::class, 'Code_familleID');
	}
	public function incorporations()
	{
		return $this->hasMany(\App\Models\Incorporation::class, 'Code_familleID');
	}
}
