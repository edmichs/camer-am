<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 17/06/2019
 * Time: 12:16
 */

namespace App\Http\Controllers;


use App\Repositories\AssureRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\IncorporationRepository;

class StatistiqueController extends Controller
{
    public function getAssure()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $assures =  AssureRepository::getByExercice($exercice->ID);
        $incorporates = IncorporationRepository::getByExercice($exercice->ID);
        return view('Pages.Statistiques.assure', compact('assures','incorporates'));
    }


}