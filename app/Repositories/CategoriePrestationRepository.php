<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 17:13
 */

namespace App\Repositories;


use App\Models\CategoriePrestation;

class CategoriePrestationRepository
{
    public static function getAll()
    {
        return CategoriePrestation::all();
    }

    public static function getByExercice($exerciceID)
    {


    }

}