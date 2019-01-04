<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 07/12/2018
 * Time: 14:28
 */

namespace App\Repositories;


use App\Models\Assure;
use Illuminate\Http\Request;

class AssureRepository
{
    public static function getAll()
    {
        return Assure::all();
    }

    public static function getBySurccusale($id)
    {
        return Assure::whereSuccursaleid($id)->get();

    }
    public static function store(Request $request)
    {
            return Assure::create([
                'ExerciceID' => $request->input('ExerciceID'),
                'SuccursaleID' => $request->input('SuccursaleID'),
                'Code_familleID' => $request->input('Code_familleID'),
                'Matricule' => $request->input('Matricule'),
                'Nom' => $request->input('Nom'),
                'Situa_marital' => $request->input('Situa_marital'),
                'Datenaiss' => $request->input('Datenaiss'),
                'Lieu_naiss' => $request->input('Lieu_naiss'),
                'Type_EmployeID' => $request->input('Type_EmployeID'),
                'Fct_employe' => $request->input('Fct_employe'),
                'Nationalite' => $request->input('Nationalite'),
                'Observation' => $request->input('Observation'),
                'PoliceID' => $request->input('PoliceID'),
                'Taux_couverture' => $request->input('Taux_couverture'),
                'Plafond' => $request->input('Plafond'),
                'Encour_conso' => $request->input('Encour_conso'),
                'Solde' => $request->input('Solde')
            ]);
    }

    public static function show($id)
    {
        return Assure::find($id);
    }

    public static function update(Request $request)
    {
        if($request->has('Avatar')){
            UploadRepository::upload($request);
        }
       return Assure::find($request->input('ID'))->update([
           'Code_familleID' => $request->input('Code_familleID'),
           'Matricule' => $request->input('Matricule'),
           'Nom' => $request->input('Nom'),
           'Situa_marital' => $request->input('Situa_marital'),
           'Datenaiss' => $request->input('Datenaiss'),
           'Lieu_naiss' => $request->input('Lieu_naiss'),
           'Type_EmployeID' => $request->input('Type_EmployeID'),
           'Fct_employe' => $request->input('Fct_employe'),
           'Nationalite' => $request->input('Nationalite'),
           'Avatar' => $request->file('Avatar')->getClientOriginalName(),
           'Observation' => $request->input('Observation'),
           'PoliceID' => $request->input('PoliceID'),
           'Taux_couverture' => $request->input('Taux_couverture'),
           'Plafond' => $request->input('Plafond'),
           'Encour_conso' => $request->input('Encour_conso'),
           'Solde' => $request->input('Solde')
       ]);
    }

    public static function destroy($id)
    {
        return Assure::find($id)->delete();
    }

    public static function insert(Request $request)
    {
        $incorporate = IncorporationRepository::show($request->input('ID'));
        if($incorporate){
            return Assure::create([
                'ExerciceID' => $incorporate->ExerciceID,
                'SuccursaleID' => $incorporate->SuccursaleID,
                'Code_familleID' => $incorporate->Code_familleID,
                'Matricule' => $incorporate->Matricule,
                'Nom' => $incorporate->Nom,
                'Situa_marital' => $incorporate->Situa_marital,
                'Datenaiss' => $incorporate->Datenaiss,
                'Lieu_naiss' => $incorporate->Lieu_naiss,
                'Type_EmployeID' => $incorporate->Type_EmployeID,
                'Fct_employe' => $incorporate->Fct_employe,
                'Nationalite' => $incorporate->Nationalite,
                'Avatar' => $incorporate->Avatar,
                'Observation' => $request->input('Observation'),
                'PoliceID' => $incorporate->PoliceID,
                'Taux_couverture' => $request->input('Taux_couverture'),
                'Plafond' => $request->input('Plafond'),
                'Encour_conso' => $request->input('Encour_conso'),
                'Solde' => $request->input('Solde')
            ]);
        }

    }

    public static function findByNom($nom)
    {
        return Assure::where('Nom','like','%'.$nom.'%')->get();
    }

    public static function findByNomCode($nom, $code)
    {
        return Assure::whereNom($nom)->whereCodeFamilleid($code)->first();
    }

    public static function getByExercice($exerciceID)
    {
        return Assure::whereExerciceid($exerciceID)->get();
    }
}