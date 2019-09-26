@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Nouveau Bonus/Malus
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouveau Bonus/Malus</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('store_bonus_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouveau Bonus/Malus</h3>
                        </div>
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

                                    <div class="form-group col-md-6">
                                        <label for="EtablissementID">Matricule</label>
                                        <select name="EtablissementID" id="EtablissementID" data-show-subtext="true" data-live-search="true" class=" selectpicker form-control">
                                            @foreach($assures as $assure)
                                                <option data-subtext="{{$assure->Nom}}" value="{{$assure->ID}}">{{$assure->Matricule}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="Date_evenement">Date Evenement</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_evenement">Montant Malus en XFA (A ne remplir uniquement s&apos;il s&apos;agit d&apos;un malus)</label>
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_evenement">Montant Bonus en XFA (A ne remplir uniquement s&apos;il s&apos;agit d&apos;un bonus)</label>
                                        <input type="number" class="form-control">
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