<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Repositories\AssureRepository;
use App\Repositories\ExerciceRepository;
use Illuminate\Http\Request;

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
        $n = count(AssureRepository::getByExercice($id));
        $exercice =ExerciceRepository::show($id);
        return view('Pages.Exercice.show',compact('exercice'));
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
              return  ExerciceRepository::cloture($request);
            }
        }
    }
}
