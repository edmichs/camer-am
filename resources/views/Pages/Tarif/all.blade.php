@extends('Layouts.template2')
@section('css')
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des tarif</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3>Liste des bar&ecirc;mes</h3>
                        <a href="{{route('add_bareme_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouvelle compagnie</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
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
                                <th width="12%">Prestation</th>
                                <th>Type Employe</th>
                                <th>Base/Plafond</th>
                                <th>Taux Remboursement</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($baremes as $bareme)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $bareme->police()->exists() ? $bareme->police->Numero_police : '' }}</td>
                                    <td>{{ $bareme->prestation()->exists() ? $bareme->prestation->Description : ''}}</td>
                                    <td>{{ $bareme->type_employe()->exists() ? $bareme->type_employe->Libelle : '' }}</td>
                                    <td>{{ $bareme->Base_remboursement }}</td>
                                    <td>{{ $bareme->Taux_remboursement}}</td>
                                    <td >

                                        <a href="{{url("compagny/update/{$bareme->ID}")}}" class="btn btn-warning"
                                           title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a href="{{url("compagny/delete/{$bareme->ID}")}}" class="btn btn-danger"
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
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3>Liste des Prestations</h3>
                        <a href="{{route('add_bareme_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouvelle compagnie</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example3" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N°</th-->
                                <th>Categorie Prestation</th>
                                <th width="12%">Code prestation</th>
                                <th>Description</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prestations as $prestation)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $prestation->categorie_prestation()->exists() ? $prestation->categorie_prestation->Libelle : '' }}</td>
                                    <td>{{ $prestation->Code_prestation}}</td>
                                    <td>{{ $prestation->Description }}</td>
                                    <td >

                                        <a href="{{url("compagny/update/{$prestation->ID}")}}" class="btn btn-warning"
                                           title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a href="{{url("compagny/delete/{$prestation->ID}")}}" class="btn btn-danger"
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
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3>Liste des Categories</h3>
                        <a href="{{route('add_cate_presta_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouvelle compagnie</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N°</th-->

                                <th>Code Categoriee</th>
                                <th>Libelle</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                   <td>{{ $categorie->code }}</td>
                                    <td>{{ $categorie->Libelle}}</td>
                                    <td >

                                        <a href="{{url("compagny/update/{$categorie->ID}")}}" class="btn btn-warning"
                                           title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a href="{{url("compagny/delete/{$categorie->ID}")}}" class="btn btn-danger"
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