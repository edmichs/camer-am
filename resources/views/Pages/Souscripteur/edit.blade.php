@extends('Layouts.template2')
@section('css')


@endsection

@section('content')

        <section class="content-header">
            <h1>
                Modification
                <!--small>Preview</small-->
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">modifier Souscripteur</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!--Form Advance-->
            <div class="row">
                <form id="form" method="POST" action="{{route('souscripteur_update_path')}}" class="col s12 m12 l12">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="box box-success">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">

                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="raison_social">Code de la soci&eacute;t&eacute; : <span>*</span></label>
                                            <input id="raison_social" type="text" name="raison_social" class="form-control" value="{{$souscripteur->raison_social}}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nom">Nom : <span>*</span></label>
                                            <input id="nom" type="text" name="nom" class="form-control" value="{{$souscripteur->nom}}" required>
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
                                            <input type="text" value="{{$souscripteur->activite}}" id="activite" name="activite" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="adresse">Adresse <span>*</span></label>
                                            <input type="text" value="{{$souscripteur->adresse}}" id="adresse" name="adresse" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telephone">Telephone <span>*</span></label>
                                            <input type="number" value="{{$souscripteur->telephone}}" id="telephone" name="telephone" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nom_contact">Nom Contact <span>*</span></label>
                                            <input type="text" value="{{$souscripteur->nom_contact}}" id="nom_contact" name="nom_contact" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="ville">Ville : <span>*</span></label>
                                            <input type="text" value="{{$souscripteur->ville}}" name="ville" id="ville" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pays">Pays : <span>*</span></label>
                                            <input type="text" value="{{$souscripteur->pays}}" name="pays" id="pays" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6 " hidden>
                                            <label for="ID">ID : <span>*</span></label>
                                            <input type="text" value="{{$souscripteur->ID}}" name="ID" id="ID" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-success form-control"  type="submit" name="action">Soumettre</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </section>


@endsection

@section('js')

@endsection()