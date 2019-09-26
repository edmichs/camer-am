<?php

namespace App\Http\Controllers;

use App\Models\Garanti;
use App\Models\GarantiAutomobile;
use App\Repositories\AssureRepository;
use App\Repositories\AutomobileRepository;
use App\Repositories\CarteGriseRepository;
use App\Repositories\CompagnyRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\SouscripteurRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;
use App\Repositories\ExerciceRepository;
use App\Models\Automobile;
use App\Models\Categorie_tarif;
use App\Models\CategorieGaranti;
use App\Models\Tarif;
use App\Models\Puissance;
use Illuminate\Support\Facades\Input;

use DB;
use Illuminate\Support\Facades\App;
use PDF;



class AutomobileController extends Controller
{
    protected $puissance;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $autos= AutomobileRepository::getByExercices($exercice->ID);

        return view('Pages.Categories.Automobile.all', compact('exercice','autos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puissances = Puissance::all();
        $compagnies = CompagnyRepository::getAll();
        $categorie_tarifs = Categorie_tarif::all();
        $categorie_garanties = CategorieGaranti::all();
        $exercice = ExerciceRepository::getExerciceEnCours();
        return view('Pages.Categories.Automobile.add', compact('exercice','categorie_tarifs','categorie_garanties','compagnies','puissances'));

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->ajax()) {

            if ($request->has('change')) {
                $array = array();
                $tarif = Tarif::with('garanti')->whereDuree($request->input('duree'))->wherePuissanceId($request->input('puissance'))->whereCategorieTarifId($request->input('categorie'))->get();
                array_push($array, $tarif);
                return $tarif;

            }
            if ($request->has('changeCheckbox')) {
                $array = array();
                $garanti = Garanti::find($request->input('id'));
                array_push($array, $garanti);
                return $array;

            }

        }
    //    DB::beginTransaction();
     //  try{
            $exercice = ExerciceRepository::getExerciceEnCours();
            $souscripteur = SouscripteurRepository::create($request);
            $surccusale = SurccusaleRepository::create($souscripteur);

            $police = PoliceRepository::create($request, $exercice->ID,$surccusale->ID);

             $assure = AssureRepository::create($request,$police->ID,$surccusale->ID,$exercice->ID);
            $carte_grise = CarteGriseRepository::store($request);
            $automobile = AutomobileRepository::create($request,$souscripteur->ID,$police->ID,$exercice->ID,$carte_grise->id);

            foreach($request->input('checkbox') as $checkbox){
                    $tarif = Tarif::wherePrimeNette($request->input('nette'.$checkbox))->wherePttc($request->input('totale'.$checkbox))->whereGarantiId($checkbox)->first();
                    if($tarif){
                        GarantiAutomobile::create([
                            'automobile_id' => $automobile->id,
                            'garanti_id' => $checkbox,
                            'tarifs_id' => $tarif->id,
                            'etat' => 1
                        ]);
                    }

            }
         //  DB::commit();
            return redirect(route('auto_list_path'));
      /* }catch(\Exception $e){
            DB::Rollback();
            return redirect()->back()->with(['message' => 'Erreur lors de l\'enregistrement']);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printer()
    {
        $pdf = PDF::loadView('Pages.Categories.Automobile.print');
        return $pdf->download('automobile.pdf');
    }
}
