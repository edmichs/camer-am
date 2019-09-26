<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 07/12/2018
 * Time: 10:57
 */

namespace App\Repositories;


use App\Models\Puissance;
use Illuminate\Http\Request;

class PuissanceRepository
{
    public static function getAll()
    {
        return Puissance::all();

    }

    public static function show($id)
    {
        return Puissance::find($id);
    }

    public static function store(Request $request)
    {
        return Puissance::create($request->all());
    }

    public static function update(Request $request)
    {
        return Puissance::find($request->input('id'))->update($request->all());
    }

    public static function destroy($id)
    {
        return Puissance::find($id)->delete();
    }

    public static function find($puissance)
    {
        
    }

   
}