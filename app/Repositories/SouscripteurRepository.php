<?php

/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 04/12/2018
 * Time: 04:36
 */
namespace App\Repositories;

use App\Models\Souscripteur;
use App\Models\Succursale;
use Illuminate\Http\Request;

class SouscripteurRepository
{
    public static function store(Request $request)
    {
       return Souscripteur::create($request->all());
    }

    public static function show($id)
    {
        return Souscripteur::whereId($id)->first();

    }

    public static function update(Request $request)
    {
        return Souscripteur::whereId($request->input('ID'))->update([
            'nom'=>$request->input('nom'),
            'raison_social'=>$request->input('raison_social'),
            'activite'=>$request->input('activite'),
            'adresse'=>$request->input('adresse'),
            'telephone'=>$request->input('telephone'),
            'nom_contact'=>$request->input('nom_contact'),
            'ville'=>$request->input('ville'),
            'pays'=>$request->input('pays')

        ]);
    }

    public static function destroy($id)
    {
        $surccusales = Succursale::whereSouscripteurid($id)->get();
        foreach($surccusales as $surccusale){
            $surccusale->delete();
        }

        return Souscripteur::whereId($id)->delete();
    }

    public static function create(Request $request)
    {
        return Souscripteur::create([
           'nom' => $request->input('Nom'),
           'statut' => "Particulier",
           'activite' => $request->input('Profession'),
           'adresse' => $request->input('bp'),
           'ville' => $request->input('Ville'),
           'pays' => $request->input('Pays'),
           'raison_social' => $request->input('Matricule'),
           'telephone' => $request->input('Telephone'),
           'email' => $request->input('Email'),
           'nombre_total_assure' => 1
        ]);
    }

     /**
     * @param int $exercice_id
     * @return Collection \App\Models\Succursale
     */
    public static function getByExercice($exercice_id)
    {
       return Souscripteur::whereExerciceId($exercice_id)->get();
    }

}