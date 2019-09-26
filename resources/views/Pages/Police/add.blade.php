@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ajout
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouvel Police</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('add_police_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="ExerciceID">Exercice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}} </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="SurccusaleID">Souscripteur/Surccusale</label>
                                        <select name="SuccursaleID" id="SuccursaleID" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                            @foreach($surccusales as $surccusale)
                                                <option value="{{$surccusale->ID}}">{{$surccusale->Nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="EtablissementID">Code Compagnie Assurance</label>
                                        <select name="EtablissementID" id="EtablissementID" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                            @foreach($compagnies as $compagnie)
                                            <option value="{{$compagnie->ID}}">{{$compagnie->Nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Numero_police">Numero Police</label>
                                        <input name="Numero_police" id="Numero_police" class="form-control" type="text" placeholder="Number Police">


                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Description">Libelle/Description</label>
                                        <input name="Description" id="Description" class="form-control" type="text" placeholder="Description">


                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Date_souscription">Date  soucription</label>
                                        <input type="date" class="form-control" name="Date_souscription" id="Date_souscription">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_emission">Date  &eacute;mission</label>
                                        <input type="date" class="form-control" name="Date_emission" id="Date_emission">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_effet">Date  effet</label>
                                        <input type="date" class="form-control" name="Date_effet" id="Date_effet">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_echeance">Date  &eacute;ch&eacute;ance</label>
                                        <input type="date" class="form-control" name="Date_echeance" id="Date_echeance">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prime_total">Prime totale</label>
                                        <input type="number" class="form-control" name="Prime_total" id="Prime_total">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Accessoires">Frais Acc&eacute;ssoires</label>
                                        <input type="number" class="form-control" name="Accessoires" id="Accessoires">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prime_nette">Prime nette</label>
                                        <input type="number" class="form-control" name="Prime_nette" id="Prime_nette">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Plafond_garanti">Plafond Garanti</label>
                                        <input type="number" class="form-control" name="Plafond_garanti" id="Plafond_garanti">
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
            @else
            <div class="row">
                <h1>Aucun exercice n'est ouvert, Veuillez Demarrer un nouvel exercice</h1>
            </div>
        @endif
    </section>
@endsection

@section('js')

@endsection()