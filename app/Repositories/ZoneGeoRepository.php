<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 14/12/2018
 * Time: 19:24
 */

namespace App\Repositories;


use App\Models\Zonegeo;

class ZoneGeoRepository
{
    public static function getAll()
    {
        return Zonegeo::all();
    }

}