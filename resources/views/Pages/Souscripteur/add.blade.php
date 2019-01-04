@extends('Layouts.template2')
@section('css')


@endsection

@section('content')

        <section class="content-header">
            <h1>
                Ajout de Souscripteur/Souscripteur
                <!--small>Preview</small-->
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Nouveau Souscripteur</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!--Form Advance-->
            @if($exercice != null)
            <div class="row">
                <form id="form" method="POST" action="{{route('add_souscripteur_path')}}" class="col s12 m12 l12">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Formulaire d'ajout</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">

                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="raison_social">Code de la soci&eacute;t&eacute; : <span>*</span></label>
                                            <input id="raison_social" type="text" name="raison_social" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nom">Nom : <span>*</span></label>
                                            <input id="nom" type="text" name="nom" class="form-control" required>
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
                                            <input type="text" id="activite" name="activite" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="adresse">Adresse <span>*</span></label>
                                            <input type="text" id="adresse" name="adresse" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telephone">Telephone <span>*</span></label>
                                            <input type="number" id="telephone" name="telephone" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nom_contact">Nom Contact <span>*</span></label>
                                            <input type="text" id="nom_contact" name="nom_contact" class="form-control" required>
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
                                        <div class="form-group col-md-6" hidden>
                                            <label for="surccusale">Nombre total d&apos;assur&eacute;s<span>*</span></label>
                                            <input type="number" name="nombre_total_assure" id="nombre_total_assure" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-success form-control"  type="submit" name="action">Enregistrer</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </form>
            </div>
                @else
                <div class="row">
                    <h1>Aucun exercice n'est ouvert, Veuillez Demarrer un nouvel exercice</h1>
                </div>
            @endif
        </section>


@endsection

@section('js')

@endsection()