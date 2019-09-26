<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 09:57
 */

namespace App\Repositories;


use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationRepository
{
    public static function getAll()
    {
        return Prestation::all();
    }

    public static function store(Request $request)
    {
        return Prestation::create($request->all());
    }
    public static function find($id)
    {
        return Prestation::find($id);
    }
    public static function update(Request $request)
    {
        return Prestation::find($request->input('ID'))->update($request->all());
    }
    public static function delete($id)
    {
        return Prestation::find($id)->delete();
    }

}