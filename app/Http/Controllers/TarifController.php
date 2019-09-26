<?php

namespace App\Http\Controllers;

use App\Models\BaremePrestation;
use App\Models\CategoriePrestation;
use App\Repositories\BaremePrestationRepository;
use App\Repositories\CategoriePrestationRepository;
use App\Repositories\ExerciceRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\PrestationRepository;
use App\Repositories\TypeRepository;
use App\Repositories\ZoneGeoRepository;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoriePrestationRepository::getAll();
        $prestations = PrestationRepository::getAll();
        $baremes = BaremePrestationRepository::getAll();
        return view('Pages.Tarif.all', compact('categories','prestations','baremes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function addPrestation()
    {
        $categories = CategoriePrestationRepository::getAll();
        return view('Pages.Tarif.addprestation',compact('categories'));

    }
    public function addBareme()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $polices = PoliceRepository::getByExercice($exercice->ID);
        $prestations = PrestationRepository::getAll();
        $types = TypeRepository::getAll();
        $zones = ZoneGeoRepository::getAll();
        return view('Pages.Tarif.addbareme',compact('polices','prestations','types','zones'));
    }
    public function addCategorie()
    {
        return view('Pages.Tarif.addcategorie');
    }

    public function storePrestation(Request $request)
    {
        if(PrestationRepository::store($request)){
            return redirect()->back()->with(['message' => 'prestation enregistr&eacute;e avec success']);
        }
        return redirect()->back()->withInput();
    }
    public function storeBareme(Request $request)
    {
        if(BaremePrestationRepository::store($request)){
            return redirect()->back()->with(['message' => 'bareme enregistr&eacute;e avec success']);
        }
        return redirect()->back()->withInput();
    }
    public function storeCategorie(Request $request)
    {
        if(CategoriePrestationRepository::store($request)){
            return redirect()->back()->with(['message' => 'categorie enregistr&eacute;e avec success']);
        }
        return redirect()->back()->withInput();
    }

    public function getCategorie()
    {
        $categories = CategoriePrestationRepository::getAll();
        return view('Pages.Tarif.categorie', compact('categories'));
    }
    public function getPrestation()
    {
        $prestations = PrestationRepository::getAll();
        return view('Pages.Tarif.prestation', compact('prestations'));
    }
    public function getBareme()
    {
        $baremes = BaremePrestationRepository::getAll();
        return view('Pages.Tarif.bareme', compact('baremes'));
    }

    public function editBareme($id)
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $polices = PoliceRepository::getByExercice($exercice->ID);
        $prestations = PrestationRepository::getAll();
        $types = TypeRepository::getAll();
        $zones = ZoneGeoRepository::getAll();
        $bareme = BaremePrestationRepository::find($id);
        return view('Pages.Tarif.editbareme', compact('bareme','exercice','polices','prestations','types','zones'));
    }
    public function editPrestation($id)
    {
        $prestation = PrestationRepository::find($id);
        $categories = CategoriePrestationRepository::getAll();
        return view('Pages.Tarif.editprestation', compact('prestation','categories'));
    }
    public function editCategorie($id)
    {
        $categorie = CategoriePrestationRepository::find($id);
        return view('Pages.Tarif.editcategorie', compact('categorie'));
    }

    public function updateCategorie(Request $request)
    {
        if(CategoriePrestationRepository::update($request)){
            return redirect(route('all_categorie_path'));
        }
        return redirect()->back()->with(['message'=> 'echec de modification']);
    }
    public function updateBareme(Request $request)
    {
        if(BaremePrestationRepository::update($request)){
            return redirect(route('all_bareme_path'));
        }
        return redirect()->back()->with(['message'=> 'echec de modification']);
    }
    public function updatePrestation(Request $request)
    {
        if(PrestationRepository::update($request)){
            return redirect(route('all_prestation_path'));
        }
        return redirect()->back()->with(['message'=> 'echec de modification']);
    }
    public function deleteCategorie($id)
    {
        if(CategoriePrestationRepository::delete($id)){
            return redirect(route('all_categorie_path'));
        }
        return redirect()->back()->with(['message'=> 'echec de suppression']);
    }
    public function deleteBareme($id)
    {
        if(BaremePrestationRepository::delete($id)){
            return redirect(route('all_bareme_path'));
        }
        return redirect()->back()->with(['message'=> 'echec de suppression']);
    }
    public function deletePrestation($id)
    {
        if(PrestationRepository::delete($id)){
            return redirect(route('all_prestation_path'));
        }
        return redirect()->back()->with(['message'=> 'echec de suppression']);
    }


}
