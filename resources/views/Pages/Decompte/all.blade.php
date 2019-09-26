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
            Liste D&eacute;comptes
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste D&eacute;comptes</li>
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
                        <h3 class="box-title">Liste des D&eacute;comptes</h3><br>
                        <a href="{{route('add_decompte_path')}}" class="btn btn-info"><i class="fa fa-plus"></i> Nouveau D&eacute;compte</a>
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
                                <!--th>N�</th-->
                                <th>Numero D&eacute;compte</th>
                                <th>Nom Assur&eacute;</th>
                                <th >Matricule</th>
                                <th >Numero Police</th>
                                <th>Date  D&eacute;claration</th>
                                <th>Survenu le :</th>
                                <th>Numero Facture</th>
                                <th>Montant Facture (en XFA)</th>
                                <th>Nombre de pi&egrave;ces</th>
                                <th>Taux Remboursement (en %)</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($decomptes as $decompte)
                                <tr>
                                    <td>{{$decompte->exercice()->exists() ? $decompte->Numero_decompte      : ""}}</td>
                                    <td>{{$decompte->assure()->exists()   ? $decompte->assure->Nom           : ""}}</td>
                                    <td>{{$decompte->assure()->exists()   ? $decompte->assure->Matricule     : ""}}</td>
                                    <td>{{$decompte->police()->exists()   ? $decompte->police->Numero_police : ""}}</td>
                                    <td>{{ date("d-m-Y", strtotime($decompte->Date_declaration))}}</td>
                                    <td>{{ date("d-m-Y", strtotime($decompte->Date_surveillance))  }}</td>
                                    <td>{{ $decompte->Numero_facture }}</td>
                                    <td>{{ $decompte->Montant_facture }}</td>
                                    <td>{{ $decompte->Nombre_piece }}</td>
                                    <td>{{$decompte->assure()->exists()   ? $decompte->assure->Taux_couverture : ""}}</td>
                                    <td>
                                        <a href='{{url("decompte/show/{$decompte->ID}")}}' class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                                            <i class=" fa fa-eye ">

                                            </i></a>
                                        <!--     <a href='{{url("bpc/update/{$decompte->ID}")}}' class="btn btn-warning"
                                               title="Modifier">
                                                <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                                </i>
                                            </a>
                                            <a href='{{url("bpc/delete/{$decompte->ID}")}}' class="btn btn-danger"
                                               title="Supprimer">
                                                <i class=" fa fa-trash " >

                                                </i></a> -->

                                    </td>                                </tr>
                            @endforeach

                            </tbody>

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