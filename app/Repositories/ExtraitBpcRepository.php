<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 17:43
 */

namespace App\Repositories;


use App\Models\ExtraitBpc;

class ExtraitBpcRepository
{
    public static function getAll()
    {
        return ExtraitBpc::all();
    }

    public static function show($id)
    {
        return ExtraitBpc::find($id);
    }
}