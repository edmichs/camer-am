<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 10/12/2018
 * Time: 05:41
 */

namespace App\Repositories;


use App\Models\Bpc;
use Illuminate\Http\Request;
use PDF;

class BpcRepository
{
    public static function getAll()
    {
        return Bpc::all();
    }

    public static function store(Request $request)
    {
        return Bpc::create([
            'Numero_bpc' => $request->input('ExerciceID'),
            'ExerciceID' => $request->input('ExerciceID'),
            'Plafond_remboursement' => $request->input('Plafond'),
            'Hauteur_couverture' => $request->input('Couverture'),
            'Date_declaration' => $request->input('Date_declaration'),
            'Date_sinistre' => $request->input('Date_sinistre'),
            'Encour_conso' => $request->input('Encour')
        ]);
    }
    public static function storeFromForm(Request $request)
    {
        $n = count(BpcRepository::getAll()) + 1;
        return Bpc::create([
            'Numero_bpc' => "BPC".$n.mt_rand(1,9999),
            'AssureID' => $request->input('Nom'),
            'ExerciceID' => $request->input('ExerciceID'),
            'AffectionID' => $request->input('AffectionID'),
            'Centre_santeID' => $request->input('Centre_santeID'),
            'PoliceID' => $request->input('PoliceID'),
            'Date_declaration' => $request->input('Date_declaration'),
            'Date_sinistre' => $request->input('Date_sinistre'),
            'Medecin_conseilID' => $request->input('MedecinConseilID')
        ]);
    }

    public static function show($id)
    {
        return Bpc::find($id);
    }

    public static function destroy($id)
    {
        return Bpc::find($id)->delete();
    }

    public static function update(Request $request)
    {
        Bpc::find($request->input('ID'))->update($request->all());
    }

    public static function getByExercice($exerciceID)
    {
        return Bpc::whereExerciceid($exerciceID)->get();
    }

    public static function printPdf()
    {

        $pdf = PDF::loadView('home');
        return $pdf->download('bpc.pdf');
    }
}