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
            Liste sur la filiale {{$surccusale->Nom}} de {{$surccusale->souscripteur->nom}}
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tails Filiale</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Details sur le surccusale</h3> <br>
                        <a href="{{url('surccusale/list')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <div class=" col-md-6">
                                    <p > Raison Social : <strong>{{$surccusale->Raison_social}}</strong> </p>
                                </div>

                                <div class="col-md-6">
                                    <p >Nom : <strong>{{$surccusale->Nom}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>statut: <strong>{{$surccusale->Statut}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>Activit&eacute; : <strong>{{$surccusale->Activite}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Adresse : <strong>{{$surccusale->Adresse}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Telephone : <strong>{{$surccusale->Telephone}}</strong></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Nom Contact : <strong>{{$surccusale->Nom_contact}}</strong> </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p>Ville : <strong>{{$surccusale->Ville}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Pays : <strong>{{$surccusale->Pays}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Nombre Total Assur&eacute;s <strong>{{$surccusale->Nombre_total_assure}}</strong></p>
                                </div>
                                <div class="col-md-6" >
                                    <p >Nombre de d&apos;assur&eacute;s d&eacute;ja inscrits  : <strong>{{$countassure}}</strong></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>

    <div class="modal fade in" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" method="POST" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Suppression...</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous supprimer cet élément ? </p>
                        {{ csrf_field() }}
                        <input type="hidden" name="suppr">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">


    </script>
@endsection()