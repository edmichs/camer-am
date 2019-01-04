<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 08/12/2018
 * Time: 05:21
 */

namespace App\Repositories;


use App\Models\TypeEmploye;

class TypeRepository
{
    public static function getAll()
    {
        return TypeEmploye::all();
    }

}