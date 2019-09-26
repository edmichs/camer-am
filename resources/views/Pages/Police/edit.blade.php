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
            <li class="active">Nouvel Police</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <form id="form" method="POST" action="{{route('update_police_path')}}" class="col s12 m12 l12">
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
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @php
                                        $succursale = $police->SuccursaleID;
                                        $compagnie = $police->EtablissementID;
                                    @endphp
                                    <div class="form-group col-md-6">
                                        <label for="SurccusaleID">Souscripteur/Surccusale</label>
                                        <select name="SuccursaleID" id="SuccursaleID" class="selectpicker form-control" data-live-search="true" data-show-subtext="true">
                                            @foreach($surccusales as $surccusale)
                                                <option {{ ($succursale == $surccusale->ID ? 'selected' : '') }} value="{{$surccusale->ID}}">{{$surccusale->Nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="EtablissementID">Code Compagnie Assurance</label>
                                        <select name="EtablissementID" id="EtablissementID" class="selectpicker form-control" data-live-search="true" data-show-subtext="true">
                                            @foreach($compagnies as $compagnie)
                                                <option {{ ($succursale == $surccusale->ID ? 'selected' : '') }}  value="{{$compagnie->ID}}">{{$compagnie->Nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Numero_police">Numero Police</label>
                                        <input name="Numero_police" value="{{$police->Numero_police}}" id="Numero_police" class="form-control" type="text" placeholder="Number Police">


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Date_souscription">Date  soucription</label>
                                        <input type="text" class="form-control"  value="{{date('d-m-Y',strtotime($police->Date_souscription))}}" name="Date_souscription" id="Date_souscription">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_emission">Date  &eacute;mission</label>
                                        <input type="text" class="form-control"  value="{{date('d-m-Y',strtotime($police->Date_emission))}}" name="Date_emission" id="Date_emission">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_effet">Date  effet</label>
                                        <input type="text" class="form-control" name="Date_effet"  value="{{date('d-m-Y',strtotime($police->Date_effet))}}" id="Date_effet">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_echeance">Date  &eacute;ch&eacute;ance</label>
                                        <input type="text" class="form-control" name="Date_echeance"  value="{{date('d-m-Y',strtotime($police->Date_echeance))}}" id="Date_echeance">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prime_total">Prime totale</label>
                                        <input type="number" class="form-control" name="Prime_total"  value="{{$police->Prime_total}}" id="Prime_total">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Accessoires">Frais Acc&eacute;ssoires</label>
                                        <input type="number" class="form-control" name="Accessoires"  value="{{$police->Accessoires}}" id="Accessoires">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prime_nette">Prime nette</label>
                                        <input type="number" class="form-control" name="Prime_nette"  value="{{$police->Prime_nette}}" id="Prime_nette">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Plafond_garanti">Plafond Garanti</label>
                                        <input type="number" class="form-control" name="Plafond_garanti"  value="{{$police->Plafond_garanti}}" id="Plafond_garanti">
                                    </div>
                                    <div class="form-group col-md-6" hidden>
                                        <label for="ID">Plafond Garanti</label>
                                        <input type="number" class="form-control" name="ID"  value="{{$police->ID}}" id="ID">
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