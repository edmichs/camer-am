<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Affection
 * 
 * @property int $ID
 * @property string $Code
 * @property string $Description
 *
 * @package App\Models
 */
class Affection extends Eloquent
{
	protected $table = 'affection';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Code',
		'Description'
	];
}
