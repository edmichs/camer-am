<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 19/12/2018
 * Time: 06:06
 */

namespace App\Repositories;


use App\Models\MedecinConseil;
use Illuminate\Http\Request;

class MedecinConseilRepository
{
    public static function getAll()
    {
        return MedecinConseil::all();
    }

    public static function store(Request $request)
    {

        if(MedecinConseil::whereEmail($request->input('email_medecin'))->first()){
            return  MedecinConseil::whereEmail($request->input('email_medecin'))->first();

        }else{
            return   MedecinConseil::create([
                'Email' => $request->input('email_medecin'),
                'Telephone' => $request->input('Tel_medecin'),
                'Nom' => $request->input('nom_medecin')
            ]);
        }
    }

    public static function show($id)
    {
        return MedecinConseil::find($id);
    }
}