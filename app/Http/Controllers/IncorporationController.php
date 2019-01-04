<?php

namespace App\Http\Controllers;

use App\Repositories\AssureRepository;
use App\Repositories\CodeFamilleRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\IncorporationRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\SurccusaleRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use DB;

class IncorporationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = CodeFamilleRepository::getAll();
        $surccusales = SurccusaleRepository::getAll();
        $exercice = ExerciceRepository::getExerciceEnCours();
        $typeemployes = TypeRepository::getAll();
        $polices = PoliceRepository::getAll();
        $incorporates = IncorporationRepository::getAll();
        return view('Pages.Assure.incorporation',compact('incorporates','familles','surccusales','exercice','typeemployes','polices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(IncorporationRepository::store($request)){
            return redirect()->back()->with(['message'=>'store successfull']);
        }
        return redirect()->back()->with(['message'=>'store failed']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incorporate = IncorporationRepository::show($id);
        return view('Pages.Assure.showincorporate',compact('incorporate'));
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
        $polices = PoliceRepository::getAll();
        $incorporate = IncorporationRepository::show($id);
        $surccusales = SurccusaleRepository::getAll();
        return view('Pages.Assure.editincorporate',compact('familles','exercice','typeemployes','polices','incorporate','surccusales'));
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
       // DB::beginTransaction();
       // try{
            if(AssureRepository::store($request)){
                IncorporationRepository::destroy($request->input('ID'));
             //   DB::commit();
                return redirect(route('incorporation_assure_path'));
           }
      //  }catch (\Exception $e){
           // DB::Rollback();
            return redirect()->back()->with(['message' =>'update failed']);
     //   }




    }

    public function upToDate(Request $request)
    {
       // DB::beginTransaction();
      //  try{*

            if(AssureRepository::insert($request)){
                IncorporationRepository::destroy($request->input('ID'));
           //     DB::commit();
                return redirect(route('incorporation_assure_path'));
            }
     //   }catch (\Exception $e){
          //  DB::Rollback();
            return redirect()->back()->with(['message' =>'update failed']);
      //  }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(IncorporationRepository::destroy($id)){
            return redirect()->back()->with(['message'=>'delete successfull']);
        }
        return redirect()->back()->with(['message'=>'delete failed']);
    }
}
