<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 05:09:17 +0000.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Decompte
 * 
 * @property int $ID
 * @property int $RejetID
 * @property int $BpcID
 * @property int $zonegeoID
 * @property int $AssureID
 * @property int $GarantiID
 * @property int $ExerciceID
 * @property int $PrestationID
 * @property int $PoliceID
 * @property float $Nombre_piece
 * @property \Carbon\Carbon $Date_jour
 * @property string $Numero_facture
 * @property string $Beneficiare
 * @property \Carbon\Carbon $Date_declaration
 * @property \Carbon\Carbon $Date_surveillance
 * @property float $Taux_remboursement
 * @property float $Montant_facture
 * @property string $Numero_decompte
 * @property float $Plafond_garanti
 * @property \Carbon\Carbon $Date_traitement
 * @property string $Nom_medecin
 * @property string $Mode_paiement
 * @property string $Validation_paiement
 * @property string $Reference_paiement
 * 
 * @property \App\Models\Bpc $bpc
 * @property \App\Models\Garanti $garanti
 * @property \App\Models\Assure $assure
 * @property \App\Models\Prestation $prestation
 * @property \App\Models\Police $police
 * @property \App\Models\Exercice $exercice
 * @property \App\Models\Zonegeo $zonegeo
 * @property \App\Models\Rejet $rejet
 * @property \Illuminate\Database\Eloquent\Collection $remboursements
 *
 * @package App\Models
 */
class Decompte extends Model
{
	protected $table = 'decompte';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'RejetID' => 'int',
		'BpcID' => 'int',
		'zonegeoID' => 'int',
		'AssureID' => 'int',
		'GarantiID' => 'int',
		'ExerciceID' => 'int',
		'PrestationID' => 'int',
		'PoliceID' => 'int',
		'Nombre_piece' => 'float',
		'Taux_remboursement' => 'float',
		'Montant_facture' => 'float',
		'Plafond_garanti' => 'float'
	];

	protected $dates = [
		'Date_jour',
		'Date_declaration',
		'Date_surveillance',
		'Date_traitement'
	];

	protected $fillable = [
		'RejetID',
		'BpcID',
		'zonegeoID',
		'AssureID',
		'GarantiID',
		'ExerciceID',
		'PrestationID',
		'PoliceID',
		'Nombre_piece',
		'Date_jour',
		'Numero_facture',
		'Beneficiare',
		'Date_declaration',
		'Date_surveillance',
		'Taux_remboursement',
		'Montant_facture',
		'Numero_decompte',
		'Plafond_garanti',
		'Date_traitement',
		'Nom_medecin',
		'Mode_paiement',
		'Validation_paiement',
		'Reference_paiement'
	];

	public function bpc()
	{
		return $this->belongsTo(\App\Models\Bpc::class, 'BpcID');
	}

	public function garanti()
	{
		return $this->belongsTo(\App\Models\Garanti::class, 'GarantiID');
	}

	public function assure()
	{
		return $this->belongsTo(\App\Models\Assure::class, 'AssureID');
	}

	public function prestation()
	{
		return $this->belongsTo(\App\Models\Prestation::class, 'PrestationID');
	}

	public function police()
	{
		return $this->belongsTo(\App\Models\Police::class, 'PoliceID');
	}

	public function exercice()
	{
		return $this->belongsTo(\App\Models\Exercice::class, 'ExerciceID');
	}

	public function zonegeo()
	{
		return $this->belongsTo(\App\Models\Zonegeo::class, 'zonegeoID');
	}

	public function rejet()
	{
		return $this->belongsTo(\App\Models\Rejet::class, 'RejetID');
	}

	public function remboursements()
	{
		return $this->hasMany(\App\Models\Remboursement::class, 'DecompteID');
	}

	public function decompte_prestation()
	{
		return $this->hasMany(\App\Models\DecomptePrestation::class, 'DecompteID');
	}
}
