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
            Nouveau D&eacute;compte
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouveau D&eacute;compte</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('add_decompte_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="form-inline col-md-3">
                                    <label for="Numero_decompte">N&deg; D&eacute;compte :</label>
                                    <input type="text" class="form-control" name="Numero_decompte" id="Numero_decompte"
                                           value="{{$numeroDecompte}}">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Garanti">Type Garanti</label>
                                        <select name="GarantiID" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="GarantiID">
                                            <option value=" ">--selectioner le type de garanti --</option>
                                            @foreach($garanties as $garanti)
                                                <option value="{{$garanti->ID}}">{{$garanti->Description}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="affection">Categorie affection</label>
                                        <select name="AffectionID" class=" selectpicker form-control" data-show-subtext="true" data-live-search="true" id="AffectionID">
                                            <option value=" ">--selectioner la cat&eacute;gorie affection --</option>
                                            @foreach($affections as $affection)
                                                <option  value="{{$affection->ID}}">{{$affection->Description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <script type="text/javascript">

                                        function valPolice() {
                                            d = document.getElementById("PoliceID").value;
                                          //  alert(d);
                                            if (d === " ") {
                                                alert("veuillez selectionner un element");
                                            } else {
                                                var formObj = $("#form");
                                                var formURL = formObj.attr("action");
                                                var formData = new FormData($("#form")[0]);
                                                formData.append('changedPolice', 'ok');

                                                $.ajax({
                                                    url: formURL,
                                                    type: 'POST',
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                       // alert(data);
                                                        console.log(data);
                                                        $("#SuccursaleID").val(data[0].succursale.Nom);

                                                        console.log(data[0].Date_echeance);
                                                      //  message('<h4> Police ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
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

                                        }
                                        ;
                                    </script>
                                    <div class="form-group col-md-6">
                                        <label for="PoliceID">Num&eacute;ro Police</label>
                                        <select class="selectpicker form-control" onchange="valPolice()" name="PoliceID"
                                                id="PoliceID" data-show-subtext="true" data-live-search="true">
                                            <option value=" ">-- selectionner une police --</option>
                                            @foreach($polices as $police)
                                                <option data-subtext="{{$police->succursale->Nom}}"
                                                        value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="SuccursaleID">Police Maladie pour :</label>
                                        <input type="text" name="SuccursaleID" class="form-control" id="SuccursaleID">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ExerciceID">Exercice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <script type="text/javascript">

                                        function change() {
                                            d = document.getElementById("Nom").value;
                                             //alert(d);
                                            if (d === " ") {
                                                alert("veuillez selectionner un element");
                                            } else {
                                                var formObj = $("#form");
                                                var formURL = formObj.attr("action");
                                                var formData = new FormData($("#form")[0]);
                                                formData.append('changeNom', 'ok');

                                                $.ajax({
                                                    url: formURL,
                                                    type: 'POST',
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                        //  alert(data);

                                                        console.log(data);
                                                        $("#Datenaiss").val(data[0].Datenaiss);
                                                        $("#Lieu_naiss").val(data[0].Lieu_naiss);d
                                                        $("#Taux_remboursement").val(data[0].Taux_couverture);

                                                     //   message('<h4> Assur&eacute; ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
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

                                        }
                                        ;
                                    </script>
                                    <div class="form-group col-md-6 ">
                                        <label for="Nom">Nom & Prenoms :</label>
                                        <select class="selectpicker form-control" onchange="change()" name="Nom"
                                                id="Nom" data-show-subtext="true" data-live-search="true">
                                            <option value=" ">-- selectionner un assur&eacute; --</option>
                                            @foreach($assures as $assure)
                                                <option data-subtext="{{$assure->Nom}}"
                                                        value="{{$assure->ID}}">{{$assure->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="Datenaiss">Date de naissance :</label>
                                        <input type="text" class="form-control" name="Datenaiss" id="Datenaiss">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="lieu">Lieu de Naissance :</label>
                                        <input type="text" class="form-control" name="Lieu_naiss" id="Lieu_naiss">
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="Date_declaration">D&eacute;clar&eacute; le :</label>
                                        <input type="date" class="form-control" name="Date_declaration"
                                               id="Date_declaration">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Date_surveillance">Surv&eacute;nu le :</label>
                                        <input type="date" class="form-control" name="Date_surveillance"
                                               id="Date_surveillance">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Date_echeance">Cat&eacute;gorie Prestation</label>
                                        <select name="PrestationID" id="PrestationID" class="form-control">
                                            <option value=" --select cat&eacute;gorie prestation --"></option>
                                            @foreach($prestations as $prestation)
                                                <option value="{{$prestation->ID}}">{{$prestation->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Numero_facture">Numero Facture</label>
                                        <input type="number" class="form-control" name="Numero_facture"
                                               id="Numero_facture">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Montant_facture">Montant Facture</label>
                                        <input type="number" class="form-control" name="Montant_facture"
                                               id="Montant_facture">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nombre_piece">Nombre de pi&egrave;ces</label>
                                        <input type="number" class="form-control" name="Nombre_piece" id="Nombre_piece">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Taux_remboursement">Taux Remboursement</label>
                                        <input type="number" class="form-control" name="Taux_remboursement"
                                               id="Taux_remboursement">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Description_soins">Description Soins</label>
                                        <input type="text" class="form-control" name="Description_soins"
                                               id="Description_soins">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nom_medecin">Nom M&eacute;d&eacute;cin</label>
                                        <input type="text" class="form-control" name="Nom_medecin" id="Nom_medecin">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="zonegeoID">Lieu</label>
                                        <select class="form-control" name="zonegeoID" id="zonegeoID">
                                            <option value=" ">--selectionner le lieu --</option>
                                            @foreach($zonegeos as $zonegeo)
                                                <option value="{{$zonegeo->ID}}">{{$zonegeo->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <hr>
                                    <br>
                                    <h4 class="text-center"><i class="fa fa-plus"></i>Ajouter / traiter une prestation
                                        du d&eacute;compte</h4>
                                    <br>
                                    <script type="text/javascript">

                                        function val() {
                                            d = document.getElementById("Code_prestation").value;

                                            if (d === " ") {
                                                alert("veuillez selectionner un code");
                                            } else {
                                                var formObj = $("#form");
                                                var formURL = formObj.attr("action");
                                                var formData = new FormData($("#form")[0]);
                                                formData.append('changed', 'ok');

                                                $.ajax({
                                                    url: formURL,
                                                    type: 'POST',
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                        // alert(data);
                                                        console.log(data);
                                                        $("#Libelle_prestation").val(data[0].Description);
                                                        $("#Plafond").val(data[0].Plafond);
                                                        console.log(data[0].Categorie_PrestationID);
                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
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

                                        }
                                        ;
                                    </script>

                                    <div class="col-md-3">

                                        <label for="Code_prestation">Code prestation/acte :</label>
                                        <select name="Code_prestation" id="Code_prestation" onchange="val()"
                                                class="form-control">
                                            <option value=" ">-- selectionner code prestation --</option>
                                            @foreach($prestations as $prestation)
                                                <optgroup label="{{$prestation->Libelle}}">
                                                    @foreach(\App\Models\Prestation::whereCategoriePrestationid($prestation->ID)->get() as $presta)
                                                        <option value="{{$presta->Code_prestation}}">{{$presta->Code_prestation}}</option>
                                                    @endforeach
                                                </optgroup>


                                            @endforeach
                                        </select>

                                    </div>


                                    <div class=" col-md-12">

                                        <div class="form-group col-md-2">
                                            <label>Lib&eacute;lle prestation</label>
                                            <input type="text" name="Libelle_prestation" id="Libelle_prestation"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Plafond (en XFA)</label>
                                            <input type="text" name="Plafond" id="Plafond" class="form-control">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Unite</label>
                                            <input type="text" name="Unite" id="Unite" class="form-control">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Taux (en %)</label>
                                            <input type="text" name="Taux" id="Taux" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Montant d&eacute;clar&eacute; (en XFA)</label>
                                            <input type="text" name="Montant_declare" id="Montant_declare"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Montant retenu (en XFA)</label>
                                            <input type="text" name="Montant_retenu" id="Montant_retenu"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Montant &agrave; payer (en XFA) </label>
                                            <input type="text" name="Montant_payer" id="Montant_payer"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Rejet (O/N) :</label>
                                            <input type="radio" name="Rejet" id="Rejet1" value="1"> OUI
                                            <input type="radio" name="Rejet" id="Rejet2" value="0"> NON
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Motif Rejet</label>
                                            <input type="text" name="Motif_rejet" id="Motif_rejet" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button id="validate" class="btn btn-success"><i class="fa fa-plus"></i>
                                                Ajouter
                                            </button>
                                        </div>

                                        <script type="text/javascript">
                                            function supprimer(id) {
                                                $('.deleteButton').on('click', function () {
                                                    var Id = $(this).data('id');
                                                    $(".modal-body #suppr").val(Id);
                                                });
                                            }
                                            ;
                                            function resetForm(id) {
                                                $('#' + id).val(function () {
                                                    return this.defaultValue;
                                                });
                                            }
                                            ;

                                            $("#validate").on('click', function (e) {
                                                var formObj = $("#form");
                                                var formURL = formObj.attr("action");
                                                var formData = new FormData($("#form")[0]);
                                                formData.append('forced', 'ok');

                                                $.ajax({
                                                    url: formURL,
                                                    type: 'POST',
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                        //alert(data);
                                                        resetForm('Libelle_prestation');
                                                        resetForm('Code_prestation');
                                                        resetForm('Plafond');
                                                        resetForm('Unite');
                                                        resetForm('Taux');
                                                        resetForm('Montant_declare');
                                                        resetForm('Montant_retenu');
                                                        resetForm('Montant_payer');

                                                        $('#prestadecompte').html(data);
                                                        consloe.log(data);
                                                        $('#example1').DataTable();

                                                        console.log($('Numero_decompte').val());


                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                        console.log(JSON.stringify(jqXHR));
                                                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                        console.log($('Numero_decompte').val());
                                                        message("<h4> Echec de l'op&eacute;cration ! </h4>", 'alert-danger pull-lg-right');
                                                    }
                                                });
                                                e.preventDefault();
                                                return false;
                                            });
                                        </script>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <br>
                                        <h4>Listes des prestations &agrave; rembourser d'un d&eacute;compte affich&eacute;
                                            au fur et &agrave; m&eacute;sure</h4>

                                        <div id="prestadecompte">
                                            <div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-striped dataTable">

                                                <thead>
                                                <tr>
                                                    <!--th>N�</th-->
                                                    <th>Code Prestation</th>
                                                    <th width="12%">Lib&eacute;ll&eacute; prestation</th>
                                                    <th>Plafond</th>
                                                    <th>Montant D&eacute;clar&eacute;</th>
                                                    <th>Montant retenu</th>
                                                    <th>Montant a payer</th>
                                                    <th>Rejet</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                </table>
                                            </div>
                                          

                                        </div>

                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-info " type="submit" name="action">Soumettre
                                        </button>

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
    <div class="modal fade in" id="deleteModal" class="deleteModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" method="POST" action="{{route('delete_presta_path')}}">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                        <h4 class="modal-title">Suppression...</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous supprimer cette prestation ? </p>
                        {{ csrf_field() }}
                        <input type="text" name="suppr" hidden id="suppr">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button id="supprimer" class="btn btn-primary">Valider</button>

                    </div>
                    <script type="text/javascript">
                        $('#supprimer').on('click', function (e) {
                            var formObj = $("#form-suppr");
                            var formURL = formObj.attr("action");
                            var formData = new FormData($("#form-suppr")[0]);
                            formData.append('supprimer', 'ok');

                            $.ajax({
                                url: formURL,
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (data) {
                                    //alert(data);
                                    $('#deleteModal').modal('hide');
                                    $('#prestadecompte').html(data);
                                    consloe.log(data);
                                    $('#example1').DataTable();

                                    message('<h4>  suppression reussie ! </h4>', 'alert-success pull-lg-right');


                                },
                                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                    console.log(JSON.stringify(jqXHR));
                                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                    console.log($('Numero_decompte').val());
                                    message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                }
                            });
                            e.preventDefault();
                            return false;
                        });
                    </script>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>

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