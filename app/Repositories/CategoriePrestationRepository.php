<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 17:13
 */

namespace App\Repositories;


use App\Models\CategoriePrestation;
use Illuminate\Http\Request;

class CategoriePrestationRepository
{
    public static function getAll()
    {
        return CategoriePrestation::all();
    }

    public static function getByExercice($exerciceID)
    {


    }

    public static function store(Request $request)
    {
        return CategoriePrestation::create($request->all());
    }
    public static function update(Request $request)
    {
        return CategoriePrestation::find($request->input('ID'))->update($request->all());
    }
    public static function delete($id)
    {
        return CategoriePrestation::find($id)->delete();
    }
    public static function find($id)
    {
        return CategoriePrestation::find($id);
    }

}