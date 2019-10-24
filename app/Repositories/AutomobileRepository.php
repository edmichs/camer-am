<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 03/07/2019
 * Time: 13:20
 */

namespace App\Repositories;


use App\Models\Automobile;
use Illuminate\Http\Request;

class AutomobileRepository
{
    public static function getAll()
    {
        return Automobile::all();
    }

    public static function store(Request $request)
    {
       return Automobile::create($request->all());
    }

    public static function create(Request $request,  $exercice_id, $carte_grise_id, $incorporation_id)
    {
        return Automobile::create([
            'exercice_id' => $exercice_id,
            'carte_grise_id' => $carte_grise_id,
            'conducteur_habituel' => $request->input('conducteur_habituel'),
            'incorporation_id' => $incorporation_id,
            'type' => $request->input('type'),
            'date_effet' => $request->input('date_effet'),
            'date_echeance' => $request->input('date_echeance'),
            'date_adhesion' => $request->input('date_adhesion'),
            'duree_adhesion' => $request->input('duree_adhesion'),
            'statut' => 1,
        ]);
    }

    public static function getByExercices($exerciceID)
    {
        return Automobile::whereExerciceId($exerciceID)->whereStatut(1)->orderBy('id','desc')->get();
    }
    public static function cancel(Request $request)
    {
        return Automobile::find($request->input("suppr"))->update([
            "statut" => 0,
        ]);

    }
}