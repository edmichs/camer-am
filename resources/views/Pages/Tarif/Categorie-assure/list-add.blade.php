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
            <li class="active">Nouvelle categorie assur&eacute;</li>
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
            <form id="form" method="POST" action="{{route('add_categorie_assure_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <label >Numero Police: <span>*</span></label>
                                        <select id="policeId"  name="policeId" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner une police --</option>
                                            @foreach($polices as $police)
                                                <option data-subtext="{{$police->succursale->Nom}}" value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Categorie Employe: <span>*</span></label>
                                        <select id="typeEmployeId"  name="typeEmployeId" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner type employ&eacute; --</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->ID}}">{{$type->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Plafond Assur&eacute; Garanti: <span>*</span></label>
                                        <input type="number" class="form-control" name="plafond" id="plafond">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="Taux_rembrousement">Montant Prime : <span>*</span></label>
                                        <input type="number" id="montant_prime" name="montant_prime" class="form-control" required>
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

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3>Liste des Categories Assur&eacute;s</h3>
                        @if(session('mess'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('mess')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N°</th-->
                                <th>Numero Police</th>
                                <th width="12%">Type Employ&eacute;</th>
                                <th>Plafond</th>
                                <th>Montant Prime</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorie_assures as $categorie_assure)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $categorie_assure->police()->exists() ? $categorie_assure->police->Numero_police : '' }}</td>
                                    <td>{{ $categorie_assure->type_employe()->exists() ? $categorie_assure->type_employe->Libelle : '' }}</td>
                                    <td>{{ $categorie_assure->plafond }}</td>
                                    <td>{{ $categorie_assure->montant_prime}}</td>
                                    <td >

                                        <a href="{{url("categorie-assure/update/{$categorie_assure->ID}")}}" class="btn btn-warning"
                                           title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >
                                            </i>
                                        </a>
                                        <a href="{{url("categorie-assure/delete/{$categorie_assure->ID}")}}" class="btn btn-danger"
                                           title="Supprimer">
                                            <i class=" fa fa-trash " >

                                            </i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </section>
@endsection

@section('js')

@endsection()