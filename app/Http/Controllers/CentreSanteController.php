<?php

namespace App\Http\Controllers;

use App\Repositories\CentreSanteRepository;
use App\Repositories\ExerciceRepository;
use Illuminate\Http\Request;

class CentreSanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $prestataires = CentreSanteRepository::getAll();
        return view('Pages.Prestataire.all',compact('prestataires','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Prestataire.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(CentreSanteRepository::store($request)){
            return redirect(route('list_prestataire_path'));
        }
        return redirect()->back()->with(['message'=>'centre de santé not found']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestataire = CentreSanteRepository::show($id);
        return view('Pages.Prestataire.show',compact('prestataire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestataire = CentreSanteRepository::show($id);
        return view('Pages.Prestataire.edit',compact('prestataire'));
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
        if(CentreSanteRepository::update($request)){
            return redirect(route('list_prestataire_path'));
        }
        return redirect()->back()->with(['message' => 'Update failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(CentreSanteRepository::destroy($id)){
            return redirect()->back()->with(['message' => 'delete successfull']);
        }
        return redirect()->back()->with(['message' => 'delete failed']);
    }
}
