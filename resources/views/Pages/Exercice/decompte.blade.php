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
        <h1>


        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des Decomptes de l'exercice {{date('Y', strtotime($exercice->Date_debut))}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Liste des  Decomptes de l'exercice {{date('Y', strtotime($exercice->Date_debut))}}</h3><br>
                        <a href="{{url("exercice/show/{$exercice->ID}")}}" class="btn btn-info"><i class="fa fa-angle-double-left"></i>Retour</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable">
                                <thead>
                                <tr>
                                    <th>Exercice</th>
                                    <th>Nom Assur&eacute;</th>
                                    <th >Matricule</th>
                                    <th >Numero Police</th>
                                    <th>Date de Naissance/th>
                                    <th>Lieu de naissance</th>
                                    <th>Date effet police</th>
                                    <th>Date Ech&eacute;ance police</th>
                                    <th>Formation sanitaire</th>
                                    <th>Plafond Remboursement</th>
                                    <th>Taux couverture</th>


                                </tr>
                                </thead>
                                <tbody>

                                @foreach($decomptes as $decompte)
                                    <tr>
                                        <td>{{$decompte->exercice->Date_debut}}</td>
                                        <td>$decompte->assure->Nom</td>
                                        <td>$decompte->assure->Matricule</td>
                                        <td>$decompte->police->Numero_police</td>
                                        <td>$decompte->assure->Datenaiss</td>
                                        <td>$decompte->assure->Lieu_naiss</td>
                                        <td>$decompte->police->Date_effet</td>
                                        <td>$decompte->police->Date_echeance</td>
                                        <td></td>
                                        <td>$decompte->assure->Plafond</td>
                                        <td>$decompte->assure->Taux_couverture</td>

                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>

                                    <!--th>N�</th-->
                                    <th>Exercice</th>
                                    <th>Nom Assur&eacute;</th>
                                    <th >Matricule</th>
                                    <th >Numero Police</th>
                                    <th>Date de Naissance/th>
                                    <th>Lieu de naissance</th>
                                    <th>Date effet police</th>
                                    <th>Date Ech&eacute;ance police</th>
                                    <th>Formation sanitaire</th>
                                    <th>Plafond Remboursement</th>
                                    <th>Taux couverture</th>
                                    <th width="12%">Options</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                      
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>


    <!-- /.modal-dialog -->
    </div>



@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection()