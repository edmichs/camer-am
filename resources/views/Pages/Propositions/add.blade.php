@extends('Layouts.template2')
@section('css')
    <style>
        hr {
            border: 1px solid black;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            contrat Automobile
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Contrat Automobile</li>
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
        @if($exercice != null)
            <div class="row">
                <form id="form" method="POST" action="{{route('auto_add_path')}}" class="col s12 m12 l12">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="box ">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <h3>References du client</h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-6">
                                                                    <label for="Titre">Titre : </label>
                                                                    <select name="titre" id="titre">
                                                                        <option value=""></option>
                                                                        <option value="1">Monsieur</option>
                                                                        <option value="2">Madame</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Matricule">Reference/Matricule
                                                                        <span>*</span> :</label>
                                                                    <input type="text" class="form-control"
                                                                           name="Matricule" id="Matricule"
                                                                           placeholder="Reference">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Nom">Nom Complet <span>*</span>
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="nom complet" onkeyup="autocompleteNom();" name="Nom"
                                                                           id="Nom">
                                                                </div>
                                                                <script>
                                                                    function autocompleteNom(){
                                                                        // console.log(document.getElementById("Nom").value);
                                                                        $("#assure").val(document.getElementById("Nom").value);
                                                                    }
                                                                </script>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Telephone">T&eacute;l&eacute;phone
                                                                        <span>*</span> :</label>
                                                                    <input type="tel" class="form-control"
                                                                           placeholder="telephone" name="Telephone"
                                                                           id="Telephone">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Email">Email</label>
                                                                    <input type="email" class="form-control"
                                                                           placeholder="email" name="Email" id="Email">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="numero_permis">N° Permis Conduire <span>*</span>
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : W14*****" name="numero_permis"
                                                                           id="numero_permis">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="numero_passport">N° PassPort</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : 11*********"
                                                                           name="numero_passport" id="numero_passport">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Profession">Prof&eacute;ssion*
                                                                        : </label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Profession" name="Profession"
                                                                           id="Profession">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Matricule">B.P : </label>
                                                                    <input type="text" class="form-control" id="bp"
                                                                           name="bp"
                                                                           placeholder="ex : Rue 4534 Quartier fouda">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Matricule">Fax : </label>
                                                                    <input type="text" class="form-control" id="fax"
                                                                           name="fax"
                                                                           placeholder="">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="Situa_marital">Statut
                                                                        matrimoniale</label>
                                                                    <select class="form-control" name="Situa_marital"
                                                                            id="Situa_marital">
                                                                        <option value="">-- selectionner un statut --
                                                                        </option>
                                                                        <option value="1">Mari&eacute;</option>
                                                                        <option value="2">C&eacute;libataire</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Datenaiss">Date Naissance</label>
                                                                    <input type="date" class="form-control"
                                                                           id="Datenaiss" name="Datenaiss">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Ville">Ville* :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ville" id="Ville" name="Ville">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Pays">Pays</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="pays" id="Pays" name="Pays">
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <h3>Police</h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="ExerciceID">Quittance N°</label>
                                                                        <input type="text" class="form-control"
                                                                               name="Numero_police" id="Numero_police"
                                                                               placeholder="Numero de police">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Date_emission">Date &eacute;mission</label>
                                                                    <input type="date" class="form-control"
                                                                           name="Date_emission" id="Date_emission">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Assure">Assur&eacute;(e)</label>
                                                                    <input type="text" class="form-control"
                                                                           name="assure" id="assure">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Date_emission">Date Souscription</label>
                                                                    <input type="date" class="form-control"
                                                                           name="Date_souscription" id="Date_souscription">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-6">
                                                                    <label for="Nom">Mouvement :</label>
                                                                    <select class="form-control" name="Mouvement"
                                                                            id="Mouvement">
                                                                        <option value="1">Nouvelle</option>
                                                                        <option value="2">Renouvellement</option>
                                                                        <option value="3">Suspension</option>
                                                                        <option value="4">Resilliation</option>
                                                                        <option value="5">Remise en Vigueur</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Nom">Avenant N° : </label>
                                                                    <input type="text" class="form-control"
                                                                           name="avenant" id="avenant">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="categorie">Categorie</label>
                                                                    <select class="selectpicker  form-control"
                                                                            data-show-subtext="true" onchange="handleCheckDefault()"
                                                                            data-live-search="true" name="categorie"
                                                                            id="categorie">
                                                                        @foreach ($categorie_tarifs as $cat)
                                                                            <option value="{{$cat->numero}}"
                                                                                    data-subtext="{{$cat->description}}">{{$cat->numero}}</option>
                                                                        @endforeach


                                                                    </select>
                                                                </div>
                                                                <div class=" form-group col-md-6">
                                                                    <label for="Nom">Dur&eacute;e</label>
                                                                    <select class="form-control" onchange="handleCheckDefault()" name="duree"
                                                                            id="duree">
                                                                        <option value="60">60 Jours</option>
                                                                        <option value="120">120 Jours</option>
                                                                        <option value="180">180 jours</option>
                                                                        <option value="365">1 an</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Date_effet">Date effet</label>
                                                                    <input type="date" class="form-control"
                                                                           name="Date_effet" id="Date_effet" onchange="caculEcheance();">
                                                                </div>
                                                                <script>
                                                                    function caculEcheance(){
                                                                        var options = { year: 'numeric', month: 'numeric',day: 'numeric'};
                                                                        var duree = document.getElementById("duree").value;
                                                                        var effet =  document.getElementById("Date_effet").value;
                                                                        var date_effet = new Date(effet.toLocaleString());
                                                                        // console.log(date_effet);
                                                                        date_effet.setDate(date_effet.getDate() + parseInt(duree));
                                                                        // console.log(date_effet.toLocaleDateString("en-US",options));
                                                                        $("#Date_echeance").val(date_effet.toLocaleDateString("fr-FR",options));

                                                                    }
                                                                </script>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Date_echeance">Date &eacute;ch&eacute;ance</label>
                                                                    <input type="text" class="form-control"
                                                                           name="Date_echeance" id="Date_echeance">
                                                                </div>
                                                            </div>
                                                            <script>



                                                                function handleCheckDefault(){
                                                                    // $("#id").val(id);
                                                                    // alert(id);
                                                                    // console.log(id);
                                                                    var duree = document.getElementById("duree").value;

                                                                    if(document.getElementById("Date_effet").value != ""){
                                                                        var options = { year: 'numeric', month: 'numeric',day: 'numeric'};
                                                                        var effet =  document.getElementById("Date_effet").value;
                                                                        var date_effet = new Date(effet.toLocaleString());
                                                                        //      console.log(date_effet);
                                                                        date_effet.setDate(date_effet.getDate() + parseInt(duree));
                                                                        //     console.log(date_effet.toLocaleDateString("fr-FR",options));
                                                                        $("#Date_echeance").val(date_effet.toLocaleDateString("fr-FR",options));

                                                                    }
                                                                    var totale = document.getElementById("totaux").value;
                                                                    var puissance = document.getElementById("puissance").value;
                                                                    var categorie = document.getElementById("categorie").value;
                                                                    //console.log(duree);
                                                                    //  console.log(puissance);
                                                                    // console.log(categorie);
                                                                    //console.log("totale "+totale);
                                                                    $("#cat").val(categorie);

                                                                    if(duree != "" || puissance != "" || categorie != ""){
                                                                        let formObj = $("#form");
                                                                        let formURL = formObj.attr("action");
                                                                        let formData = new FormData($("#form")[0]);
                                                                        formData.append('change', 'ok');

                                                                        $.ajax({
                                                                            url: formURL,
                                                                            type: 'POST',
                                                                            data: formData,
                                                                            contentType: false,
                                                                            processData: false,
                                                                            success: function (data) {
                                                                                // alert(data);

                                                                                //   console.log(data);
                                                                                if(data != null || data != undefined){
                                                                                    //     console.log("test id "+data[0].garanti.ID);
                                                                                    document.getElementById("."+data[0].garanti_id+".").removeAttribute("hidden");
                                                                                    $("#nette"+data[0].garanti_id).val(data[0].prime_nette);
                                                                                    $("#totale"+data[0].garanti_id).val(data[0].pttc);
                                                                                    $("#totaux").val(parseInt( data[0].pttc));

                                                                                    // $("."+data[0].garanti_id).removeAttr('hidden');
                                                                                }
                                                                                //  $("#Matricule").val(data[0].Matricule);
                                                                                // $("#Datenaiss").val(data[0].Datenaiss);
                                                                                // $("#Lieu_naiss").val(data[0].Lieu_naiss);


                                                                                //message('<h4> Assur&eacute; ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                                            },
                                                                            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                                                //    console.log(JSON.stringify(jqXHR));
                                                                                //  console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                                                // message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                                                            }
                                                                        });
                                                                    }

                                                                }
                                                            </script>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <hr>
                                        <h4 class="text-center">Identification du V&eacute;hicule</h4>
                                        <hr>

                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">Nom Du proprietaire : </label>
                                            <input type="text" class="form-control" name="nom"
                                                   placeholder="nom du proprio" id="nom">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">N° Immatriculation : </label>
                                            <input type="text" class="form-control" name="immatriculation"
                                                   placeholder="ex: CE 186 HI" id="immatriculation">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">Date expiration : </label>
                                            <input type="date" class="form-control" name="date_delivre"
                                                   id="date_delivre">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">Date 1ere mise en circulation : </label>
                                            <input type="date" class="form-control" name="date_first_circulation"
                                                   id="date_circulation">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">Marque : </label>
                                            <input type="text" class="form-control" name="marque" id="marque"
                                                   placeholder=" ex: Mercedes Benz">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="genre">Genre : </label>
                                            <input type="text" class="form-control" name="genre" id="genre"
                                                   placeholder="ex : VP">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Carrosserie">Carrosserie : </label>
                                            <input type="text" class="form-control" name="carrosserie" id="carrosserie"
                                                   placeholder="ex: CI">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Carrosserie">Energie : </label>
                                            <select name="energie" id="energie" onchange="handleCheckDefault();" class="form-control">
                                                <option value="essence">Essence</option>
                                                <option value="diesel">Diesel</option>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">Puissance (en CV): </label>
                                            <input type="number" class="form-control" onkeyup="handleCheckDefault('puissance')" name="puissance" id="puissance"
                                                   placeholder=" ex: 8">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="genre">Puissance R&eacute;elle (en cm3): </label>
                                            <input type="number" class="form-control" name="puissance_reelle"
                                                   id="puissance_reelle" placeholder="ex : 0">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Carrosserie">PTAC (en Kg): </label>
                                            <input type="number" class="form-control" name="ptac"
                                                   id="ptac" placeholder="ex: 0">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="nbre_place">Nombre de place : </label>
                                            <input type="number" class="form-control" name="nbre_places" id="nbre_places"
                                                   placeholder="ex: 5">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="nbre_place">Charge Utile : </label>
                                            <input type="number" class="form-control" name="charge_utile"
                                                   id="charge_utile" placeholder="ex: 0">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">Type : </label>
                                            <input type="text" class="form-control" name="type" id="type"
                                                   placeholder="ex : BJ14L3">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">N° de serie : </label>
                                            <input type="text" class="form-control" name="numero_serie"
                                                   id="numero_serie">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">Valeur a neuf (en XFA): </label>
                                            <input type="number" class="form-control" name="valeur_neuf"
                                                   id="valeur_neuf" placeholder="ex : 15 000 000">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">Valeur venale (en XFA): </label>
                                            <input type="number" class="form-control" name="valeur_neuf"
                                                   id="valeur_neuf" placeholder="ex : 7 000 000">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">Poids Vide (en Kg): </label>
                                            <input type="number" class="form-control" name="poid_vide" id="poid_vide"
                                                   placeholder="ex : 1350">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">Garage Habituel : </label>
                                            <input type="text" class="form-control" name="garage_habituel" id="garage_habituel"
                                                   placeholder="ex : Les Garagistes">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="type">N° Chassis : </label>
                                            <input type="text" class="form-control" name="chassis" id="chassis"
                                                   placeholder="ex : SB15************">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="zone">Zone: </label>
                                            <select name="zone" id="zone" class="selectpicker form-control">
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                            </select>
                                        </div>


                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-inline col-md-3">
                                                <label for="tarif">Tarif : </label>
                                                <select name="tarif" id="tarif" class="form-control">
                                                    <option value="1">Normal</option>
                                                </select>
                                            </div>
                                            <div class="form-inline col-md-4">
                                                <label for="tarif">Categorie : </label>
                                                <input type="text" name="cat" id="cat" class="form-control">
                                            </div>
                                            <div class="form-inline col-md-5">
                                                <label for="tarif">Conducteur Habituelle :</label>
                                                <input type="text" name="conducteur_habituel" id="conducteur_habituel" class="form-control">
                                                <br>
                                                <br>
                                            </div>

                                            <h4><u>Garanti</u></h4>
                                            <script>


                                                function handleChange(checkbox, id) {
                                                    $("#id").val(id);
                                                    let totale = document.getElementById("totaux").value;

                                                    // alert(id);
                                                    let formObj = $("#form");
                                                    let formURL = formObj.attr("action");
                                                    let formData = new FormData($("#form")[0]);
                                                    formData.append('changeCheckbox', 'ok');

                                                    $.ajax({
                                                        url: formURL,
                                                        type: 'POST',
                                                        data: formData,
                                                        contentType: false,
                                                        processData: false,
                                                        success: function (data) {
                                                            // alert(data);
                                                            //  console.log(data);

                                                            if(document.getElementById("checkbox"+id).checked === false){
                                                                document.getElementById("."+id+".").style.visibility="hidden";
                                                                $("#totaux").val(parseInt(totale) - parseInt( data[0].pttc));

                                                            }else{
                                                                document.getElementById("."+id+".").removeAttribute("hidden");
                                                                document.getElementById("."+id+".").style.visibility="visible";
                                                                $("#totaux").val(parseInt(totale) + parseInt( data[0].pttc));

                                                            }




                                                            $("#nette"+data[0].garanti_id).val(data[0].prime_nette);
                                                            $("#totale"+data[0].garanti_id).val(data[0].pttc);

                                                            //  console.log(data);
                                                            //   $("#Matricule").val(data[0].Matricule);
                                                            // $("#Datenaiss").val(data[0].Datenaiss);
                                                            // $("#Lieu_naiss").val(data[0].Lieu_naiss);


                                                            //message('<h4> Assur&eacute; ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                        },
                                                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                            // document.getElementById("."+id+".").style.visibility="hidden";

                                                            // console.log(JSON.stringify(jqXHR));
                                                            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                            // message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                                        }
                                                    });


                                                }
                                            </script>
                                            <div class="col-md-12">

                                                <table class="table table-striped">


                                                    <tbody>
                                                    @foreach ($categorie_garanties as $categori_garanti)
                                                        <tr>
                                                            <td>{{$categori_garanti->libelle}}</td>
                                                            <td>
                                                                <table class="table table-striped">

                                                                    @foreach (\App\Models\Garanti::where('categorie_garanti_id','=',$categori_garanti->id)->get() as $garanti)

                                                                        <tr>
                                                                            <td>{{$garanti->Description}}</td>
                                                                            <td>
                                                                                <table class="table table-striped">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <input type="checkbox"
                                                                                                   onchange="handleChange(this,'{{$garanti->ID}}');"
                                                                                                   name="checkbox[{{$garanti->ID}}]"
                                                                                                   @if ($garanti->isDefaultChecked)
                                                                                                   checked disabled
                                                                                                   @endif
                                                                                                   id="checkbox{{$garanti->ID}}"
                                                                                                   value="{{$garanti->ID}}">
                                                                                        </td>

                                                                                        <td>
                                                                                            <div class="form-group" id=".{{$garanti->ID}}."  class=".{{$garanti->ID}}." hidden>
                                                                                                <div class=" col-md-6 form-group">
                                                                                                    <label for=".{{$garanti->ID}}.">Prime nette (en XFA) : </label>
                                                                                                    <input class="form-control"
                                                                                                           type="text"
                                                                                                           id="nette{{$garanti->ID}}"
                                                                                                           placeholder="Prime nette"
                                                                                                           name="nette{{$garanti->ID}}"
                                                                                                            >
                                                                                                </div>
                                                                                                <div class=" col-md-6 form-group">
                                                                                                    <label for=".{{$garanti->ID}}.">Prime Totale (en XFA) : </label>
                                                                                                    <input
                                                                                                            id="totale{{$garanti->ID}}"
                                                                                                            class="form-control"
                                                                                                            type="text"
                                                                                                            name="totale{{$garanti->ID}}"
                                                                                                            placeholder="prime totale"

                                                                                                            >
                                                                                                </div>

                                                                                            </div>
                                                                                    </tr>
                                                                                </table>


                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot style="font-size: 28px; font-weight: bold">
                                                    <tr>
                                                        <th ><strong>Total (En XFA)</strong></th>
                                                        <th id=""><input type="text" id="totaux" style="text-align: center;font-weight: bold; font-size: 28px;" value="0" name="totaux" class="form-control" ></th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                <div hidden>
                                                    <input type="text" name="id" id="id" class="form-control" hidden=true>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-info " type="submit" name="action">
                                                Soumettre
                                            </button>


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
    <script>
        function resetForm(id) {
            $('#' + id).val(function () {
                return this.defaultValue;
            });
        }
        ;

    </script>
@endsection()