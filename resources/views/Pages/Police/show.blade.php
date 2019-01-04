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
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tails Police</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Details sur la police</h3> <br>
                        <a href="{{url('police/list')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <div class=" col-md-6">
                                    <p > Exercice : <strong>{{date("d/M/Y", strtotime($police->exercice->Date_debut))}} - {{date("d/M/Y", strtotime($police->exercice->Date_fin))}}</strong> </p>
                                </div>

                                <div class="col-md-6">
                                    <p >Succursale : <strong>{{ $police->succursale->Nom}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                        <p>Compagnie d&apos;assurance: <strong>{{ $police->etablissement->Nom}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>Numero de police : <strong>{{ $police->Numero_police }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Date Souscription : <strong>{{ $police->Date_souscription}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Date &eacute;mission : <strong>{{ $police->Date_emission}}</strong></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Date Effet : <strong>{{ $police->Date_effet}}</strong> </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Date Ech&eacute;ance : <strong>{{ $police->Date_echeance}}</strong> </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Frais Acc&eacute;ssoires : <strong>{{ $police->Accessoires}} XFA</strong> </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Prime Total : <strong>{{ $police->Prime_total}} XFA</strong> </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Prime Nette : <strong>{{ $police->Prime_nette}} XFA</strong> </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Plafond Garanti : <strong>{{ $police->Plafond_garanti}} XFA</strong> </p>
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