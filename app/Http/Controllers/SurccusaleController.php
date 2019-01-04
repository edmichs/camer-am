<?php

namespace App\Http\Controllers;

use App\Models\Souscripteur;
use App\Models\Succursale;
use App\Repositories\AssureRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;

class SurccusaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $surccusales = SurccusaleRepository::getAll();
        return view('Pages.Surccusale.all',compact('surccusales','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $souscripteurs = Souscripteur::all();
       return view('Pages.surccusale.add',compact('souscripteurs','exercice'));
    }

    public function getAll()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $souscripteurs = Souscripteur::all();
        return view('Pages.Surccusale.all',compact('souscripteurs','exercice'));

    }
    public function getFormAdd($id)
    {
        $souscripteur = Souscripteur::whereId($id);
        return view('',compact('souscripteur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(SurccusaleRepository::store($request)){
            return redirect(route('list_surccusale_path'));
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
        $countassure = count(AssureRepository::getBySurccusale($id));
      $surccusale = SurccusaleRepository::show($id);
        if($surccusale){
            return view('Pages.Surccusale.show',compact('surccusale','countassure'));
        }
        return redirect()->back()->with(['message' =>'Surccusale not found']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surccusale = SurccusaleRepository::show($id);
        return view('Pages.Surccusale.edit',compact('surccusale'));
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

        if(SurccusaleRepository::update($request)){
            return redirect(route('list_surccusale_path'));
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
        if(SurccusaleRepository::destroy($id)){
            return redirect(route('list_surccusale_path'));
        }
        return redirect()->back()->with(['message' => 'destroy failed']);
    }
}
