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


}