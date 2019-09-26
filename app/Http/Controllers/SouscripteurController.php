<?php

namespace App\Http\Controllers;

use App\Models\Souscripteur;
use App\Models\Succursale;
use App\Repositories\ExerciceRepository;
use App\Repositories\SouscripteurRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\App;


class SouscripteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
             $souscripteurs = Souscripteur::all();
        return view('Pages.Souscripteur.all',compact('souscripteurs','exercice'));
    }

    /**
     * Download pdf a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download_pdf()
    {

        $exercice = ExerciceRepository::getExerciceEnCours();
        $souscripteurs = Souscripteur::all();

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('Pages.Souscripteur.printall', compact('souscripteurs','exercice') );

        return $pdf->download('Souscripteur_liste.pdf');
    }

    /**
     * Display pdf a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stream_pdf()
    {

        $exercice = ExerciceRepository::getExerciceEnCours();
        $souscripteurs = Souscripteur::all();

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('Pages.Souscripteur.printall', compact('souscripteurs','exercice') );
//        dd(compact('souscripteurs', 'exercice', 'pdf'));

        return $pdf->stream();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        return view('Pages.Souscripteur.add',compact('exercice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $souscripteur = SouscripteurRepository::store($request);
            /*
            Succursale::create([
                    'SouscripteurID'=>$souscripteur->ID,
                    'Statut'=>$souscripteur->statut,
                    'Nom'=>$souscripteur->nom,
                    'Raison_social'=>$souscripteur->raison_social,
                    'Activite'=>$souscripteur->activite,
                    'Adresse'=>$souscripteur->adresse,
                    'Ville'=>$souscripteur->ville,
                    'Pays'=>$souscripteur->pays,
                    'Telephone'=>$souscripteur->telephone,
                    'Nom_contact'=>$souscripteur->nom_contact

                ]);*/
            DB::commit();
                return redirect(route('souscripteur_list_path'));

        }catch (\Exception $e){
                DB::Rollback();
            return redirect()->back()->withInput();
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
        $souscripteur = SouscripteurRepository::show($id);
        if($souscripteur){
            $surccusales = Succursale::whereSouscripteurid($id)->get();
            return view('Pages.Souscripteur.show',compact('souscripteur', 'surccusales'));
        }
        return redirect()->back()->with(['message' => 'Souscripteur not foud']);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $souscripteur = SouscripteurRepository::show($id);
        return view('Pages.Souscripteur.edit',compact('souscripteur'));
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
        
        if(SouscripteurRepository::update($request)){
            return redirect(route('souscripteur_list_path'));
        }
        return redirect()->back()->with(['message' => 'update failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(SouscripteurRepository::destroy($id)){
            return redirect(route('souscripteur_list_path'));
        }
        return redirect()->back()->with(['message' => 'destroy failed']);
    }

    public function addNew($id)
    {
        $souscripteur = SouscripteurRepository::show($id);
        return redirect(route('add_surccusale_path'))->with(['souscripteur' => $souscripteur]);
    }

    public function printAll()
    {
        $souscripteurs = Souscripteur::all();
        return view('Print.souscripteur',compact('souscripteurs'));
    }
}
