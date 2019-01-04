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
            <li class="active">Liste Assur&eacute;</li>
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
                        <a href="{{route('incorporation_assure_path')}}" class="btn btn-sucess">Retour a la liste</a>
                        <!-- Post Content Column -->
                        <div class="col-lg-12">

                            <!-- Title -->
                            <h1>D&eacute;tails de <strong>{{$incorporate->Nom}}</strong></h1> <br>


                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile-img">

                                            <img src="/img/{{$incorporate->Avatar}}" width="250px" height="250px" class="img-responsive" alt="{{$incorporate->Avatar}}"/>
                                            <br>

                                        </div>
                                        <!-- Profile Image -->
                                    </div>
                                    <div class="col-md-9">
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Nom">Exercice : </label>
                                            <input type="text" class="form-control" value="{{date("d/M/Y", strtotime($incorporate->exercice->Date_debut))}} - {{date("d/M/Y", strtotime($incorporate->exercice->Date_fin))}}" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Nom">Filiale :</label>
                                            <input type="text" class="form-control" value="{{$incorporate->succursale->Nom}}" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Nom">Nom :</label>
                                            <input type="text" class="form-control" value="{{$incorporate->Nom}}" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Fonction :</label>
                                            <input type="text" value="{{$incorporate->Fct_employe}}" class="form-control" disabled>

                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">R&eacute;f&eacute;rence / Matricule :</label>
                                            <input type="text" value="{{$incorporate->Matricule}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Observation :</label>
                                            <input type="text" value="{{$incorporate->Observation}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Code Famille :</label>
                                            <input type="text" value="{{$incorporate->code_famille->Code}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Date de Naissance :</label>
                                            <input type="text" value="{{$incorporate->Datenaiss}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Lieu de naissance :</label>
                                            <input type="text" value="{{$incorporate->Lieu_naiss}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Nationalit&eacute; :</label>
                                            <input type="text" value="{{$incorporate->Nationalite}}" class="form-control" disabled>
                                        </div>
                                        <div class="name-wrapper col-md-6 form-inline">
                                            <label for="Fonction">Situation Matrimonial :</label>
                                            @if($incorporate->Situa_marital == 1)
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
                                                                    {{$incorporate->police->Numero_police}}

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
                                    <section class="content">
                                        <h1>Remplissez le formulaire suivant pour le convertir en Assur&eacute;</h1>
                                        <!--Form Advance-->

                                            <form id="form" method="POST" action="{{route('uptodate_incorporate_path')}}" class="col s12 m12 l12"  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                            <div class="row">


                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="Observation">Observation</label>
                                                        <textarea type="text" class="form-control" id="Observation" name="Observation" placeholder="Observation"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="Taux_couverture">Taux Couverture</label>
                                                        <input type="number" class="form-control" id="Taux_couverture" name="Taux_couverture" placeholder="Taux Couverture">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="Plafond">Plafond</label>
                                                        <input type="number" class="form-control" id="Plafond" placeholder="Plafond" name="Plafond">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" hidden >
                                                    <div class="form-group">
                                                        <label for="ID">ID</label>
                                                        <input type="number" class="form-control" value="{{$incorporate->ID}}" id="ID" placeholder="ID" name="ID">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="Encour_conso">En cours de consommation</label>
                                                        <input type="number" class="form-control" id="Encour_conso" placeholder="En cours de consommation" name="Encour_conso" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="Solde">solde</label>
                                                        <input type="number" class="form-control" id="Solde"  name="Solde">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <button type="submit" class="btn btn-success form-control ">Convertir en assur&eacute;</button>
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <a href="" class="btn btn-info">Modifier Toutes les information avant de convertir</a>
                                                </div>
                                            </div>
                                            </form>

                                    </section>
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