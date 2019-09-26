<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 29/12/2018
 * Time: 14:00
 */

namespace App\Repositories;


use App\Models\BonusMalus;
use Illuminate\Http\Request;

class BonusRepository
{
    public static function getAll()
    {
        return BonusMalus::all();
    }

    public static function store(Request $request)
    {
        return BonusMalus::create($request->all());
    }

    public static function getByExercice($exerciceID)
    {
        return BonusMalus::whereExerciceid($exerciceID)->get();
    }
}