<?php

namespace App\Http\Controllers;

use App\Repositories\AssureRepository;
use App\Repositories\BpcRepository;
use App\Repositories\DecompteRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\PrestationRepository;
use App\Repositories\RemboursementRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $souscripteurs = SurccusaleRepository::getByExercice($exercice->ID)->count();
        $assures = AssureRepository::getByExercices($exercice->ID)->count();
        $decomptes = DecompteRepository::getByExercice($exercice->ID)->count();
        $bpcs = BpcRepository::getByExercice($exercice->ID)->count();
        $prestataires = PrestationRepository::getAll()->count();
        $remboursements = RemboursementRepository::getByExercice($exercice->ID)->count();

        return view('home', compact('souscripteurs','assures','decomptes','bpcs','prestataires','remboursements'));
    }
}
