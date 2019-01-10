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


}