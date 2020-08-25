<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 04/12/2018
 * Time: 11:27
 */

namespace App\Repositories;


use App\Models\Succursale;
use Illuminate\Http\Request;

class SurccusaleRepository
{
    public static function getAll()
    {
        return Succursale::all();
    }
    /**
     * @param int $exercice_id
     * @return Collection \App\Models\Succursale
     */
    public static function getByExercice($exercice_id)
    {
       return Succursale::whereExerciceId($exercice_id)->get();
    }
    public static function store(Request $request)
    {
        return Succursale::create($request->all());
    }

    public static function show($id)
    {
        return Succursale::find($id);
    }

    public static function getBySouscripteur($id)
    {
        return Succursale::whereSouscripteurid($id)->get();
    }

    public static function update(Request $request)
    {
        return Succursale::whereId($request->input('ID'))->update([
            'Nom'=>$request->input('Nom'),
            'Raison_social'=>$request->input('Raison_social'),
            'Activite'=>$request->input('Activite'),
            'Adresse'=>$request->input('Adresse'),
            'Telephone'=>$request->input('Telephone'),
            'Nom_contact'=>$request->input('Nom_contact'),
            'Ville'=>$request->input('Ville'),
            'Pays'=>$request->input('Pays')

        ]);
    }

    public static function destroy($id)
    {
        return Succursale::whereId($id)->delete();
    }

    public static function create($souscripteur)
    {
        return Succursale::create([
            'Nom' => $souscripteur->nom,
            'Statut' => $souscripteur->statut,
            'Activite' => $souscripteur->activite,
            'Adresse' => $souscripteur->adresse,
            'Ville' => $souscripteur->ville,
            'Pays' => $souscripteur->pays,
            'Telephone' => $souscripteur->telephone,
            'Email' => $souscripteur->email,
            'nombre_total_assure' => $souscripteur->nombre_total_assure     ,
            'SouscripteurID' => $souscripteur->ID
        ]);
    }


}