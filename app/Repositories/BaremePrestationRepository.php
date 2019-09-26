<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 09:59
 */

namespace App\Repositories;


use App\Models\BaremePrestation;
use Illuminate\Http\Request;

class BaremePrestationRepository
{
    public static function getAll()
    {
        return BaremePrestation::all();
    }

    public static function store(Request $request)
    {
       return BaremePrestation::create($request->all());
    }
    public static function find($id)
    {
      return  BaremePrestation::find($id);
    }
    public static function update(Request $request)
    {
       return BaremePrestation::find($request->input('ID'))->update($request->all());
    }
    public static function delete($id)
    {
       return BaremePrestation::find($id)->delete();
    }
}