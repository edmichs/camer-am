<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 09:58
 */

namespace App\Repositories;


use App\Models\CentreSante;
use Illuminate\Http\Request;

class CentreSanteRepository
{
    public static function getAll()
    {
        return CentreSante::all();
    }

    public static function store(Request $request)
    {
       return CentreSante::create($request->all());
    }

    public static function show($id)
    {
        return CentreSante::find($id);
    }

    public static function update(Request $request)
    {
        return CentreSante::find($request->input('ID'))->update($request->all());
    }
    public static function destroy($id)
    {
        return CentreSante::find($id)->delete();
    }

    public static function findByNom($nom)
    {
       return CentreSante::whereNom($nom)->first();
    }

    public static function insertIfNotExist(Request $request)
    {
        if(self::findByNom($request->input('Centre_sante'))){
            return self::findByNom($request->input('Centre_sante'));
        }else{
            return CentreSante::create([
                'Nom' => $request->input('Centre_sante')
            ]);
        }

    }

}