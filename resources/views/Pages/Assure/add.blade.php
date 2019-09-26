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
            <li class="active">Nouvel Assur&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
            <div class="row">
                <form id="form" method="POST" action="{{route('add_assure_path')}}" class="col s12 m12 l12"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-md-12">
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
                                                            message("<h4> la police pour cette surccusale n\'existe pas pour cette exercice ! </h4>", 'alert-danger pull-lg-right');
                                                        }
                                                    });
                                                }

                                            }
                                            ;
                                        </script>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="SuccursaleID">Souscripteur/Succursale</label>
                                                <select name="SuccursaleID" class=" selectpicker form-control" required
                                                        data-show-subtext="true" id="SuccursaleID" onchange="valSuccursale()" data-live-search="true">
                                                   <option value=" ">--selectionner succursale --</option>
                                                    @foreach($surccusales as $surccusale)
                                                        <option value="{{$surccusale->ID}}"
                                                                data-subtext="{{$surccusale->Raison_social}}">{{$surccusale->Nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="ExerciceID">Exercice</label>
                                                <select name="ExerciceID" id="ExerciceID" class="form-control" required>
                                                    <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Matricule">R&eacute;f&eacute;rence/Matricule</label>
                                                <input type="text" class="form-control" id="Matricule" name="Matricule"
                                                       placeholder="Reference/Matricule" >
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
                                                <label for="Nom">Nom complet</label>
                                                <input type="text" name="Nom" class="form-control" placeholder="Nom Complet"
                                                       id="Nom" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Situa_marital">Statut matrimoniale</label>
                                                <select class="form-control" name="Situa_marital" id="Situa_marital">
                                                    <option value="">-- selectionner un statut --</option>
                                                    <option value="1">Mari&eacute;</option>
                                                    <option value="2">C&eacute;libataire</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Datenaiss">Date Naissance</label>
                                                <input type="date" class="form-control"  id="Datenaiss" name="Datenaiss">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Lieu_naiss">Lieu Naissance</label>
                                                <input type="text" class="form-control"  id="Lieu_naiss" name="Lieu_naiss"
                                                       placeholder="Lieu de naissance">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Type_EmployeID">Type d'employ&eacute;</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="Type_EmployeID" name="Type_EmployeID">
                                                    <option value=" ">-- selectionner Type d&apos;employe --</option>
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
                                                <label for="PoliceID">Numero Police</label>
                                                <input type="text" id="PoliceID" class="form-control">
                                              <!--  <select name="PoliceID" class="selectpicker form-control"
                                                        data-show-subtext="true" data-live-search="true" id="PoliceID">
                                                    @foreach($polices as $police)
                                                        <option value="{{$police->ID}}"
                                                                data-subtext="{{$police->Description}}">{{$police->Numero_police}}</option>
                                                    @endforeach
                                                </select> -->
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
                                                <label for="Avatar">Photo</label>
                                                <input type="file" class="form-control" id="Avatar" name="Avatar">
                                            </div>
                                        </div>


                                        <div class="col-sm-offset-5 col-sm-2 text-center">
                                            <button type="submit" class="btn btn-success center-block">Soumettre</button>
                                        </div>
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
