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
            Liste des Souscripteurs/Soci&eacute;t&eacute;s
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste Souscripteur</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Liste des souscripteur</h3><br>
                        <a href="{{route('add_souscripteur_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouveau Souscripteur</a>
                        <a href="{{route('souscripteur_list_stream_pdf')}}" class="btn btn-success"><i class="fa fa-plus"></i>Open pdf</a>
                        <a href="{{route('souscripteur_list_download_pdf')}}" class="btn btn-success"><i class="fa fa-plus"></i>Direct download pdf</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N�</th-->
                                <th>Nom</th>
                                <th width="12%">Code Soci&eacute;t&eacute;</th>
                                <th>Activit&eacute;</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($souscripteurs as $souscripteur)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $souscripteur->nom }}</td>
                                    <td>{{ $souscripteur->raison_social}}</td>
                                    <td>{{ $souscripteur->activite }}</td>
                                    <td>{{ $souscripteur->adresse }}</td>
                                    <td>{{ $souscripteur->telephone}}</td>
                                    <td>{{ $souscripteur->ville }}</td>
                                    <td>{{ $souscripteur->pays }}</td>
                                    <td >
                                            <a href='{{url("souscripteur/show/{$souscripteur->ID}")}}' class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                                                <i class=" fa fa-eye ">

                                                </i></a>
                                            <a href="{{url("souscripteur/new/{$souscripteur->ID}")}}" title="Nouvelle surccusale" class="btn btn-info"><i class="fa fa-plus " >

                                                </i></a>
                                        <a href='{{url("souscripteur/update/{$souscripteur->ID}")}}' class="btn btn-warning edit"
                                           id="editButton" title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a href="{{url("souscripteur/delete/{$souscripteur->ID}")}}" class="btn btn-danger"
                                            data-placement="bottom" title="Supprimer">
                                        <i class=" fa fa-trash " >

                                        </i></a>

                                    </td>
                                </tr>
                                <div class="modal fade in" id="deleteModal" style="display: none;">
                                    <div class="modal-dialog">
                                        <form id="form-suppr" method="POST" action="">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">x</span></button>
                                                    <h4 class="modal-title">Suppression...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Souhaitez-vous supprimer cet &eacute;l&eacute;ment ? </p>
                                                    {{ csrf_field() }}
                                                    <input type="text" name="" id="" value="{{$souscripteur->ID}}">
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

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <!--th>N�</th-->
                                <th>Nom</th>
                                <th>Code Soci&eacute;t&eacute;</th>
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
            </div>
        </div>
            @else
            <div class="row">
                <h1>Aucun exercice n'est ouvert, Veuillez Demarrer un nouvel exercice</h1>
            </div>
        @endif
    </section>



    <div class="modal fade in" id="addSurccusaleModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-modif" method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">�</span></button>
                        <h4 class="modal-title">Nouvelle Surccusale...</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                                <!-- /.box-header -->

                                    <div class="col-md-12">

                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label for="souscripteur">Souscripteur: <span>*</span></label>
                                                <input id="souscrpteur" type="text" name="souscrpteur"  class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="raison_social">Code de la soci&eacute;t&eacute; : <span>*</span></label>
                                                <input id="raison_social" type="text" name="raison_social"  class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="nom">Nom : <span>*</span></label>
                                                <input id="nom" type="text" name="nom"  class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Quelle est le type de compagnie (statut): <span>*</span></label>
                                                <select name="statut" id="statut" class="form-control" required>
                                                    <option value="Societe">Soci&eacute;t&eacute;</option>
                                                    <option value="Association">Association</option>
                                                    <option value="Particulier">Particulier</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="activite">Activit&eacute;</label>
                                                <input type="text" id="activite" name="activite"  class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="adresse">Adresse <span>*</span></label>
                                                <input type="text" id="adresse" name="adresse"  class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Telephone <span>*</span></label>
                                                <input type="number" id="telephone" name="telephone"  class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nom_contact">Nom Contact <span>*</span></label>
                                                <input type="text" id="nom_contact" name="nom_contact"  class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label for="ville">Ville : <span>*</span></label>
                                                <input type="text" name="ville" id="ville" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pays">Pays : <span>*</span></label>
                                                <input type="text" name="pays" id="pays" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
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
        $(document).on("click",".edit", function(){
           var id = $(this).data('id');

            $(".modal-body #idc").val(id);

        });

    </script>
@endsection()