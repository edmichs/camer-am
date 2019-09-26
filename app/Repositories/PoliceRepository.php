<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 07/12/2018
 * Time: 10:57
 */

namespace App\Repositories;


use App\Models\Police;
use Illuminate\Http\Request;

class PoliceRepository
{
    public static function getAll()
    {
        return Police::all();

    }

    public static function show($id)
    {
        return Police::find($id);
    }

    public static function store(Request $request)
    {
        return Police::create($request->all());
    }

    public static function update(Request $request)
    {
        return Police::find($request->input('ID'))->update($request->all());
    }

    public static function destroy($id)
    {
        return Police::find($id)->delete();
    }

    public static function findByNumero($Numero)
    {
        return Police::whereNumeroPolice($Numero)->get();
    }
    public static function findByNumeroAndSuccursale($Numero,$succursaleid)
    {
        return Police::whereNumeroPolice($Numero)->whereSuccursaleid($succursaleid)->first();
    }

    public static function findByNumeroPolice($numero_police)
    {
        return Police::where('Numero_police','like','%'.$numero_police.'%')->get();
    }

    public static function getByExercice($exerciceID)
    {
        return Police::whereExerciceid($exerciceID)->get();
    }
    public static function getByLastExercice($exerciceID)
    {
        return Police::whereExerciceid($exerciceID)->get();
    }
    public static function getBySuccursale($succursaleID,$exerciceID)
    {
        return Police::whereSuccursaleid($succursaleID)->whereExerciceid($exerciceID)->first();
    }

    public static function create(Request $request, $exerciceID, $succursaleID)
    {
        //dd($exerciceID);
        return Police::create([
           'Numero_police' => $request->input("Numero_police"),
           'Date_emission' => $request->input("Date_emission"),
           'Date_effet' => $request->input("Date_effet"),
           'Date_echeance' => $request->input("Date_echeance"),
           'ExerciceID' => $exerciceID,
           'SuccursaleID' => $succursaleID,
           'EtablissementID' => $request->input("EtablissementID"),
        ]);
    }
}