@extends('Layouts.template2')


@php
$police = $bpc->police;
$assure = $bpc->assure;
$affection = $bpc->affection;
$medecin_conseil = $bpc->medecin_conseil;
@endphp


@section('css')
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tails BPC</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Details du BPC N&deg; <strong>{{$bpc->Numero_bpc}}</strong></h3> <br>
                        <a href="{{route('list_bpc_path')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-12 text-center" >
                                <label for="Numero">Numero Bpc: <strong>{{$bpc->Numero_bpc}}</strong></label>
                            </div>
                            <div class="col-md-12">
                                <h3><u>POLICE</u></h3>
                                <div class=" col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Numero_police">Num&eacute;ro Police : {{$police ? $police->Numero_police : ''}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="SuccursaleID">Police Maladie pour : <strong>{{$police ?($police->succursale()->exists() ? $police->succursale->Nom: "")  : ''}}</strong></label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="SuccursaleID">Exercice : <strong>{{date("Y", strtotime($bpc->exercice->Date_debut))}}</strong></label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Date Effet : <strong>{{date("d/m/Y", strtotime($police ? $police->Date_effet : ''))}}</strong> </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Date_echeance">Date Echeance : <strong>{{date("d/m/Y", strtotime($police ? $police->Date_echeance : ''))}}</strong> </label>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3><u>ASSURE</u></h3>
                                <div class=" col-md-12">
                                    <div class="form-group col-md-12">
                                        <label for="Numero_police">Nom & prenom : {{$assure ? $assure->Nom : ""}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="SuccursaleID">Date Naissance : <strong>{{$assure ? $assure->Datenaiss : ''}}</strong></label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="SuccursaleID">Lieu de naissance : <strong>{{$assure ? $assure->Lieu_naiss : ""}}</strong></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Affection : <strong>{{$bpc->affection->Description}}</strong> </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Date_echeance">Hauteur couverture : <strong>{{$assure ? $assure->Taux_couverture : ''}} %</strong> </label>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Date_echeance">Plafond Remboursement : <strong>{{$assure ? $assure->Plafond : ''}} XFA</strong> </label>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Date_echeance">En cours : <strong>{{$assure ? $assure->Encour_conso : ''}} XFA</strong> </label>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Date_echeance">Date Sinistre : <strong>{{date("d/m/Y", strtotime($bpc->Date_sinistre))}}</strong> </label>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_echeance">Date d&eacute;claration : <strong>{{date("d/m/Y", strtotime($bpc->Date_declaration))}}</strong> </label>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ol>

                                            @foreach(\App\Models\Extrait_prestation::whereBpcid($bpc->ID)->get() as $prestation)

                                            <li>
                                                {{$prestation->prestation->categorie_prestation->Libelle}}

                                                <label>
                                                    <input type="radio" name="optradio[{{$prestation->ID}}]" checked class="flat-green" value="{{$prestation->ID}}" >
                                                    Oui
                                                </label>
                                                <label>
                                                    <input type="radio" disabled name="optradio[{{$prestation->ID}}]" class="flat-green" value="0">
                                                    Non
                                                </label>
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <table class="table table-bordered table-striped dataTable">
                                                            <thead>
                                                            <tr>
                                                                @foreach(\App\Models\Prestation::where('Categorie_PrestationID','=',$prestation->prestation->categorie_prestation->ID)->get() as $presta)
                                                                    <th>
                                                                        {{$presta->Code_prestation}} = {{$presta->Plafond}}
                                                                        <br>
                                                                    </th>

                                                                @endforeach
                                                            </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>


                                                    </div>
                                                    <div >



                                                    </div>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ol>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <h3><u>BENEFICIARE (CENTRE DE SANTE)</u></h3>
                                        <label for="Centre_sante">Nom (lib&eacute;ll&eacute;) : <strong>{{$bpc->centre_sante->Nom}}</strong> </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h3><u>MEDECIN CONSEIL</u></h3>
                                        <label for=""> Nom (lib&eacute;ll&eacute;) : <strong>{{$bpc->medecin_conseil->Noms}}</strong></label><br>

                                        <label for="">T&egrave;l :<strong>{{$bpc->medecin_conseil->Telephone}}</strong></label><br>
                                        <label for="">Email : <strong>{{$bpc->medecin_conseil->Email}}</strong></label><br>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <a class="btn btn-info" href="{!! route('bpc.print', $bpc->ID) !!}" target="_blank">Imprission </a>
                                    </div>
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

@endsection()