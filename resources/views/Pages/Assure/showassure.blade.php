@extends('Layouts.template2')
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
        <h1>
            D&eacute;tails
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tail Assur&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="{{route('list_assure_path')}}" class="btn btn-sucess">Retour a la liste</a>
                        <!-- Post Content Column -->
                        <div class="col-lg-12">

                            <!-- Title -->
                            <h1>D&eacute;tails de l'assur&eacute; <strong>{{$assure->Nom}}</strong></h1> <br>


                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile-img">
                                                @if($assure->Avatar)
                                                <img src="/img/{{$assure->Avatar}}" width="250px" height="250px" class="img-responsive" alt="{{$assure->Avatar}}"/>

                                                @else
                                                <img src="/img/default.png" width="250px" height="250px" class="img-responsive" alt="{{$assure->Avatar}}"/>
                                            @endif
                                                <br>

                                        </div>
                                        <div class="row">
                                            <a class="btn btn-info" target="_blank" href="{{ route('assure.print', $assure) }}"><i class="fa fa-print"></i> Imprimer</a>
                                        </div>
                                        <!-- Profile Image -->
                                    </div>
                                    <div class="col-md-9">
                                        <div class="name-wrapper col-md-6 form-inline" hidden>
                                            <label for="Nom">Exercice : </label>
                                            <input type="text" class="form-control" value="{{date("Y", strtotime($assure->exercice->Date_debut))}}" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Nom">Filiale :</label>
                                            <input type="text" class="form-control" value="{{$assure->succursale->Nom}}" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Nom">Nom :</label>
                                            <input type="text" class="form-control" value="{{$assure->Nom}}" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Fonction :</label>
                                            <input type="text" value="{{$assure->Fct_employe}}" class="form-control" disabled>

                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">R&eacute;f&eacute;rence / Matricule :</label>
                                            <input type="text" value="{{$assure->Matricule}}-{{$assure->code_famille()->exists() ? $assure->code_famille->Code : ""}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Observation :</label>
                                            <input type="text" value="{{$assure->Observation}}" class="form-control" disabled>
                                        </div>

                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Date de Naissance :</label>
                                            <input type="text" value="{{date("d/m/Y", strtotime($assure->Datenaiss))}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Lieu de naissance :</label>
                                            <input type="text" value="{{$assure->Lieu_naiss}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Nationalit&eacute; :</label>
                                            <input type="text" value="{{$assure->Nationalite}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Situation Matrimonial :</label>
                                            @if($assure->Situa_marital == 1)
                                                <strong>Mari&eacute; <span></span> </strong>
                                            @else
                                                <strong>C&eacute;libataire</strong>
                                            @endif
                                            <br><br>
                                        </div>

                                        <section class="section-contact section-wrapper">
                                            <div class="container">
                                                <div class="row">


                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <address>
                                                                    <strong>Numero police</strong><br>
                                                                    {{$assure->police()->exists() ? $assure->police->Numero_police : ''}}

                                                                </address>
                                                            </div> <div class="col-md-4">
                                                                <address>
                                                                    <strong>Plafond</strong><br>
                                                                    {{$assure->Plafond ? $assure->Plafond : 0 }} XFA

                                                                </address>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <address>
                                                                    <strong>Taux de couverture</strong><br>
                                                                    {{$assure->Taux_couverture ? $assure->Taux_couverture : 0}} %
                                                                </address>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <address>
                                                                    <strong>En cours consommation</strong><br>
                                                                    {{$assure->Encour_conso ? $assure->Encour_conso : 0}} XFA
                                                                </address>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <address>
                                                                    <strong>Solde</strong><br>
                                                                    {{$assure->Solde ? $assure->Solde : 0}} XFA
                                                                </address>
                                                            </div>

                                                        </div>
                                                        <!--.row-->

                                                    </div>
                                                </div>
                                                <!--.row-->

                                            </div>
                                            <!--.container-fluid-->
                                        </section>

                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script type="text/javascript">


    </script>
@endsection()