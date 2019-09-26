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
            <li class="active">Modification Assur&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <form id="form" method="POST" action="{{route('update_assure_path')}}" class="col s12 m12 l12"  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Code_familleID">Code Famille</label>
                        <select name="Code_familleID" id="Code_familleID" class="form-control">
                            @foreach($familles as $famille)
                                <option value="{{$famille->ID}}">{{$famille->Code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Matricule">R&eacute;f&eacute;rence/Matricule</label>
                        <input type="text" class="form-control" id="Matricule" value="{{$assure->Matricule}}" name="Matricule" placeholder="Reference">
                    </div>
                </div>
                <div class="col-lg-6" hidden>
                    <div class="form-group">
                        <label for="ID">ID</label>
                        <input type="text" class="form-control" id="ID" value="{{$assure->ID}}" name="ID" placeholder="Reference">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" name="Nom" class="form-control" value="{{$assure->Nom}}" placeholder="nom Complet" id="Nom" >
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
                        <input type="text" value="{{$assure->Datenaiss}}" class="form-control" id="Datenaiss" name="Datenaiss">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Lieu_naiss">Lieu Naissance</label>
                        <input type="text" class="form-control" value="{{$assure->Lieu_naiss}}" id="Lieu_naiss" name="Lieu_naiss" placeholder="Lieu de naissance">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Type_EmployeID">Type d'employ&eacute;</label>
                        <select class="form-control" id="Type_EmployeID" name="Type_EmployeID">
                            @foreach($typeemployes as $type)
                                <option value="{{$type->ID}}">{{$type->Libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Fct_employe">Fonction de l'employ&eacute;</label>
                        <input type="text" class="form-control" id="Fct_employe" value="{{$assure->Fct_employe}}" name="Fct_employe" placeholder="Fonction de l'employ&eacute;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nationalite">Nationalit&eacute;</label>
                        <input type="text" class="form-control" id="Nationalite" value="{{$assure->Nationalite}}" name="Nationalite" placeholder="Nationalit&eacute;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Observation">Observation</label>
                        <textarea type="text" class="form-control" id="Observation" value="{{$assure->Observation}}" name="Observation" placeholder="Observation"></textarea>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Taux_couverture">Taux Couverture</label>
                        <input type="number" class="form-control" id="Taux_couverture" value="{{$assure->Taux_couverture}}" name="Taux_couverture" placeholder="Taux Couverture">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Encour_conso">En cours de consommation</label>
                        <input type="number" class="form-control" id="Encour_conso" value="{{$assure->Encour_conso}}" placeholder="En cours de consommation" name="Encour_conso" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Solde">solde</label>
                        <input type="number" class="form-control" id="Solde" value="{{$assure->Solde}}"  name="Solde">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Avatar">Photo</label>
                        <img src="/img/{{$assure->Avatar}}" alt="{{$assure->Avatar}}">
                        <input type="file" class="form-control" id="Avatar"   name="Avatar">
                    </div>
                </div>


                <div class="col-sm-offset-5 col-sm-2 text-center">
                    <button type="submit" class="btn btn-success center-block">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
