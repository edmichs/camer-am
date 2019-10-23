<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 03/07/2019
 * Time: 13:20
 */

namespace App\Repositories;


use App\Models\Retraite;
use Illuminate\Http\Request;

class RetraiteRepository
{
    public static function getAll()
    {
        return Retraite::all();
    }

    public static function store(Request $request)
    {
       return Retraite::create($request->all());
    }

    public static function create(Request $request, $souscripteur_id, $police_id, $exercice_id, $carte_grise_id, $assure_id)
    {
        return Retraite::create([
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
        return Retraite::whereExerciceId($exerciceID)->orderBy('id','desc')->get();
    }
}