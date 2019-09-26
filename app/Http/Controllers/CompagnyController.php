<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Repositories\CompagnyRepository;
use App\Repositories\ExerciceRepository;
use Illuminate\Http\Request;

class CompagnyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $compagnies = Etablissement::all();
        return view('Pages.Compagnie.all', compact('compagnies','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        return view('Pages.Compagnie.add',compact('exercice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(CompagnyRepository::store($request)){
            return redirect(route('compagnie_list_path'));
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
        $compagny = CompagnyRepository::show($id);
        if($compagny){
            return view('Pages.Compagnie.show',compact('compagny'));
        }
        return redirect()->back()->with(['message' => 'Compagnie not fout']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compagny = CompagnyRepository::show($id);
        return view('Pages.Compagnie.edit',compact('compagny'));
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

        if(CompagnyRepository::update($request)){
            return redirect(route('compagnie_list_path'));
        }
        return redirect()->back()->with(['message'=>'update compagny failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(CompagnyRepository::destroy($id)){
            return redirect(route('compagnie_list_path'));
        }
        return redirect()->back()->with(['message'=>'delete compagny failed']);
    }

    public function printAll()
    {
        $compagnies = CompagnyRepository::getAll();
        return view('Print.compagny', compact('compagnies'));
    }
}
