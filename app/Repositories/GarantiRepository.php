<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 14/12/2018
 * Time: 17:49
 */

namespace App\Repositories;


use App\Models\Garanti;

class GarantiRepository
{
    public static function getAll()
    {
        return Garanti::all();
    }
}