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
use App\Models\GarantiAutomobile;

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
            'garage_habituel' => $request->input('garage_habituel'),
            'incorporation_id' => $incorporation_id,
            'type' => $request->input('type'),
            'zone_id' => $request->input('zone_id'),
            'date_effet' => $request->input('Date_effet'),
            'date_echeance' => $request->input('Date_echeance'),
            'date_adhesion' => $request->input('Date_emission'),
            'duree_adhesion' => $request->input('duree'),
            'statut' => 1,
            'numero' => $request->input('numero'),
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

    public static function findById($id)
    {
        return Automobile::find($id);
    }
    public static function getAllGaranti($id)
    {
        return GarantiAutomobile::whereAutomobileId($id)->get();
    }
    public static function getCategorie($id)
    {
        return GarantiAutomobile::whereAutomobileId($id)->first();
    }
    
}