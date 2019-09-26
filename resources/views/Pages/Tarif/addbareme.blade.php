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
            <li class="active">Nouvelle compagnie</li>
        </ol>
        @if(session('message'))
            <div class="row">
                <div class="alert alert-warning">{{session('message')}}</div>
            </div>
        @endif
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

        <div class="row">
            <form id="form" method="POST" action="{{route('add_bareme_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <label >Numero Police: <span>*</span></label>
                                        <select id="PoliceID"  name="PoliceID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner une police --</option>
                                            @foreach($polices as $police)
                                                <option value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nom">Prestation: <span>*</span></label>
                                        <select id="PrestationID"  name="PrestationID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner une prestation --</option>
                                            @foreach($prestations as $prestation)
                                                <option value="{{$prestation->ID}}">{{$prestation->Description}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Categorie Employe: <span>*</span></label>
                                        <select id="Type_EmployeID"  name="Type_EmployeID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner type employ&eacute; --</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->ID}}">{{$type->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Zone Geo: <span>*</span></label>
                                        <select id="zonegeoID"  name="zonegeoID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner zone geographique --</option>
                                            @foreach($zones as $zone)
                                                <option value="{{$zone->ID}}">{{$zone->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Base_remboursement">Base/Plafond : <span>*</span></label>
                                        <input type="number" id="Base_remboursement" name="Base_remboursement" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Taux_rembrousement">Taux de Remboursement : <span>*</span></label>
                                        <input type="number" id="Taux_rembrousement" name="Taux_rembrousement" class="form-control" required>
                                    </div>

                                </div>
                                <div class="form-group col-md-4">
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