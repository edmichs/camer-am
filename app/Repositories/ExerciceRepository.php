<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 05/12/2018
 * Time: 15:21
 */

namespace App\Repositories;


use App\Models\Exercice;
use Illuminate\Http\Request;
use App\Repositories\PoliceRepository;
use App\Repositories\DecompteRepository;
use App\Repositories\BpcRepository;
use App\Repositories\AssureRepository;
use App\Repositories\IncorporationRepository;
class ExerciceRepository
{
    public static function getExerciceEnCours()
    {
        return Exercice::whereCloture(0)->OrderBy('ID','desc')->first();
    }

    public static function store(Request $request)
    {
        return Exercice::create([
            'Date_debut' => $request->input('Date_debut'),
            'Date_fin' => $request->input('Date_fin'),
            'Cloture' => 0,
        ]);
    }

    public static function cloture(Request $request)
    {
        $current_date = date('Y-m-d');
        return Exercice::find($request->input('suppr'))->update([
            'Cloture' => 1,
            'Date_cloture' => $current_date
        ]);
    }

    public static function show($id)
    {
        return Exercice::find($id);
    }

    public static function getSuccursale($id)
    {
        return PoliceRepository::getByExercice($id);
    }
    public static function getDecompte($id)
    {
        return DecompteRepository::getByExercice($id);
    }
    public static function getBpc($id)
    {
        return BpcRepository::getByExercice($id);
    }
    public static function getAssure($id)
    {
        return AssureRepository::getByExercice($id);
    }
    public static function getIncorporate($id)
    {
        return AssureRepository::getByExercice($id);
    }
    public static function getRemboursement($id)
    {
        return RemboursementRepository::getByExercice($id);
    }
}