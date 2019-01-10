@extends('Layouts.template2')
@section('css')
    <style>

        <style type="text/css">
        #collection_police{
            display: none;
        }

        #collection_police .list div:hover{
            background-color: #e0e0e0;
            cursor: pointer;
        }

        #collection_nom{
            display: none;
        }

        #collection_nom .list div:hover{
            background-color: #e0e0e0;
            cursor: pointer;
        }

        #msg{
            color: white;
            position: fixed;;
            z-index: 9999;
            top: 5% !important;
            right: 1% !important;
        }

        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
            background-color: #00a65a !important;
            border-color: #00a65a !important;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Nouveau Bon de prise en charge

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouveau Bon de prise en charge</li>
        </ol> @if(session('message'))
            <div class="row">
                <div class="alert alert-warning">{{session('message')}}</div>
            </div>
         @endif
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('add_bpc_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success"
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <h3><u>POLICE</u></h3>
                                <div class="col-md-12">
                                            <script type="text/javascript">

                                            function val(){
                                                d = document.getElementById("PoliceID").value;
                                               // alert(d);
                                            if(d === " "){
                                            alert("veuillez selectionner un element");
                                            }else{
                                                 var formObj = $("#form");
                                                 var formURL = formObj.attr("action");
                                                 var formData = new FormData($("#form")[0]);
                                                 formData.append('changed', 'ok');

                                            $.ajax({
                                            url: formURL,
                                            type: 'POST',
                                            data:  formData,
                                            contentType: false,
                                            processData:false,
                                            success: function(data){
                                            // alert(data);
                                                console.log(data);
                                               $("#SuccursaleID").val(data[0].succursale.Nom);
                                                $("#Date_effet").val(data[0].Date_effet);
                                                $("#Date_echeance").val(data[0].Date_echeance);
                                                console.log(data[0].Date_echeance);
                                            message('<h4> Police ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                            /*console.log(JSON.stringify(jqXHR));
                                             console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
                                            message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                            }
                                            });


                                            /* var xhr = new XMLHttpRequest();
                                             xhr.onreadystatechange = function(){
                                               if(xhr.readyState === 4 && xhr.status === 200){
                                                   alert('status 200');
                                                   document.querySelector('#Libelle_prestation').innerHTML = "Thank"
                                               }
                                             };
                                             xhr.open("POST","/decompte/add",true);
                                             xhr.setRequestHeader('content-type','application/json');
                                             xhr.send(JSON.stringify({
                                                 value: d
                                             }));
                                             xhr.onload = function(){
                                                 console.log("hello");
                                                 console.log(xhr);

                                                 console.log(this.responseText);
                                                 var data = JSON.parse(this.responseText);
                                                 console.log(data);
                                             }*/
                                            }

                                            };
                                            </script>
                                    <div class="form-group col-md-6">
                                        <label for="PoliceID">Num&eacute;ro Police</label>
                                        <select class="selectpicker form-control" onchange="val()" name="PoliceID" id="PoliceID" data-show-subtext="true" data-live-search="true">
                                            <option value=" ">-- selectionner une police --</option>
                                            @foreach($polices as $police)
                                                @php
                                                    $succursale = $police->succursale;
                                                @endphp
                                            <option data-subtext="{{$succursale ? $succursale->Nom : ""}}" value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="SuccursaleID">Police Maladie pour :</label>
                                        <input name="SuccursaleID" class="form-control" id="SuccursaleID">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ExerciceID">Exercice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}</option>
                                        </select>
                                    </div>

                                        <div class="form-group col-md-3">
                                            <label for="Date_effet">Date Effet</label>
                                           <input type="text" name="Date_effet" id="Date_effet" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Date_echeance">Date Echeance</label>
                                            <input type="text" name="Date_echeance" id="Date_echeance" class="form-control">

                                        </div>



                                </div>
                                <div class="col-md-12">
                                    <h3><u>ASSURE</u></h3>
                                                       <script type="text/javascript">

                                                function change(){
                                                    d = document.getElementById("Nom").value;
                                               // alert(d);
                                                if(d === " "){
                                                alert("veuillez selectionner un element");
                                                }else{
                                                     var formObj = $("#form");
                                                     var formURL = formObj.attr("action");
                                                     var formData = new FormData($("#form")[0]);
                                                     formData.append('changeNom', 'ok');

                                                $.ajax({
                                                url: formURL,
                                                type: 'POST',
                                                data:  formData,
                                                contentType: false,
                                                processData:false,
                                                success: function(data){
                                              //  alert(data);

                                                    console.log(data);
                                                   $("#Matricule").val(data[0].Matricule);
                                                  $("#Datenaiss").val(data[0].Datenaiss);
                                                    $("#Lieu_naiss").val(data[0].Lieu_naiss);
                                                    $("#Plafond").val(data[0].Plafond);
                                                    $("#Taux_couverture").val(data[0].Taux_couverture);
                                                    $("#Encour").val(data[0].Encour_conso);

                                                message('<h4> Assur&eacute; ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                },
                                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                /*console.log(JSON.stringify(jqXHR));
                                                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
                                                message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                                }
                                                });


                                                /* var xhr = new XMLHttpRequest();
                                                 xhr.onreadystatechange = function(){
                                                   if(xhr.readyState === 4 && xhr.status === 200){
                                                       alert('status 200');
                                                       document.querySelector('#Libelle_prestation').innerHTML = "Thank"
                                                   }
                                                 };
                                                 xhr.open("POST","/decompte/add",true);
                                                 xhr.setRequestHeader('content-type','application/json');
                                                 xhr.send(JSON.stringify({
                                                     value: d
                                                 }));
                                                 xhr.onload = function(){
                                                     console.log("hello");
                                                     console.log(xhr);

                                                     console.log(this.responseText);
                                                     var data = JSON.parse(this.responseText);
                                                     console.log(data);
                                                 }*/
                                                }

                                                };
                                                </script>
                                    <div class="form-group col-md-6 ">
                                        <label for="Nom">Nom & Prenoms :</label>
                                        <select class="selectpicker form-control" onchange="change()" name="Nom" id="Nom" data-show-subtext="true" data-live-search="true">
                                        <option value=" ">-- selectionner un assur&eacute; --</option>
                                                 @foreach($assures as $assure)
                                            <option data-subtext="{{$assure->Nom}}" value="{{$assure->ID}}">{{$assure->Numero_police}}</option>
                                                                                                                                                                                                     @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="Matricule">Matricule/Reference</label>
                                        <input name="Matricule" id="Matricule" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Datenaiss">Date  de naissance :</label>
                                        <input type="text" class="form-control" name="Datenaiss" id="Datenaiss">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Lieu_naiss">Lieu de Naissance :</label>
                                        <input type="text" class="form-control" name="Lieu_naiss" id="Lieu_naiss">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="AffectionID">Affection (Maladie) :</label>
                                        <select class="selectpicker form-control"  name="AffectionID" id="AffectionID" data-show-subtext="true" data-live-search="true">
                                                       @foreach($affections as $affection)
                                            <option data-subtext="{{$affection->Code}}" value="{{$affection->ID}}">{{$affection->Description}}</option>
                                                                                                                                                                                                     @endforeach
                                                                                                                   <a href="{{route('add_bpc_path')}}" class="btn btn-info" type>Creer un nouveau</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </select>
                                    </div>
                                </div>
                                    <div class="form-group col-md-12">
                                        <div class="col-md-4">
                                            <label for="Couverture">Hauteur couverture</label>
                                            <input type="number" class="form-control" name="Taux_couverture" id="Taux_couverture">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Plafond">Plafond Remboursement</label>
                                            <input type="number" class="form-control" name="Plafond" id="Plafond">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Encour">Encours</label>
                                            <input type="number" class="form-control" name="Encour" id="Encour">
                                        </div>

                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Date_sinistre">Date Sinistre</label>
                                        <input type="date" class="form-control" name="Date_sinistre" id="Date_sinistre">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_declaration">Date d&eacute;claration</label>
                                        <input type="date" class="form-control" name="Date_declaration" id="Date_declaration">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ol>
                                    @foreach($prestations as $prestation)

                                            <li>
                                                {{$prestation->Libelle}}
                                                <label>
                                     <input type="radio" name="optradio[{{$prestation->ID}}]" class="flat-green" value="{{$prestation->ID}}" >
Oui
                                                    </label>
                                                      <label>
                                                      <input type="radio" name="optradio[{{$prestation->ID}}]" class="flat-green" value="0">
Non
                                                    </label>
                                                     <div class="form-inline">
                                                    <div class="form-group">
                                                           <table class="table table-bordered table-striped dataTable">
                                                                <thead>
                                                                 <tr>
                                                                 @foreach(\App\Models\Prestation::where('Categorie_PrestationID','=',$prestation->ID)->get() as $presta)



                                                                        <th>
                                                            {{$presta->Code_prestation}} = {{$presta->Plafond}}
                                                            <br>
                                                                        </th>

                                                                     @endforeach
                                                                     </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                           </table>


                                                     </div>
                                                      <div >



                                                    </div>
                                                                                                              </div>
                                            </li>

                                        @endforeach
                                    </ol>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <h3><u>BENEFICIARE (CENTRE DE SANTE)</u></h3>

                                        <label for="Centre_sante">Nom (lib&eacute;ll&eacute;) :</label>
                                                                                                                                                                                   <select class="selectpicker form-control"  name="Centre_santeID" id="Centre_santeID" data-show-subtext="true" data-live-search="true">
<option value=" ">-- selectionner un centre de sante --</option>
                                                       @foreach($centresantes as $centresante)
                                            <option data-subtext="{{$centresante->Email}}" value="{{$centresante->ID}}">{{$centresante->Nom}}</option>
                                                                                                                                                                                               @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h3><u>MEDECIN CONSEIL</u></h3>
                                                                    <script type="text/javascript">

                                            function changeMedecin(){
                                                d = document.getElementById("MedecinConseilID").value;
                                           // alert(d);
                                            if(d === " "){
                                            alert("veuillez selectionner un element");
                                            }else{
                                                 var formObj = $("#form");
                                                 var formURL = formObj.attr("action");
                                                 var formData = new FormData($("#form")[0]);
                                                 formData.append('changeMedecin', 'ok');

                                            $.ajax({
                                            url: formURL,
                                            type: 'POST',
                                            data:  formData,
                                            contentType: false,
                                            processData:false,
                                            success: function(data){
                                            //alert(data);

                                                console.log(data);
                                                $("#Tel_medecin").val(data[0].Telephone);
                                                $("#email_medecin").val(data[0].Email);

                                            message('<h4> Membre ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                            /*console.log(JSON.stringify(jqXHR));
                                             console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
                                            message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                            }
                                            });


                                            /* var xhr = new XMLHttpRequest();
                                             xhr.onreadystatechange = function(){
                                               if(xhr.readyState === 4 && xhr.status === 200){
                                                   alert('status 200');
                                                   document.querySelector('#Libelle_prestation').innerHTML = "Thank"
                                               }
                                             };
                                             xhr.open("POST","/decompte/add",true);
                                             xhr.setRequestHeader('content-type','application/json');
                                             xhr.send(JSON.stringify({
                                                 value: d
                                             }));
                                             xhr.onload = function(){
                                                 console.log("hello");
                                                 console.log(xhr);

                                                 console.log(this.responseText);
                                                 var data = JSON.parse(this.responseText);
                                                 console.log(data);
                                             }*/
                                            }

                                            };
                                            </script>
                                        Nom (lib&eacute;ll&eacute;) :
<select class="selectpicker form-control" onchange="changeMedecin()"  name="MedecinConseilID" id="MedecinConseilID" data-show-subtext="true" data-live-search="true">
<option value=" ">-- selectionner un centre de sante --</option>
                                                         @foreach($medecins as $medecin)
                                            <option data-subtext="{{$medecin->Email}}" value="{{$medecin->ID}}">{{$medecin->Noms}}</option>
                                                                                                                                                                                                        @endforeach
                                        </select>
                                        T&egrave;l :
                                        <input type="tel" name="Tel_medecin" id="Tel_medecin" class="form-control">
                                        Email :
                                        <input type="email" name="email_medecin" id="email_medecin" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4">
                                        <button class="btn btn-success form-control"  type="submit" name="action">Imprimer BPC vierge</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info form-control"  type="submit" name="action">Enregistrer sans Imprimer</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary form-control"  type="submit" name="action">Enregistrer et Imprimer</button>
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

@section('js')


@endsection()