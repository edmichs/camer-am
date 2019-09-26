<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\CodeFamille;
use App\Models\Exercice;
use App\Models\Succursale;
use App\Repositories\AssureRepository;
use App\Repositories\CodeFamilleRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\SurccusaleRepository;
use App\Repositories\TypeRepository;
use App\Repositories\UploadRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AssureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
       $assures = AssureRepository::getByExercice($exercice->ID);
        return view('Pages.Assure.all',compact('assures','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familles = CodeFamilleRepository::getAll();
        $surccusales = SurccusaleRepository::getAll();
        $exercice = ExerciceRepository::getExerciceEnCours();
        $typeemployes = TypeRepository::getAll();
        $polices = PoliceRepository::getByExercice($exercice->ID);
        return view('Pages.Assure.add',compact('familles','surccusales','exercice','typeemployes','polices'));
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
            if($request->has('changedSuccursale')){
                $array = array();
                $police = PoliceRepository::getBySuccursale($request->input('SuccursaleID'),$request->input('ExerciceID'));
                array_push($array,$police);
                return $array;
            }
        }
        UploadRepository::upload($request);
        if(AssureRepository::store($request)){
            return redirect(route('list_assure_path'));
        }
        return redirect()->back()->with(['message' => 'store assure failed']);
    }

    public function getIncorporation()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $assure = AssureRepository::show($id);
        return view('Pages.Assure.showassure',compact('assure','exercice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familles = CodeFamilleRepository::getAll();
        $exercice = ExerciceRepository::getExerciceEnCours();
        $typeemployes = TypeRepository::getAll();
        $polices = PoliceRepository::getByExercice($exercice->ID);
        $assure = AssureRepository::show($id);
        if($assure){
            return view('Pages.Assure.edit',compact('assure','familles','exercice','typeemployes','polices'));
        }
        return redirect()->back()->with(['message'=>'assure not found']);
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
        if(AssureRepository::update($request)){
            return redirect(route('list_assure_path'));
        }
        return redirect()->back()->with(['message' =>'update assure failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(AssureRepository::destroy($id)){
           return redirect(route('list_assure_path'));
       }
        return redirect()->back()->with(['message' =>'delete assure failed']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printer($id)
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $assure = AssureRepository::show($id);


        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('Pages.Assure.print', compact('assure','exercice') );
//        dd(compact('souscripteurs', 'exercice', 'pdf'));

        return $pdf->stream();
    }

    public function printAll()
    {
        $assures = AssureRepository::getAll();
        return view('Print.assure', compact('assures'));
    }

    public function printByExercice()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $assures = AssureRepository::getByExercice($exercice->ID);
        return view('Print.assure', compact('assures'));
    }
}
