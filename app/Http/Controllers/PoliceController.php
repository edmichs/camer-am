<?php

namespace App\Http\Controllers;

use App\Repositories\CompagnyRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();;
        $polices = PoliceRepository::getAll();
        return view('Pages.Police.all',compact('polices','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $surccusales = SurccusaleRepository::getAll();
        $polices = PoliceRepository::getAll();
        $compagnies = CompagnyRepository::getAll();
        return view('Pages.Police.add', compact('exercice','surccusales','polices','compagnies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'Numero_police' => 'required|unique:police|max:255',
            'SuccrursaleID' => 'required|integer',
            'ExerciceID' => 'required|integer',
            'Date_effet' => 'required|date',
            'Date_echeance' => 'required|date|after:Date_effet',
            'Date_souscription' => 'required|date|before_or_equal:Date_effet',
            'Date_emission' => 'required|date',
            'Prime_total' => 'required|integer',
            'Accessoires'=>'required|integer',
            'Plafond_garanti' => 'required|integer',
            
        ]);
        if (!$validatedData) {
            return redirect()->back()->withInput();
        }
        if(PoliceRepository::store($request)){

            return redirect(route('list_police_path'))->with('success','police enregistré avec success');
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
        $police = PoliceRepository::show($id);
        return view('Pages.Police.show',compact('police'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $surccusales = SurccusaleRepository::getAll();
        $compagnies = CompagnyRepository::getAll();
        $police = PoliceRepository::show($id);
        return view('Pages.Police.edit',compact('police','exercice','surccusales','compagnies'));
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
        if(PoliceRepository::update($request)){
            return redirect(route('list_police_path'));
        }
        return redirect()->back()->with(['message' => 'Update police Failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(PoliceRepository::destroy($id)){
            return redirect(route('list_police_path'));
        }
        return redirect()->back()->with(['message' => 'delete police Failed']);
    }

    public function printAll()
    {
        $polices = PoliceRepository::getAll();
        return view('Print.police',compact('polices'));
    }
}
