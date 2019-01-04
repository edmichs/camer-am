<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 14/12/2018
 * Time: 17:54
 */

namespace App\Repositories;


use App\Models\Affection;

class AffectionRepository
{
    public static function getAll()
    {
        return Affection::all();
    }

    public static function findByDescription($description)
    {
        return Affection::whereDescription($description)->first();
    }

    public static function insertIfNotExist($description)
    {
        if(self::findByDescription($description)){
            return self::findByDescription($description);

        }else return Affection::create([
            'Description' => $description
        ]);
    }
}