<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

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
class CodeFamille extends Eloquent
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
}
