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
           Incorporation en cours
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
                        <form action="{{route('add_incorpore_path')}}" method="post" id="form" role="form"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                            <script type="text/javascript">

                                            function valSuccursale() {
                                                d = document.getElementById("SuccursaleID").value;
                                            //   alert(d);
                                                console.log(d);
                                                console.log(document.getElementById("ExerciceID").value);
                                                if (d == " ") {
                                                    alert("veuillez selectionner une succursale");
                                                } else {
                                                    var formObj = $("#form");
                                                    var formURL = formObj.attr("action");
                                                    var formData = new FormData($("#form")[0]);
                                                    formData.append('changedSuccursale', 'ok');

                                                    $.ajax({
                                                        url: formURL,
                                                        type: 'POST',
                                                        data: formData,
                                                        contentType: false,
                                                        processData: false,
                                                        success: function (data) {
                                                        //   alert(data);
                                                            console.log(data);
                                                            $("#PoliceID").val(data[0].Numero_police);

                                                        // console.log(data[0].Date_echeance);
                                                        //   message('<h4> Police ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                        },
                                                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                            console.log(JSON.stringify(jqXHR));
                                                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                            message("<h4>  la police pour cette surccusale n\'existe pas pour cette exercice ! </h4>", 'alert-danger pull-lg-right');
                                                        }
                                                    });
                                                }

                                            }
                                            ;
                                </script>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="SuccursaleID">Souscripteur/Surccusale</label>
                                        <select name="SuccursaleID" id="SuccursaleID" onchange="valSuccursale()" class="form-control">
                                            <option value=" ">--selectionner succursale --</option>
                                            @foreach($surccusales as $surccusale)
                                                <option value="{{$surccusale->ID}}">{{$surccusale->Nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ExerciceID">Exercice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Type_EmployeID">Code famille</label>
                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="Code_familleID" name="Code_familleID">
                                            <option value=" ">-- selectionner code famille --</option>
                                            @foreach($familles as $famille)
                                                <option data-subtext="{{$famille->Libelle}}" value="{{$famille->ID}}">{{$famille->Code}}</option>
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
                                        <label for="Nom">Nom Complet</label>
                                        <input type="text" name="Nom" id="Nom" class="form-control"
                                               placeholder="Entrer nom complet" id="">
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
                                            <option value=" ">--selectionner Type d&apos;employe--</option>
                                            @foreach($typeemployes as $type)
                                                <option value="{{$type->ID}}">{{$type->Libelle}}</option>
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
                                                <label for="Date_incorporation">Date Incorporation</label>
                                                <input type="date" class="form-control" id="Date_incorporation"
                                                       name="Date_incorporation">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Observation">Observation</label>
                                            <textarea type="text" class="form-control" id="Observation"
                                                      name="Observation" placeholder="Observation"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Taux_couverture">Taux Couverture</label>
                                                <input type="tel" class="form-control" id="Taux_couverture"
                                                       name="Taux_couverture"  placeholder="0">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Encour_conso">En cours de consommation</label>
                                                <input type="tel" class="form-control" id="Encour_conso"
                                                       placeholder="0" name="Encour_conso">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Solde">solde</label>
                                                <input type="tel" class="form-control" id="Solde" name="Solde" placeholder="0">
                                            </div>
                                        </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Avatar" class="Avatar">Photo</label>
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
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered  table-striped dataTable">
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
                                        <td>{{date("Y", strtotime($incorporate->exercice->Date_debut))}} </td>
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

                </div>
                <!-- /.box-body -->

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
                            <span aria-hidden="true">�</span></button>
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