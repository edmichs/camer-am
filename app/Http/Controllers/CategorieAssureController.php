<?php

namespace App\Http\Controllers;

use App\Models\CategorieAssure;
use App\Repositories\ExerciceRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;

class CategorieAssureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $polices = PoliceRepository::getByExercice($exercice->ID);
        $types = TypeRepository::getAll();
        $categorie_assures = CategorieAssure::whereExerciceid($exercice->ID)->get();

        return view('Pages.Tarif.Categorie-assure.list-add',compact('polices','types','categorie_assures'));
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
        $exercice = ExerciceRepository::getExerciceEnCours();

        $ategorie = CategorieAssure::create([
           "policeId" => $request->input("policeId"),
           "typeEmployeId" => $request->input("typeEmployeId"),
           "plafond" => $request->input("plafond"),
           "montant_prime" => $request->input("montant_prime"),
           "exerciceId" => $exercice->ID,
        ]);
        if($ategorie){
            return redirect(route('compagnie_list_path'));
        }
        return redirect()->back()->with(['message' => 'echec enregistrement']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie_assure = CategorieAssure::find($id);
        return view('Pages.Tarif.Categorie-assure.show',compact('categorie_assure'));
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
}
