@extends('Layouts.template2')
@section('css')
    <style>
        hr {
            border: 1px solid black;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            D&eacute;tails D&eacute;compte
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tails D&eacute;compte</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

            <div class="row">

                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Details du D&eacute;compte N&deg; <strong>{{$decompte->Numero_decompte}}</strong></h3> <br>
                                <a href="{{route('list_decompte_path')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="form-inline col-md-3">
                                        <label for="Numero_decompte">N&deg; D&eacute;compte : <strong>{{$decompte->Numero_decompte}}</strong></label>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="Garanti">Type Garanti : <strong>{{$decompte->garanti()->exists() ? $decompte->garanti->Description : ""}}</strong></label>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="affection">Categorie affection : <strong>{{$decompte->affection()->exists() ? $decompte->affection->Description : ""}}</strong> </label>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="PoliceID">Num&eacute;ro Police : <strong>{{$decompte->police()->exists() ? $decompte->police->Numero_police : ""}}</strong></label>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="SuccursaleID">Police Maladie pour : <strong>{{$decompte->police()->exists() ? $decompte->police->succursale->Nom : ""}}</strong></label>

                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6 ">
                                            <label for="Nom">Nom & Prenoms : <strong>{{$decompte->assure()->exists() ? $decompte->assure->Nom : ""}}</strong> </label>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="Datenaiss">Date de naissance : <strong>{{$decompte->assure()->exists() ? date("d-m-Y", strtotime($decompte->assure->Datenaiss)) : ""}}</strong></label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="lieu">Lieu de Naissance : <strong>{{$decompte->assure()->exists() ? $decompte->assure->Lieu_naiss : ""}}</strong></label>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label for="Date_declaration">D&eacute;clar&eacute; le : <strong>{{date("d-m-Y", strtotime($decompte->Date_declaration))}}</strong></label>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="Date_surveillance">Surv&eacute;nu le : <strong>{{date("d-m-Y", strtotime($decompte->Date_surveillance))}}</strong></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Date_echeance">Cat&eacute;gorie Prestation : <strong>{{$decompte->prestation()->exists() ? $decompte->prestation->Libelle : ""}}</strong></label>

                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="Numero_facture">Numero Facture : <strong>{{$decompte->Numero_facture}}</strong></label>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Montant_facture">Montant Facture :  <strong>{{$decompte->Montant_facture}}</strong></label>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Nombre_piece">Nombre de pi&egrave;ces : <strong>{{$decompte->Nombre_piece}}</strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Taux_remboursement">Taux Remboursement :  <strong>{{$decompte->assure()->exists() ? $decompte->assure->Taux_couverture : ""}}</strong></label>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="Description_soins">Description Soins : <strong>{{$decompte->Description_soins}}</strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Nom_medecin">Nom M&eacute;d&eacute;cin : <strong>{{$decompte->Nom_medecin}}</strong></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="zonegeoID">Lieu : {{$decompte->zonegeo()->exists() ? $decompte->zonegeo->Libelle : ""}}</label>

                                        </div>
                                    </div>
                                    <div class="col-md-12">



                                        <div class="col-md-12">
                                            <hr>
                                            <br>
                                            <h4>Listes des prestations &agrave; rembourser du d&eacute;compte </h4>

                                            <div id="prestadecompte">
                                                <div class="table-responsive">
                                                    <table id="example2" class="table table-bordered table-striped dataTable">

                                                        <thead>
                                                        <tr>
                                                            <!--th>N?</th-->
                                                            <th>Code Prestation</th>
                                                            <th width="12%">Lib&eacute;ll&eacute; prestation</th>
                                                            <th>Plafond (en XFA)</th>
                                                            <th>Montant D&eacute;clar&eacute; (en XFA)</th>
                                                            <th>Montant retenu (en XFA)</th>
                                                            <th>Montant a payer (en XFA)</th>
                                                            <th>Rejet</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($prestations as $prestation)
                                                            <tr>
                                                                <td>{{$prestation->Code_prestation}}</td>
                                                                <td>{{$prestation->Libelle_prestation}}</td>
                                                                <td>{{$prestation->Plafond}}</td>
                                                                <td>{{$prestation->Montant_declare}}</td>
                                                                <td>{{$prestation->Montant_retenu}}</td>
                                                                <td>{{$prestation->Montant_payer}}</td>
                                                                <td>{{$prestation->Rejet == 0 ? "NON" : "OUI"}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-info " target="_blank"  href="{!! route('decompte.print', $decompte->ID) !!}" name="action">
                                                Imprimer
                                            </a>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


            </div>


    </section>

@endsection

@section('js')
    <script>
        function resetForm(id) {
            $('#' + id).val(function () {
                return this.defaultValue;
            });
        }
        ;

    </script>
@endsection()