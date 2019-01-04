<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 11/12/2018
 * Time: 18:12
 */

namespace App\Repositories;


use App\Models\Remboursement;

class RemboursementRepository
{
    public static function getAll()
    {
        return Remboursement::orderBy('PoliceID')->get();
    }

    public static function RemboursementActif($policeId)
    {
        return Remboursement::whereStatut(0)->wherePoliceid($policeId)->get();
    }

    public static function getByExercice($exerciceID)
    {
        return Remboursement::whereExerciceid($exerciceID)->get();
    }


}