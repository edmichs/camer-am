<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 07/12/2018
 * Time: 14:43
 */

namespace App\Repositories;


use App\Models\Incorporation;
use Illuminate\Http\Request;

class IncorporationRepository
{
    public static function getAll()
    {
        return Incorporation::all();
    }

    public static function store(Request $request)
    {
        if($request->has('Avatar')){
            UploadRepository::upload($request);
        }
        return Incorporation::create([
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
            'Avatar' => $request->input('Avatar'),
            'Observation' => $request->input('Observation'),
            'PoliceID' => $request->input('PoliceID')
        ]);
    }

    public static function show($id)
    {
        return Incorporation::find($id);
    }

    public static function update(Request $request)
    {
        return Incorporation::find($request->input('ID'))->update([
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
            'Avatar' => $request->file('Avatar')->getClientOriginalName(),
            'Observation' => $request->input('Observation'),
            'PoliceID' => $request->input('PoliceID')
        ]);
    }

    public static function destroy($id)
    {
        return Incorporation::find($id)->delete();
    }

    public static function getByExercice($exerciceID)
    {
        return Incorporation::whereExerciceid($exerciceID)->get();
    }

}