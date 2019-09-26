<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 18:12
 */

namespace App\Repositories;


use App\Models\Tarif;

class TarifRepository
{
    public static function getAll()
    {
        return Tarif::all();
    }

  


}