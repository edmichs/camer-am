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

    public static function create(Request $request, $souscripteur_id, $police_id, $exercice_id, $carte_grise_id)
    {
        return Automobile::create([
           'police_id' => $police_id,
            'souscripteur_id' => $souscripteur_id,
            'exercice_id' => $exercice_id,
            'carte_grise_id' => $carte_grise_id,
            'conducteur_habituel' => $request->input('conducteur_habituel'),
            'type' => $request->input('type')
        ]);
    }

    public static function getByExercices($exerciceID)
    {
        return Automobile::whereExerciceId($exerciceID)->get();
    }
}