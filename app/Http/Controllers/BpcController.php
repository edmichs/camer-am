<?php

namespace App\Http\Controllers;

use App\Models\Bpc;
use App\Models\CategoriePrestation;
use App\Models\Extrait_prestation;
use App\Models\ExtraitBpc;
use App\Models\Police;
use App\Repositories\AffectionRepository;
use App\Repositories\AssureRepository;
use App\Repositories\BpcRepository;
use App\Repositories\CategoriePrestationRepository;
use App\Repositories\CentreSanteRepository;
use App\Repositories\CodeFamilleRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\ExtraitBpcRepository;
use App\Repositories\MedecinConseilRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\PrestationRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use DB;

class BpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
       $bpcs = BpcRepository::getAll();
        return view('Pages.Bpc.all',compact('bpcs','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $prestations = CategoriePrestationRepository::getAll();
        $polices = PoliceRepository::getAll();
        $assures = AssureRepository::getAll();
        $affections = AffectionRepository::getAll();
        $centresantes = CentreSanteRepository::getAll();
        $medecins = MedecinConseilRepository::getAll();
        return view('Pages.Bpc.add',compact('exercice','prestations','polices','assures','affections','centresantes','medecins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
           /* if($request->has('search')){
                $valeur = strtolower($request->input('Numero_police'));
                $polices = PoliceRepository::findByNumeroPolice($valeur);
                $valeur = '';
                foreach($polices as $pol){
                    $valeur.='<div class="list" style="padding:0.5%;" onclick="selectionner('.$pol->ID.', \''.$pol->Numero_police.')"><div class="row"><div class="col-md-6 text-center">'.$pol->Numero_police.'</div></div></div>';
                }
                return $valeur;

            }*/

            if($request->has('changed')){
                $police = Police::with('succursale')->whereId($request->input('PoliceID'))->get();
                return $police;
            }
            if($request->has('changeNom')){
                $array = array();
                $assure = AssureRepository::show($request->input('Nom'));
                array_push($array,$assure);
                return $array;
            }
            if($request->has('changeMedecin')){
                $array = array();
                $assure = MedecinConseilRepository::show($request->input('MedecinConseilID'));
                array_push($array,$assure);
                return $array;
            }
            if($request->has('validation')){


            }




        }
        DB::beginTransaction();
        try{
            $bpc = BpcRepository::storeFromForm($request);

            foreach(Input::get('optradio') as $presta){
                if($presta != 0){
                    Extrait_prestation::create([
                        'BpcID' => $bpc->ID,
                        'PrestationID' => $presta
                    ]);
                }
            }
            DB::commit();
            return redirect(route('list_bpc_path'));
        }catch (\Exception $e){
            DB::Rollback();
            return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bpc = BpcRepository::show($id);
        if($bpc){
            return view('Pages.Bpc.show',compact('bpc'));
        }
        return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);
    }

    /**
     * Print pdf of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printer($id)
    {
        $bpc = BpcRepository::show($id);
        if($bpc){
//            return view('Pages.Bpc.print',compact('bpc'));

            $pdf = App::make('dompdf.wrapper');

            $pdf->loadView('Pages.Bpc.print', compact('bpc') );
//        dd(compact('souscripteurs', 'exercice', 'pdf'));

            return $pdf->stream();
        }
        return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bpc = BpcRepository::show($id);
        return view('Pages.Bpc.edit',compact('bpc'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(BpcRepository::update($request)){
            return redirect(route('list_bpc_path'));
        }
        return redirect()->back()->with(['message'=>'update failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(BpcRepository::destroy($id)){
            return redirect(route('list_bpc_path'));
        }
        return redirect()->back()->with(['message'=>'delete failed']);
    }
}
