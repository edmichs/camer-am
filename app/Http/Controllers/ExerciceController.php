<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\Exercice;
use App\Models\Incorporation;
use App\Models\Police;
use App\Repositories\AssureRepository;
use App\Repositories\BpcRepository;
use App\Repositories\DecompteRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\IncorporationRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\RemboursementRepository;
use App\Repositories\SouscripteurRepository;
use Illuminate\Http\Request;
use DB;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encours = Exercice::Where('Cloture','=','0')->OrderBy('ID','desc')->first();
       $exercices =  Exercice::all();
        return view('Pages.Exercice.exercice',compact('exercices','encours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        return view('Pages.Exercice.add',compact('exercice'));
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
            if($request->has('importer')){
                DB::beginTransaction();
                try{
                    $newExercice = ExerciceRepository::store($request);
                   /* foreach(AssureRepository::getAll() as $assure){
                        $ass = new Assure();
                        $ass->Nom = $assure->Nom;
                        $ass->Datenaiss = $assure->Datenaiss;
                        $ass->Matricule = $assure->Matricule;
                        $ass->Lieu_naiss = $assure->Lieu_naiss;
                        $ass->Avatar = $assure->Avatar;
                        $ass->Situa_marital = $assure->Situa_marital;
                        $ass->Fct_employe = $assure->Fct_employe;
                        $ass->Observation = $assure->Observation;
                        $ass->Taux_couverture = $assure->Taux_couverture;
                        $ass->Plafond = $assure->Plafond;
                        $ass->Encour_conso = $assure->Encour_conso;
                        $ass->Nationalite = $assure->Nationalite;
                        $ass->Solde = $assure->Solde;
                        $ass->Code_familleID = $assure->Code_familleID;
                        $ass->Date_incorporation = $assure->Date_incorporation;
                        $ass->ExerciceID = $newExercice->ID;
                        $ass->Montant_prime = $assure->Montant_prime;
                        $ass->Type_EmployeID = $assure->Type_EmployeID;
                        $ass->SuccursaleID = $assure->SuccursaleID;
                        $ass->PoliceID = $assure->PoliceID;
                        $ass->save();

                    }
                    foreach(PoliceRepository::getAll() as $police){
                        $pol = new Police();
                        $pol->ExerciceID = $newExercice->ID;
                        $pol->SuccursaleID = $police->SuccursaleID;
                        $pol->Date_effet = $police->Date_effet;
                        $pol->Date_souscription = $police->Date_souscription;
                        $pol->Date_echeance = $police->Date_echeance;
                        $pol->EtablissementID = $police->EtablissementID;
                        $pol->Date_emission = $police->Date_emission;
                        $pol->Prime_total = $police->Prime_total;
                        $pol->Accessoires = $police->Accessoires;
                        $pol->Prime_nette = $police->Prime_nette;
                        $pol->Numero_police = $police->Numero_police;

                        $pol->save();
                    }

                    foreach(IncorporationRepository::getAll() as $incorporate){
                        $incor = new Incorporation();
                        $incor->PoliceID = $incorporate->PoliceID;
                        $incor->SuccursaleID = $incorporate->SuccursaleID;
                        $incor->Code_familleID = $incorporate->Code_familleID;
                        $incor->Type_EmployeID = $incorporate->Type_EmployeID;
                        $incor->ExerciceID = $newExercice->ID;
                        $incor->Matricule = $incorporate->Matricule;
                        $incor->Nom = $incorporate->Nom;
                        $incor->Avatar = $incorporate->Avatar;
                        $incor->Lieu_naiss = $incorporate->Lieu_naiss;
                        $incor->Datenaiss = $incorporate->Datenaiss;
                        $incor->Situa_marital = $incorporate->Situa_marital;
                        $incor->Fct_employe = $incorporate->Fct_employe;
                        $incor->Observation = $incorporate->Observation;
                        $incor->Nationalite = $incorporate->Nationalite;
                        $incor->Date_incorporation = $incorporate->Date_incorporation;
                        $incor->save();
                    }*/
                    DB::commit();
                    return $newExercice;
                }catch (\Exception $e){
                    DB::Rollback();
                    return $e->getMessage();
                }

            }
        }

        if(ExerciceRepository::store($request)){
            return redirect(route('list_exercice_path'));
        }
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assure = count(AssureRepository::getByExercice($id));
        $incorporate = count(IncorporationRepository::getByExercice($id));
        $bpc = count(BpcRepository::getByExercice($id));
        $decompte = count(DecompteRepository::getByExercice($id));
        $remboursement = count(RemboursementRepository::getByExercice($id));
        $police = count(PoliceRepository::getByExercice($id));
        $exercice =ExerciceRepository::show($id);
        return view('Pages.Exercice.show',compact('exercice','assure','incorporate','bpc','decompte','remboursement','police','id'));
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

    public function cloture(Request $request)
    {
        if($request->ajax()){
            if($request->has('supprimer')){
               ExerciceRepository::cloture($request);
                return redirect()->back()->with(['message'=>'Exercice clotur&eacute; avec success']);
            }
        }
        ExerciceRepository::cloture($request);
        return redirect()->back()->with(['message'=>'Exercice clotur&eacute; avec success']);

    }

    public function getSuccursale($id)
    {
        $succursales = ExerciceRepository::getSuccursale($id);
        $exercice = ExerciceRepository::show($id);
        return view('Pages.Exercice.succursale',compact('succursales','exercice'));
    }
    public function getAssure($id)
    {
        $assures = ExerciceRepository::getAssure($id);
        $exercice = ExerciceRepository::show($id);
        return view('Pages.Exercice.assure',compact('assures','exercice'));

    }
    public function getIncorporate($id)
    {
        $incorporates = ExerciceRepository::getIncorporate($id);
        $exercice = ExerciceRepository::show($id);
        return view('Pages.Exercice.incorporate',compact('incorporates','exercice'));
    }
    public function getBpc($id)
    {
        $bpcs = ExerciceRepository::getBpc($id);
        $exercice = ExerciceRepository::show($id);
        return view('Pages.Exercice.bpc',compact('bpcs','exercice'));

    }
    public function getDecompte($id)
    {
        $decomptes = ExerciceRepository::getDecompte($id);
        $exercice = ExerciceRepository::show($id);
        return view('Pages.Exercice.decompte',compact('decomptes','exercice'));
    }
    public function getRemboursement($id)
    {
        $remboursements = ExerciceRepository::getRemboursement($id);
        $exercice = ExerciceRepository::show($id);
        return view('Pages.Exercice.rembourement',compact('remboursements','exercice'));

    }

    public function storeWithImport(Request $request)
    {

    }
}
