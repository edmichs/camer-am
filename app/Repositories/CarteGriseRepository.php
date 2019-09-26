<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 03/07/2019
 * Time: 14:48
 */

namespace App\Repositories;


use App\Models\CarteGrise;
use Illuminate\Http\Request;

class CarteGriseRepository
{
    public static function getAll()
    {
        return CarteGrise::all();
    }

    public static function store(Request $request)
    {
        return CarteGrise::create($request->all());
    }
}