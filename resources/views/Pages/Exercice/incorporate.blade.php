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
            <li class="active">Liste des incorpor&eacute;s de l'exercice {{date('Y', strtotime($exercice->Date_debut))}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Liste des  incorpor&eacute;s de l'exercice {{date('Y', strtotime($exercice->Date_debut))}}</h3><br>
                        <a href="{{url("exercice/show/{$exercice->ID}")}}" class="btn btn-info"><i class="fa fa-angle-double-left"></i>Retour</a>
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
                                <th>Filiale</th>
                                <th>Exercice</th>
                                <th>Reference/Matricule</th>
                                <th>Code famille</th>
                                <th>type</th>
                                <th>Nom</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Nationalite</th>
                                <th>Situation maritale</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($incorporates as $incorporate)
                                <tr class="button">
                                    <td>{{$incorporate->succursale->Nom}}</td>
                                    <td>{{date("Y", strtotime($incorporate->exercice->Date_debut))}}</td>
                                    <td>{{$incorporate->Matricule}}</td>
                                    <td>{{$incorporate->code_famille->Code}}</td>
                                    <td>{{$incorporate->type_employe->Libelle}}</td>
                                    <td>{{$incorporate->Nom}}</td>

                                    <td>{{$incorporate->Datenaiss}}</td>
                                    <td>{{$incorporate->Lieu_naiss}}</td>
                                    <td>{{$incorporate->Nationalite}}</td>
                                    @if($incorporate->Situa_marital == 1)
                                        <td>Mari&eacute;</td>
                                    @else
                                        <td>C&eacute;libataire</td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Filiale</th>
                                <th>Exercice</th>
                                <th>Reference/Matricule</th>
                                <th>Code famille</th>
                                <th>type</th>
                                <th>Nom</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Nationalite</th>
                                <th>Situation maritale</th>
                            </tr>
                            </tfoot>
                        </table>
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