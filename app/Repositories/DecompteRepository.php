<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 12/12/2018
 * Time: 05:40
 */

namespace App\Repositories;


use App\Models\Decompte;
use Illuminate\Http\Request;

class DecompteRepository
{
    public static function getAll()
    {
        return Decompte::all();
    }

    public static function findByNumeroDecompte($numerodecompte)
    {
        return Decompte::whereNumeroDecompte($numerodecompte)->first();
    }

    public static function insertOnlyNumero(Request $request)
    {
        return Decompte::create([
           'Numero_decompte' => $request->input('Numero_decompte')
        ]);
    }

    public static function store(Request $request)
    {
        return Decompte::create([
            'Numero_decompte' =>$request->input('Numero_decompte'),
            'GarantiID' =>$request->input('GarantiID'),
            'AffectionID' =>$request->input('AffectionID'),
            'ExerciceID' =>$request->input('ExerciceID'),
            'PoliceID' =>$request->input('PoliceID'),
            'AssureID' =>$request->input('Nom'),
            'Description_soins' =>$request->input('Description_soins'),
            'Date_declaration' =>$request->input('Date_declaration'),
            'Date_surveillance' =>$request->input('Date_surveillance'),
            'Numero_facture' =>$request->input('Numero_facture'),
            'Montant_facture' =>$request->input('Montant_facture'),
            'Nombre_piece' =>$request->input('Nombre_piece'),
            'Taux_remboursement' =>$request->input('Taux_remboursement'),
            'PrestationID' =>$request->input('PrestationID'),
            'Nom_medecin' =>$request->input('Nom_medecin'),
            'zonegeoID' =>$request->input('zonegeoID'),
            'Mode_paiement' =>$request->input('Mode_paiement'),
            'Validation_paiement' =>$request->input('Validation_paiement'),
            'Reference_paiement' =>$request->input('Reference_paiement'),


        ]);
    }

    public static function getByDecompte($exerciceID)
    {
        return Decompte::whereExerciceid($exerciceID)->get();
    }
}