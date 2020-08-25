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
            <li class="active">Liste Assur&eacute;</li>
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
                        <a href="{{route('add_assure_path')}}" class="btn btn-info"><i class="fa fa-plus"></i> Nouvel Assur&eacute;</a>
                        <a href="{{route('print_assure_path_exercice')}}"  target="_blank"  class="btn btn-success"><i class="fa fa-print"></i> Imprimer</a>

                    @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="assure-table" class="table table-bordered table-striped dataTable">
                           <div style=" width:50%; margin-left: auto; margin-right: auto">
                               
                            <input type="text" name="search" id="search" class="form-control" placeholder="recherchez par nom, matricule, filiale, numero police...">
                           </div> 
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Filiale</th>
                                <th>Numero police</th>
                                <th>Reference/Matricule</th>
                                <th>Type d&apos;employ&eacute;</th>
                                <th>Taux couverture</th>
                                <th>Plafond</th>
                                <th>Montant Prime</th>
                                <th>En cours consommation</th>
                                <th>Solde</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assures as $assure)
                                @php
                                    $police = \App\Repositories\PoliceRepository::getBySuccursale($assure->succursale->ID,$assure->exercice->ID);
                                    $categorie_assure = \App\Models\CategorieAssure::wherePoliceid($police->ID)->whereTypeemployeid($assure->TypeEmployeId)->whereExerciceid($assure->ExerciceID)->first();

                                @endphp
                                <tr>
                                    <td>{{$assure->Nom}}</td>
                                    <td>{{$assure->succursale()->exists() ? $assure->succursale->Nom : ''}}</td>
                                    <td>{{$police->Numero_police}}</td>
                                    <td>{{$assure->Matricule}}-{{$assure->code_famille()->exists() ? $assure->code_famille->Code : ''}}</td>
                                    <td>{{$assure->type_employe()->exists() ? $assure->type_employe->Libelle : ''}}</td>
                                    <td>{{$assure->Taux_couverture}}</td>
                                    <td>{{$categorie_assure ? $categorie_assure->plafond : ''}}</td>
                                    <td>{{$categorie_assure ? $categorie_assure->montant_prime : '' }}</td>
                                    <td>{{$assure->Encour_conso}}</td>
                                    <td>{{$assure->Solde}}</td>
                                    <td >
                                        <a href='{{url("assure/show/{$assure->ID}")}}' class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                                            <i class=" fa fa-eye ">

                                            </i></a>

                                        <a class="btn btn-warning"
                                            href="{{url("assure/update/{$assure->ID}")}}"
                                           id="editButton"
                                           data-placement="bottom" title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a  class="btn btn-danger"
                                           href="{{url("assure/delete/{$assure->ID}")}}"
                                            data-placement="bottom" title="Supprimer">
                                            <i class=" fa fa-trash " >

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
                        <div class="text-right">
                            {{ $assures->links() }}
                        </div>
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
                            <span aria-hidden="true">�</span></button>
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
                            <span aria-hidden="true">�</span></button>
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
                            <span aria-hidden="true">�</span></button>
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