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
            D&eacute;tails sur {{$souscripteur->nom}}
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tails {{$souscripteur->nom}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Details sur le souscripteur {{$souscripteur->nom}}</h3> <br>
                        <a href="{{url('souscripteur/list')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <div class=" col-md-6">
                                    <p > Raison Social : <strong>{{$souscripteur->raison_social}}</strong> </p>
                                </div>

                                <div class="col-md-6">
                                    <p >Nom : <strong>{{$souscripteur->nom}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>statut: <strong>{{$souscripteur->statut}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>Activit&eacute; : <strong>{{$souscripteur->activite}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Adresse : <strong>{{$souscripteur->adresse}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Telephone : <strong>{{$souscripteur->telephone}}</strong></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Nom Contact : <strong>{{$souscripteur->nom_contact}}</strong> </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p>Ville : <strong>{{$souscripteur->ville}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Pays : <strong>{{$souscripteur->pays}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Nombre Total d&apos;assur&eacute; <strong>{{$souscripteur->nombre_total_assure}}</strong></p>
                                </div>
                                <div class="col-md-6" >
                                    <p >Nombre de succursales : <strong>{{count($surccusales)}}</strong></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Liste des Succursales</h3><br>
                        <a href="{{route('add_surccusale_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouvelle Surccusale</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N�</th-->
                                <th>Nom</th>
                                <th width="12%">Raison Sociale</th>
                                <th>Activit&eacute;</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($surccusales as $surccusale)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $surccusale->Nom }}</td>
                                    <td>{{ $surccusale->Raison_social}}</td>
                                    <td>{{ $surccusale->Activite }}</td>
                                    <td>{{ $surccusale->Adresse }}</td>
                                    <td>{{ $surccusale->Telephone}}</td>
                                    <td>{{ $surccusale->Ville }}</td>
                                    <td>{{ $surccusale->Pays }}</td>
                                    <td >
                                        <a href="{{url("surccusale/show/{$surccusale->ID}")}}" class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                                            <i class=" fa fa-eye ">

                                            </i></a>
                                        <a href="{{url("surccusale/update/{$surccusale->ID}")}}" class="btn btn-warning"
                                           title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a href="{{url("surccusale/delete/{$surccusale->ID}")}}" class="btn btn-danger"
                                           title="Supprimer">
                                            <i class=" fa fa-trash " >

                                            </i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <!--th>N�</th-->
                                <th>Nom</th>
                                <th>Raison Sociale</th>
                                <th>Activit&eacute;</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th >Options</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <!-- /.box-body -->
                <a href="{{url('souscripteur/list')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>

            </div>

        </div>
    </section>

    <div class="modal fade in" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" method="POST" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">�</span></button>
                        <h4 class="modal-title">Suppression...</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous supprimer cet �l�ment ? </p>
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