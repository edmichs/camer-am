<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 04/12/2018
 * Time: 22:48
 */

namespace App\Repositories;


use App\Models\Etablissement;
use Illuminate\Http\Request;

class CompagnyRepository
{
    public static function store(Request $request)
    {
       return Etablissement::create($request->all());
    }

    public static function update(Request $request)
    {
       return Etablissement::find($request->input('ID'))->update([
           'Nom' =>$request->input('Nom'),
           'Adresse' =>$request->input('Adresse'),
           'Email' =>$request->input('Email'),
           'Telephone' =>$request->input('Telephone'),
           'Nom_contact' =>$request->input('Nom_contact')
        ]);
    }

    public static function getAll()
    {
        return Etablissement::all();
    }

    public static function show($id)
    {
        return Etablissement::find($id);
    }

    public static function destroy($id)
    {
        return Etablissement::find($id)->delete();
    }

}