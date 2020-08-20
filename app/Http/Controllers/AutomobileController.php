<?php

namespace App\Http\Controllers;

use App\Models\Garanti;
use App\Models\GarantiAutomobile;
use App\Repositories\AssureRepository;
use App\Repositories\AutomobileRepository;
use App\Repositories\CarteGriseRepository;
use App\Repositories\CompagnyRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\SouscripteurRepository;
use App\Repositories\SurccusaleRepository;
use Illuminate\Http\Request;
use App\Repositories\ExerciceRepository;
use App\Models\Automobile;
use App\Models\Categorie_tarif;
use App\Models\CategorieGaranti;
use App\Models\Tarif;
use App\Models\Puissance;
use Illuminate\Support\Facades\Input;

use DB;
use Illuminate\Support\Facades\App;
use PDF;
use App\Repositories\IncorporationRepository;
use App\Models\Zone;

class AutomobileController extends Controller
{
    protected $puissance;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $autos= AutomobileRepository::getByExercices($exercice->ID);

        return view('Pages.Categories.Automobile.all', compact('exercice','autos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        $n = count(AutomobileRepository::getAll()) + 1;
        $numero = "PRO".mt_rand(0,999)."AUTO".$n;
        $puissances = Puissance::all();
        $compagnies = CompagnyRepository::getAll();
        $categorie_tarifs = Categorie_tarif::all();
        $categorie_garanties = CategorieGaranti::all();
        $exercice = ExerciceRepository::getExerciceEnCours();
        return view('Pages.Categories.Automobile.add', compact('exercice','categorie_tarifs','categorie_garanties','compagnies','puissances','numero','zones'));

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

        if ($request->ajax()) {

            if ($request->has('change')) {
                $array = array();
                $tarif = Tarif::with('garanti')->whereDuree($request->input('duree'))->wherePuissanceId($request->input('puissance_id'))->whereCategorieTarifId($request->input('categorie'))->get();
                array_push($array, $tarif);
                return $tarif;

            }
            if ($request->has('changeCheckbox')) {
                $array = array();
                $tarif = Tarif::with('garanti')->whereDuree($request->input('duree'))->wherePuissanceId($request->input('puissance_id'))->whereCategorieTarifId($request->input('categorie'))->whereGarantiId($request->input('id'))->get();
               // $garanti = Garanti::find($request->input('id'));
                array_push($array, $tarif);
                return $tarif;

            }

        }
       
        DB::beginTransaction();
        $validator = $this->validate($request, [
            "Nom" => 'required|string|max:255',
            "numero_permis" => 'required|string|max:255',
            "Telephone" => 'required|integer|min:8',
            "Email" => 'required|string|max:255',
            "Datenaiss" => 'required|date',
            "Fct_employe" => 'required|string|max:255',
            "Lieu_naiss" => 'required|string|max:255',

            "Date_emission" => "required|date",
            "duree" => 'required|integer',
            "Date_effet" => 'required|date',
           

            "nom" => "required|string|max:255",
            "immatriculation" => 'required|string|max:255',
            "date_delivre" => 'required|date',
            "date_first_circulation" => 'required|date',
            "marque" => 'required|string|max:255',
            "genre" => 'required|string|max:255',
            "carrosserie" => 'string|max:255',
            "numero_serie" => 'string|max:255',
            "energie" => 'string|max:255',
            "nbre_places" => 'integer|max:255',
            "charge_utile" => 'integer',
            "ptac" => 'integer',
            "poids_vide" => 'string|max:255',
           ]);
      try{
           
            $exercice = ExerciceRepository::getExerciceEnCours();


             $incorporation = IncorporationRepository::create($request, $exercice->ID);
            $carte_grise = CarteGriseRepository::store($request);

            $automobile = AutomobileRepository::create($request,$exercice->ID,$carte_grise->id,$incorporation->ID);
            
            foreach($request->input('checkbox') as $checkbox){
                    $tarif = Tarif::wherePrimeNette($request->input('nette'.$checkbox))->wherePttc($request->input('totale'.$checkbox))->whereGarantiId($checkbox)->first();
                    if($tarif){
                        GarantiAutomobile::create([
                            'automobile_id' => $automobile->id,
                            'garanti_id' => $checkbox,
                            'tarifs_id' => $tarif->id,
                            'etat' => 1
                        ]);
                    }

            }
           DB::commit();
           return redirect()->route('auto_show_path', ['title' => $automobile->numero, 'id' => $automobile->id]);
            
      }catch(\Exception $e){
            DB::Rollback();
            
            return redirect()->back()->withInput()
            ->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title,$id)
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $auto = AutomobileRepository::findById($id);
        return view("Pages.Categories.Automobile.show", compact("auto","exercice"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($title, $id)
    {
        $zones = Zone::all();
        $puissances = Puissance::all();
        $compagnies = CompagnyRepository::getAll();
        $categorie_tarifs = Categorie_tarif::all();
        $categorie_garanties = CategorieGaranti::all();
        $exercice = ExerciceRepository::getExerciceEnCours();
        $auto = AutomobileRepository::findById($id);
        return view("Pages.Categories.Automobile.edit", compact("auto","exercice","puissances","compagnies","categorie_tarifs","categorie_garanties","zones"));
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
    public function destroy(Request $request)
    {
        try {
            if (AutomobileRepository::cancel($request)) {
                return redirect(route('auto_list_path'))->with(["error" => "Cette proposition a été annulé avec success"]);
            }
            return redirect()->back()->with(["error" => "Echec d'annulation, Veuillez reessayer svp"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(["error" => "Echec d'annulation, Veuillez reessayer svp"]);
        }
       
        
    }

    public function printer()
    {
        $pdf = PDF::loadView('Pages.Categories.Automobile.print');
        return $pdf->download('automobile.pdf');
    }

    public function destroyGaranti($garanti_id, $auto_id)
    {
        $garanti = GarantiAutomobile::whereGarantiId($garanti_id)->whereAutomobileId($auto_id)->first();

        if ($garanti && $garanti != null) {
          
            return $garanti->delete();
        }
        return null;
    }
}
