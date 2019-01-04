<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 09:57
 */

namespace App\Repositories;


use App\Models\Prestation;

class PrestationRepository
{
    public static function getAll()
    {
        return Prestation::all();
    }

}