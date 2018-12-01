<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 04:57:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BaremePrestation
 * 
 * @property int $ID
 * @property int $zonegeoID
 * @property int $PoliceID
 * @property int $Type_EmployeID
 * @property int $PrestationID
 * @property string $Base_remboursement
 * @property float $Taux_rembrousement
 * 
 * @property \App\Models\Zonegeo $zonegeo
 * @property \App\Models\Prestation $prestation
 * @property \App\Models\Police $police
 * @property \App\Models\TypeEmploye $type_employe
 *
 * @package App\Models
 */
class BaremePrestation extends Eloquent
{
	protected $table = 'bareme_prestation';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'zonegeoID' => 'int',
		'PoliceID' => 'int',
		'Type_EmployeID' => 'int',
		'PrestationID' => 'int',
		'Taux_rembrousement' => 'float'
	];

	protected $fillable = [
		'zonegeoID',
		'PoliceID',
		'Type_EmployeID',
		'PrestationID',
		'Base_remboursement',
		'Taux_rembrousement'
	];

	public function zonegeo()
	{
		return $this->belongsTo(\App\Models\Zonegeo::class, 'zonegeoID');
	}

	public function prestation()
	{
		return $this->belongsTo(\App\Models\Prestation::class, 'PrestationID');
	}

	public function police()
	{
		return $this->belongsTo(\App\Models\Police::class, 'PoliceID');
	}

	public function type_employe()
	{
		return $this->belongsTo(\App\Models\TypeEmploye::class, 'Type_EmployeID');
	}
}
