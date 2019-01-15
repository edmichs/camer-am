<?php

namespace App\Http\Controllers;

use App\Models\Police;
use App\Repositories\ExerciceRepository;
use App\Repositories\PoliceRepository;
use App\Repositories\RemboursementRepository;
use Illuminate\Http\Request;


class RemboursementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $remboursements = RemboursementRepository::getAll();
        return view('Pages.Remboursement.all',compact('remboursements','exercice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercice = ExerciceRepository::getExerciceEnCours();
        $polices = PoliceRepository::getAll();
        return view('Pages.Remboursement.add',compact('exercice','polices'));
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
            if($request->has('changed')){
                $police = Police::with('succursale')->whereId($request->input('PoliceID'))->first();
                return $this->loadTablePrestation($police->ID);
            }
        }
    }
    function loadTablePrestation($policeId){
    $remboursements = RemboursementRepository::RemboursementActif($policeId);
    $valeur= '<table id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                        <tr>
                                            <!--th>N°</th-->
                                            <th>N&deg; decompte</th>
                                            <th width="12%">N&deg; facture</th>
                                            <th>B&eacute;n&eacute;ficiaire</th>
                                            <th>D&eacute;clar&eacute;</th>
                                            <th>survenu</th>
                                            <th>Montant Facture</th>
                                            <th>Montant a Retenu</th>
                                        </tr>
                                        </thead>
                                        <tbody>';
    foreach($remboursements as $remboursement){
        $valeur.='<tr>
                <td>' .$remboursement->decompte->Numero_decompte. '</td>
                <td>' .$remboursement->decompte->Numero_facture . '</td>
                <td>' .$remboursement->decompte->Beneficiaire. '</td>
                <td>' .$remboursement->Montant_prestation. '</td>
                <td>' .$remboursement->decompte->Date_declaration. '</td>
                <td>' .$remboursement->Montant_facture. '</td>
                <td>' .$remboursement->Montant_retenu. '</td>';
        $valeur.='</tbody><tfoot>
                      <tr>
                        <th colspan="4">Total</th>
                        <th>0</th>
                        <th>0</th>
                        <th>0</th>
                      </tr>
                    </tfoot>
                  </table>';

    return $valeur;



}
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
     * Print pdf of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printer($id = null)
    {
        // TODO recuperer le remboursement par l'id et corriger la route dans web
        $reboursement = new Remboursement;
        if($reboursement){
//            return view('Pages.Remboursement.print',compact('reboursement'));

            $pdf = App::make('dompdf.wrapper');

            $pdf->loadView('Pages.Remboursement.print', compact('reboursement') );
//        dd(compact('souscripteurs', 'exercice', 'pdf'));

            return $pdf->stream();
        }
        return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);
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
