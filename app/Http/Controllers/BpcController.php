<?php

namespace App\Http\Controllers;

use App\Models\Bpc;
use App\Models\CategorieAssure;
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
use PDF;
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
       $bpcs = BpcRepository::getByExercice($exercice->ID);
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
        $polices = PoliceRepository::getByExercice($exercice->ID);
        $assures = AssureRepository::getByExercice($exercice->ID);
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
                $array1 = array();
                $categorie_assure = CategorieAssure::whereTypeemployeid($assure->TypeEmployeID)->wherePoliceid($assure->PoliceID)->first();
                array_push($array1,$categorie_assure);
                array_push($array,$assure);
                return array_merge($array,$array1);
            }
            if($request->has('changeMedecin')){
                $array = array();
                $assure = MedecinConseilRepository::show($request->input('MedecinConseilID'));
                array_push($array,$assure);
                return $array;
            }
            if($request->has('savePrint')){

                DB::beginTransaction();
                try{
                    $this->store($request);
                    $this->printerPdf();
                    $msg = "enregistrement et impression reussi";
                    DB::commit();
                    return $msg;
                }catch(\Exception $e){
                    $msg = "echec de l'enregistrement".$e->getMessage();
                    DB::RollBack();
                    return $msg;
                }
            }
            if($request->has('print')){
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
                    $prestations = CategoriePrestationRepository::getAll();
                    $affections = AffectionRepository::getAll();
                    return view('Print.bpc', compact('bpc','prestations','affections'));
                }catch (\Exception $e){
                    DB::Rollback();
                    return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);

                }
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

            $prestations = CategoriePrestationRepository::getAll();
            $affections = AffectionRepository::getAll();
        return  view('Print.bpc', compact('bpc','prestations','affections'));
        }
        return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);
    }
    public function printerPdf()
    {
//            return view('Pages.Bpc.print',compact('bpc'));
           // $pdf = App::make('dompdf.wrapper');
          //  $pdf->loadView('Pages.Bpc.print');
//        dd(compact('souscripteurs', 'exercice', 'pdf'));

        $pdf = PDF::loadView('Pages.Bpc.print');
          return $pdf->download('bpc.pdf');
        //return $pdf->download('bpc.pdf');


    }

    public function saveAndPrint(Request $request)
    {
        if($request->ajax()){
            if($request->has("save")){
                DB::beginTransaction();
                try{
                    $this->store($request);
                    $this->printerPdf();
                    $msg = "enregistrement et impression reussi";
                    DB::commit();
                    return $msg;
                }catch(\Exception $e){
                    $msg = "echec de l'enregistrement".$e->getMessage();
                    DB::RollBack();
                    return $msg;
                }
            }
        }

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

    public function printe()
    {
        $prestations = CategoriePrestationRepository::getAll();
        $affections = AffectionRepository::getAll();
        return view('Print.bpc', compact('prestations','affections'));
    }

    public function printBpc(Request $request)
    {
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
            $prestations = CategoriePrestationRepository::getAll();
            $affections = AffectionRepository::getAll();
            return view('Print.bpc', compact('bpc','prestations','affections'));
        }catch (\Exception $e){
            DB::Rollback();
            return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);

        }


    }
}
