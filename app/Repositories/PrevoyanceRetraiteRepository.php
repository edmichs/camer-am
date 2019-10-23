<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 03/07/2019
 * Time: 13:20
 */

namespace App\Repositories;


use App\Models\PrevoyanceRetraite;
use Illuminate\Http\Request;

class PrevoyanceRetraiteRepository
{
    public static function getAll()
    {
        return PrevoyanceRetraite::all();
    }

    public static function store(Request $request)
    {
       return PrevoyanceRetraite::create($request->all());
    }

    public static function create(Request $request, $souscripteur_id, $police_id, $exercice_id, $carte_grise_id, $assure_id)
    {
        return PrevoyanceRetraite::create([
           'police_id' => $police_id,
            'souscripteur_id' => $souscripteur_id,
            'exercice_id' => $exercice_id,
            'carte_grise_id' => $carte_grise_id,
            'conducteur_habituel' => $request->input('conducteur_habituel'),
            'assure_id' => $assure_id,
            'type' => $request->input('type')
        ]);
    }

    public static function getByExercices($exerciceID)
    {
        return PrevoyanceRetraite::whereExerciceId($exerciceID)->orderBy('id','desc')->get();
    }
}