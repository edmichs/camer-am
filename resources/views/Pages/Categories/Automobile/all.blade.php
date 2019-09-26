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
            Liste
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste Contrat d&apos;assurance automobile</li>
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
                            <a href="{{route('auto_add_path')}}" class="btn btn-info"><i class="fa fa-plus"></i> Nouveau Contrat d&apos;assurance automobile</a>
                            <a href="{{route('auto_print_path')}}"  target="_blank"  class="btn btn-success"><i class="fa fa-print"></i> Imprimer</a>

                            @if(session('message'))
                                <div class="row">
                                    <div class="alert alert-warning">{{session('message')}}</div>
                                </div>
                            @endif

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Nom Souscrpteur</th>
                                        <th>Nom Assur&eacute;</th>
                                        <th>Police</th>
                                        <th>Date Effet</th>
                                        <th>Date Ech&eacute;ance</th>
                                        <th>N&deg; immatriculation</th>
                                        <th>N&deg; serie</th>
                                        <th>Genre</th>
                                        <th>Energie</th>
                                        <th>Puissance</th>
                                        <th>Prime nette Total</th>
                                        <th>Garanti</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($autos as $auto)
                                        <tr>
                                            <td>{{$auto->souscripteur()->exists()? $auto->souscripteur->succursales->assure->Nom : ""}}</td>
                                            <td></td>
                                            <td>{{$auto->police()->exists()? $auto->police->Numero_police : ''}}</td>
                                            <td>{{$auto->police()->exists()? $auto->police->Date_effet : ''}}</td>
                                            <td>{{$auto->police()->exists()? $auto->police->Date_echeance : ''}}</td>
                                            <td>{{$auto->carte_grise()->exists() ? $auto->carte_grise->immatriculation : ''}}</td>
                                            <td>{{$auto->carte_grise()->exists() ? $auto->carte_grise->numero_serie : ''}}</td>
                                            <td>{{$auto->carte_grise()->exists() ? $auto->carte_grise->genre : ''}}</td>
                                            <td>{{$auto->carte_grise()->exists() ? $auto->carte_grise->energie : ''}}</td>
                                            <td></td>
                                            @php
                                                $garantis = \App\Models\GarantiAutomobile::whereAutomobileId($auto->id)->get();
                                            @endphp
                                            <td>@foreach($garantis as $garanti)
                                                    {{count($garanti->tarifs->prime_nette)}}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($garantis as $garanti)
                                                    <h5>{{$garanti->garanti->Description}}</h5>
                                                @endforeach
                                            </td>
                                            <td >
                                                <a href='{{url("assure/show/{$auto->id}")}}' class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                                                    <i class=" fa fa-eye ">

                                                    </i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Filiale</th>
                                        <th>Reference/Matricule</th>
                                        <th>Code famille</th>
                                        <th>Type d&apos;employ&eacute;</th>
                                        <th>Nom</th>
                                        <th>Nationalite</th>
                                        <th>Taux couverture</th>
                                        <th>Plafond</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

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

    <div class="modal fade in" id="deleteModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" method="POST" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">?</span></button>
                        <h4 class="modal-title">Suppression...</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous supprimer cet &eacute;l&eacute;ment ? </p>
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


    <div class="modal fade in" id="editModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-modif" method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">?</span></button>
                        <h4 class="modal-title">Modification...</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <!-- /.box-header -->

                            <div class="col-md-12">

                                <div class="col-md-12">
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
    <div class="modal fade in" id="addSurccusaleModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-modif" method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">?</span></button>
                        <h4 class="modal-title">Nouvelle Surccusale...</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <!-- /.box-header -->

                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="assure">Souscripteur: <span>*</span></label>
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
        $(document).on("click","#editButton", function(){
            var id = $(this).data('id');
            var raison = $(this).data('raison_social');
            var nom = $(this).data('nom');
            var activite = $(this).data('activite');
            var adresse = $(this).data('adresse');
            var telephone = $(this).data('telephone');
            var ville = $(this).data('ville');
            var pays = $(this).data('pays');
            var nom_contact = $(this).data('nom_contact');
            console.log(id);

            $(".modal-body #raison_social").val(raison);
            $(".modal-body #nom").val(nom);
            $(".modal-body #activite").val(activite);
            $(".modal-body #adresse").val(adresse);
            $(".modal-body #telephone").val(telephone);
            $(".modal-body #ville").val(ville);
            $(".modal-body #pays").val(pays);
            $(".modal-body #nom_contact").val(nom_contact);
        });

    </script>
@endsection()