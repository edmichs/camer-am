<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Medecin extends Model
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
