<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 07/12/2018
 * Time: 14:28
 */

namespace App\Repositories;


use App\Models\Assure;
use App\Models\Bpc;
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
                'Solde' => $request->input('Solde'),
                'Avatar' => $request->input('Avatar'),
                'Date_incorporation' => $request->input('Date_incorporation'),
                'Montant_prime' => $request->input('Montant_prime')
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
           'Taux_couverture' => $request->input('Taux_couverture'),
           'Encour_conso' => $request->input('Encour_conso'),
           'Solde' => $request->input('Solde')
       ]);
    }

    public static function destroy($id)
    {
        Bpc::whereAssureid($id)->delete();
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
    public static function getByLastExercice($exerciceID)
    {
        return Assure::whereExerciceid($exerciceID)->get();
    }

    public static function create(Request $request,$police_id,$succursale_id, $exercice_id)
    {
        return Assure::create([
           'Nom' => $request->input('assure'),
           'Code_familleID' => 1,
           'PoliceID' => $police_id,
           'SuccursaleID' => $succursale_id,
           'ExerciceID' => $exercice_id,
           'Matricule' => $request->input('Matricule'),
           'Fct_employe' => $request->input('Profession'),
           'Situa_marital' => $request->input('Situa_marital'),
           'Datenaiss' => $request->input('Datenaiss'),
           'numero_permis' => $request->input('numero_permis'),
           'numero_passport' => $request->input('numero_passport'),
           'adresse' => $request->input('bp'),
           'telephone' => $request->input('Telephone'),
           'email' => $request->input('Email'),


        ]);
    }
}