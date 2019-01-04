<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* Class DecomptePrestation
 *
 * @property int $ID
 * @property string $Numero_decompte
* @property float $Plafond
* @property string $Code_prestation
* @property float $Unite
* @property bool $Rejet
* @property float $Montant_declare
* @property float $Montant_retenu
* @property float $Montant_payer
* @property float $Taux
 *
* @property \Illuminate\Database\Eloquent\Collection $decomptes
*
 * @package App\Models
*/

class DecomptePrestation extends Model
{
    protected $table = 'decompte_prestation';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $casts = [
        'DecompteID' => 'int',
        'Plafond' => 'float',
        'Taux' => 'float',
        'Montant_declare' => 'float',
        'Montant_retenu' => 'float',
        'Montant_payer' => 'float',
        'Rejet' => 'bool'
    ];

    protected $fillable = [
        'Code_prestation',
        'Libelle_prestation',
        'Plafond',
        'Unite',
        'Taux',
        'Montant_declare',
        'Montant_retenu',
        'Montant_payer',
        'Rejet',
        'Motif_rejet',
        'Numero_decompte'
    ];

    public function decompte()
    {
        return $this->belongsTo(\App\Models\Decompte::class, 'DecompteID');
    }
}
