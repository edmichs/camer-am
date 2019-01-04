<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 22/12/2018
 * Time: 05:33
 */

namespace App\Repositories;


use App\Models\DecomptePrestation;
use Illuminate\Http\Request;

class DecomptePrestationRepository
{
    public static function getAll()
    {
        return DecomptePrestation::all();
    }

    public static function findByDecompte(Request $request)
    {
        return DecomptePrestation::whereNumeroDecompte($request->input('Numero_decompte'))->get();
    }

    public static function findByNumeroDecompte($numero)
    {
        return DecomptePrestation::whereNumeroDecompte($numero)->get();
    }

    public static function show($id)
    {
        return DecomptePrestation::find($id);
    }

    public static function store(Request $request)
    {
        return DecomptePrestation::create([
           'Code_prestation' => $request->input('Code_prestation'),
           'Libelle_prestation' => $request->input('Libelle_prestation'),
           'Plafond' => $request->input('Plafond'),
           'Unite' => $request->input('Unite'),
           'Taux' => $request->input('Taux'),
           'Montant_declare' => $request->input('Montant_declare'),
           'Montant_retenu' => $request->input('Montant_retenu'),
           'Montant_payer' => $request->input('Montant_payer'),
           'Rejet' => $request->input('Rejet'),
           'Motif_rejet' => $request->input('Motif_rejet'),
           'Numero_decompte' => $request->input('Numero_decompte')
        ]);
    }

    public static function destroy($id)
    {
        return DecomptePrestation::find($id)->delete();
    }
}
