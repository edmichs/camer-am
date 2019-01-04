<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\BaremePrestation;
use App\Models\Police;
use App\Models\Prestation;
use App\Repositories\AffectionRepository;
use App\Repositories\AssureRepository;
use App\Repositories\CategoriePrestationRepository;
use App\Repositories\DecomptePrestationRepository;
use App\Repositories\DecompteRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\GarantiRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\PrestationRepository;
use App\Repositories\SurccusaleRepository;
use App\Repositories\ZoneGeoRepository;
use Illuminate\Http\Request;

class DecompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $decomptes = DecompteRepository::getAll();
        return view('Pages.Decompte.all',compact('decomptes','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n = count(DecompteRepository::getAll()) + 1;
        $numeroDecompte = "DEC".$n.mt_rand(0,9999);
        $garanties = GarantiRepository::getAll();
        $affections = AffectionRepository::getAll();
        $polices = PoliceRepository::getAll();
        $assures = AssureRepository::getAll();
        $exercice = ExerciceRepository::getExerciceEnCours();
        $prestations = CategoriePrestationRepository::getAll();
        $prestas = PrestationRepository::getAll();
        $zonegeos = ZoneGeoRepository::getAll();

        return view('Pages.Decompte.add',compact('garanties','affections','polices','exercice','prestations','zonegeos','prestas','numeroDecompte','assures'));
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
            if($request->has('changed')){
                $prestation = Prestation::with('categorie_prestation')->whereCodePrestation($request->input('Code_prestation'))->get();
                return $prestation;
            }
            if($request->has('changedPolice')){
               // $array = array();
                $police = Police::with('succursale')->whereId($request->input('PoliceID'))->get();
                //array_push($array,$police);
                return $police;
            }
            if($request->has('changeNom')){
                $array = array();
                $assure = AssureRepository::show($request->input('Nom'));
                array_push($array,$assure);
                return $array;
            }

            if($request->has('forced')){
                DecomptePrestationRepository::store($request);
                $decompteprestations = DecomptePrestationRepository::findByDecompte($request);
                return $this->loadTablePrestation($decompteprestations);
            }
        }
        if(DecompteRepository::store($request)){
            return redirect(route('list_decompte_path'));
        }
        return redirect()->back()->with(['message'=>'echec d&apos;jout du decompte']);

    }

    public function storeWithoutPrint(Request $request)
    {
        if(DecompteRepository::store($request)){

        }
    }
    function loadTablePrestation($decompteprestation){
        $valeur= '<table id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                        <tr>
                                            <!--th>N°</th-->
                                            <th>Code Prestation</th>
                                            <th width="12%">Lib&eacute;ll&eacute; prestation</th>
                                            <th>Plafond</th>
                                            <th>Montant D&eacute;clar&eacute;</th>
                                            <th>Montant retenu</th>
                                            <th>Montant a payer</th>
                                            <th>Rejet</th>
                                        </tr>
                                        </thead>
                                        <tbody>';
                foreach($decompteprestation as $prestation){
                    $valeur.='<tr>
                <td>' .$prestation->Code_prestation. '</td>
                <td>' .$prestation->Libelle_prestation . '</td>
                <td>' .$prestation->Plafond. '</td>
                <td>' .$prestation->Montant_declare. '</td>
                <td>' .$prestation->Montant_retenu. '</td>
                <td>' .$prestation->Montant_payer. '</td>';
                    if($prestation->Rejet == 0){
                    $valeur.='<td>NON </td>';
                    }else{
                        $valeur.='<td>OUI </td>';
                    }
                    $valeur.='<td><a data-toggle="modal"
                                            data-id='.$prestation->ID.'
                                            id="deleteButton"
                                            data-target="#deleteModal"> <i onclick="supprimer('.$prestation->ID.')" class="btn btn-danger fa fa-trash"></i></a></td>
              </tr>';
                }

        return $valeur;



    }
    public function storePartial(Request $request)
    {
        if($request->ajax()){
            if($request->has('changed')){
                $prestation = Prestation::find($request->input('Code_prestation'));
                return $prestation;
            }
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

    }
    public function delete(Request $request)
    {
       if($request->ajax()){
           if($request->has('supprimer')){
               $prestation = DecomptePrestationRepository::show($request->input('suppr'));
               $numero = $prestation->Numero_decompte;
             DecomptePrestationRepository::destroy($request->input('suppr'));
               $prestation_decompte = DecomptePrestationRepository::findByNumeroDecompte($numero);
               return $this->loadTablePrestation($prestation_decompte);
           }
       }
    }
}
