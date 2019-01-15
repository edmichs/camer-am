@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ajout d'Assur&eacute;
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouvel Assur&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('add_assure_path')}}" class="col s12 m12 l12"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="SuccursaleID">Souscripteur/Surccusale</label>
                        <select name="SuccursaleID"  class=" selectpicker form-control" data-show-subtext="true"  id="SuccursaleID" data-live-search="true">
                            <option value=" ">--select succursale --</option>
                            @foreach($surccusales as $surccusale)
                                <option value="{{$surccusale->ID}}"  data-subtext="{{$surccusale->Raison_social}}">{{$surccusale->Nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ExerciceID">Exrecice</label>
                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}</option>
                        </select>
                    </div>
                </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Code_familleID">Code Famille</label>
                                <select name="Code_familleID" class=" selectpicker form-control" data-show-subtext="true"  id="Code_familleID" data-live-search="true">
                                    @foreach($familles as $famille)
                                        <option data-subtext="{{$famille->Code}}" value="{{$famille->ID}}">{{$famille->Libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Matricule">R&eacute;f&eacute;rence/Matricule</label>
                                <input type="text" class="form-control" id="Matricule" name="Matricule" placeholder="Reference">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" name="Nom" class="form-control" placeholder="nom Complet" id="Nom" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Situa_marital">Statut matrimoniale</label>
                                <select class="form-control" name="Situa_marital" id="Situa_marital">
                                    <option value="1">Mari&eacute;</option>
                                    <option value="2">C&eacute;libataire</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Datenaiss">Date Naissance</label>
                                <input type="date" class="form-control" id="Datenaiss" name="Datenaiss">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Lieu_naiss">Lieu Naissance</label>
                                <input type="text" class="form-control" id="Lieu_naiss" name="Lieu_naiss" placeholder="Lieu de naissance">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Type_EmployeID">Type d'employ&eacute;</label>
                                <select class="form-control" id="Type_EmployeID" name="Type_EmployeID">
                                    <option value=" ">--selectioner Type d&apos;employe--</option>
                                    @foreach($typeemployes as $type)
                                    <option value="{{$type->ID}}">{{$type->Libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Fct_employe">Fonction de l'employ&eacute;</label>
                                <input type="text" class="form-control" id="Fct_employe" name="Fct_employe" placeholder="Fonction de l'employ&eacute;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Nationalite">Nationalit&eacute;</label>
                                <input type="text" class="form-control" id="Nationalite" name="Nationalite" placeholder="Nationalit&eacute;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Date_incorporation">Date Incorporation</label>
                                <input type="date" class="form-control" id="Date_incorporation" name="Date_incorporation" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Observation">Observation</label>
                                <textarea type="text" class="form-control" id="Observation" name="Observation" placeholder="Observation"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="PoliceID">Numero Police</label>
                                <select name="PoliceID" class="selectpicker form-control"  data-show-subtext="true" data-live-search="true" id="PoliceID">
                                    @foreach($polices as $police)
                                        <option value="{{$police->ID}}" data-subtext="{{$police->Description}}">{{$police->Numero_police}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Taux_couverture">Taux Couverture</label>
                                <input type="number" class="form-control" id="Taux_couverture" name="Taux_couverture" placeholder="Taux Couverture">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Montant_prime">Montant Prime</label>
                                <input type="number" class="form-control" id="Montant_prime" placeholder="Montant_prime" name="Montant_prime">
                            </div>
                        </div><div class="col-lg-6">
                            <div class="form-group">
                                <label for="Plafond">Plafond</label>
                                <input type="number" class="form-control" id="Plafond" placeholder="Plafond" name="Plafond">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Encour_conso">En cours de consommation</label>
                                <input type="number" class="form-control" id="Encour_conso" placeholder="En cours de consommation" name="Encour_conso" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Solde">solde</label>
                                <input type="number" class="form-control" id="Solde"  name="Solde">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Avatar">Photo</label>
                                <input type="file" class="form-control" id="Avatar"  name="Avatar">
                            </div>
                        </div>


                        <div class="col-sm-offset-5 col-sm-2 text-center">
                            <button type="submit" class="btn btn-success center-block">Submit</button>
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
