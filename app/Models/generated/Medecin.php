<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Medecin
 * 
 * @property int $ID
 * @property string $Nom
 * @property string $Telephone
 * @property string $Email
 * @property string $Matricule
 *
 * @package App\Models
 */
class Medecin extends Eloquent
{
	protected $table = 'medecin';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Nom',
		'Telephone',
		'Email',
		'Matricule'
	];
}
