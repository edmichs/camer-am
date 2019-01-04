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
            <form id="form" method="POST" action="{{route('add_surccusale_path')}}" class="col s12 m12 l12">
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
                                    <div class="form-group col-md-6" >
                                        <label>Soci&eacute;t&eacute; m&egrave;re <span>*</span></label>
                                        <select name="SouscripteurID"  class="form-control">
                                            @foreach($souscripteurs as $souscripteur)
                                                <option value="{{$souscripteur->ID}}">{{$souscripteur->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="code_societe">Code de la soci&eacute;t&eacute; : <span>*</span></label>
                                        <input id="Raison_social" type="text" name="Raison_social" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nom">Nom : <span>*</span></label>
                                        <input id="Nom" type="text" name="Nom" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Quelle est le type de compagnie (statut): <span>*</span></label>
                                        <select name="Statut" id="Statut" class="form-control" required>
                                            <option value="Societe">Soci&eacute;t&eacute;</option>
                                            <option value="Association">Association</option>
                                            <option value="Particulier">Particulier</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Activite">Activit&eacute;</label>
                                        <input type="text" id="Activite" name="Activite" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="adresse">Adresse <span>*</span></label>
                                        <input type="text" id="Adresse" name="Adresse" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Telephone">Telephone <span>*</span></label>
                                        <input type="number" id="Telephone" name="Telephone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nom_contact">Nom Contact <span>*</span></label>
                                        <input type="text" id="Nom_contact" name="Nom_contact" class="form-control" required>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Ville">Ville : <span>*</span></label>
                                        <input type="text" name="Ville" id="Ville" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Pays">Pays : <span>*</span></label>
                                        <input type="text" name="Pays" id="Pays" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nombre_total_assure">Nombre Total Assur&eacute; : <span>*</span></label>
                                        <input type="number" name="Nombre_total_assure" id="Nombre_total_assure" class="form-control" required>
                                    </div>

                                </div>
                               <div class="form-group col-md-4">
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