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
           Inorporation en cours
                    <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Incorporation</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{route('add_incorpore_path')}}" method="post" role="form"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="SuccursaleID">Souscripteur/Surccusale</label>
                                        <select name="SuccursaleID" id="SuccursaleID" class="form-control">
                                            <option value=" ">--select succursale --</option>
                                            @foreach($surccusales as $surccusale)
                                                <option value="{{$surccusale->ID}}">{{$surccusale->Nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ExerciceID">Exrecice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("d/M/Y", strtotime($exercice->Date_debut))}} - {{date("d/M/Y", strtotime($exercice->Date_fin))}}</option>
                                        </select>
                                    </div>
                                </div>
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
                                        <input type="text" class="form-control" id="Matricule" name="Matricule"
                                               placeholder="Reference/Matricule">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Nom">Nom</label>
                                        <input type="text" name="Nom" id="Nom" class="form-control"
                                               placeholder="Enter Complete name" id="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Situa_marital">Statut matrimoniale</label>
                                        <select class="form-control" id="Situa" name="Situa_marital" >
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
                                        <input type="text" class="form-control" id="Lieu" name="Lieu_naiss"
                                               placeholder="Lieu de naissance">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Type d'employ&eacute;</label>
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
                                        <label for="PoliceID">Numero Police</label>
                                        <select name="PoliceID" class="form-control" id="PoliceID">
                                            @foreach($polices as $police)
                                                <option value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Fct_employe">Fonction de l'employ&eacute;</label>
                                        <input type="text" class="form-control" id="Fct_employe" name="Fct_employe"
                                               placeholder="Fonction de l'employ&eacute;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Nationalite">Nationalit&eacute;</label>
                                        <input type="text" class="form-control" id="Nationalite" name="Nationalite"
                                               placeholder="Nationalit&eacute;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Avatar" class="Avatar">Avatar</label>
                                        <input type="file" class="form-control avatar" id="Avatar" name="Avatar">
                                    </div>
                                </div>


                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>


            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Liste des Incorpor&eacute;s en cours</h3><br>
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

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($incorporates as $incorporate)
                                    <tr class="button">
                                        <td>{{$incorporate->succursale->Nom}}</td>
                                        <td>{{date("d/M/Y", strtotime($incorporate->exercice->Date_debut))}} - {{date("d/M/Y", strtotime($incorporate->exercice->Date_fin))}}</td>
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
                                        <td>
                                            <a href='{{url("incorporate/show/{$incorporate->ID}")}}' class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                                                <i class=" fa fa-eye ">

                                                </i></a>

                                            <a class="btn btn-warning"
                                               href="{{url("incorporate/edit/{$incorporate->ID}")}}"
                                               id="editButton"
                                               data-placement="bottom" title="Ajouter en tant que assur&eacute;">
                                                <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                                </i>
                                            </a>
                                            <a  class="btn btn-danger"
                                                href="{{url("incorporate/delete/{$incorporate->ID}")}}"
                                                data-placement="bottom" title="Supprimer">
                                                <i class=" fa fa-trash " >

                                                </i></a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                                </tbody>

                            </table>

                    </div>

                </div>
                <!-- /.box-body -->
                <a href="{{url('souscripteur/list')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>

            </div>

        </div>
            @else
                <div class="row">
                     <h1>Aucun exercice n'est ouvert, Veuillez Demarrer un nouvel exercice</h1>
                </div>
            @endif
    </section>

    <div class="modal fade in" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" method="POST" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Suppression...</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous supprimer cet &eacute;l&eacute;ment ? </p>
                        {{ csrf_field() }}
                        <input type="hidden" name="suppr">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">


    </script>
@endsection()