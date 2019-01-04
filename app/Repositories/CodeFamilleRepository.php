<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 08/12/2018
 * Time: 05:22
 */

namespace App\Repositories;


use App\Models\CodeFamille;

class CodeFamilleRepository
{

    public static function getAll()
    {
        return CodeFamille::all();
    }
}