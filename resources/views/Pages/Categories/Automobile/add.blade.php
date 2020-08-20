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
            Proposition de contrat Automobile
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
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <h3>Référence du Souscripteur</h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-4">
                                                                    <div class="form-inline ">
                                                                        <label for="numero">N&deg; de proposition:</label>
                                                                        <input type="text" class="form-control" name="numero" id="numero"
                                                                               value="{{$numero}}">
                                                                    </div>
                                                                </div>
                                                                <br><br><br>
                                                            <div class="col-md-12">
                                                                <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }} col-md-3">
                                                                    <label for="Titre">Titre : </label>
                                                                    <select name="titre" id="titre" value="{{ old('titre') }}" class="form-control">
                                                                        <option value="M/Mme"></option>
                                                                        <option value="M">Monsieur</option>
                                                                        <option value="Mme">Madame</option>
                                                                    </select>
                                                                    @if ($errors->has('titre'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('titre') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="Situa_marital">Statut
                                                                        matrimoniale</label>
                                                                    <select class="form-control" value="{{ old('Situa_marital') }}" name="Situa_marital"
                                                                            id="Situa_marital">
                                                                        <option value="">-- selectionner un statut --
                                                                        </option>
                                                                        <option value="1">Mari&eacute;</option>
                                                                        <option value="2">C&eacute;libataire</option>
                                                                    </select>
                                                                    @if ($errors->has('Situa_marital'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Situa_marital') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                               
                                                                <div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Nom">Nom Complet <span>*</span>
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : Samuel Lee Jackson" value="{{ old('Nom') }}" required onkeyup="autocompleteNom();" name="Nom"
                                                                           id="Nom" autofocus>
                                                                        @if ($errors->has('Nom'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Nom') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                               
                                                                <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Email">Email</label>
                                                                    <input type="email" class="form-control"
                                                                           placeholder="ex : example@example.com" name="Email" value="{{ old('Email') }}" id="Email">
                                                                        @if ($errors->has('Email'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Email') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                                <div class="form-group{{ $errors->has('Telephone') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Telephone">T&eacute;l&eacute;phone
                                                                        <span>*</span> :</label>
                                                                    <input type="tel" class="form-control"
                                                                           placeholder="ex : 699999999" name="Telephone" value="{{ old('Telephone') }}" min="9" max="9"
                                                                           id="Telephone" required>
                                                                        @if ($errors->has('Telephone'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Telephone') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                                <div class="form-group{{ $errors->has('numero_permis') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="numero_permis">N° Permis Conduire
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : W14**********" value="{{ old('numero_permis') }}" name="numero_permis"
                                                                           id="numero_permis">
                                                                           @if ($errors->has('numero_permis'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('numero_permis') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                              
                                                                <div class="form-group{{ $errors->has('Fct_employe') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Fct_employe">Prof&eacute;ssion
                                                                        : </label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : chauffeur" name="Fct_employe" value="{{ old('Fct_employe') }}"
                                                                           id="Fct_employe">
                                                                        @if ($errors->has('Fct_employe'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Fct_employe') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                              

                                                                
                                                                <div class="form-group{{ $errors->has('Datenaiss') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Datenaiss">Date Naissance</label>
                                                                    <input type="date" class="form-control"
                                                                           id="Datenaiss" name="Datenaiss" value="{{ old('Datenaiss') }}">
                                                                        @if ($errors->has('Datenaiss'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Datenaiss') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                               <div class="form-group{{ $errors->has('Lieu_naiss') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Lieu_naiss">Lieu de Naissance
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : Douala" name="Lieu_naiss" value="{{ old('Lieu_naiss') }}"
                                                                           id="Lieu_naiss" required>
                                                                        @if ($errors->has('Lieu_naiss'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Lieu_naiss') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <h3>Modalité d&apos;adhesion</h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">

                                                                <div class="form-group{{ $errors->has('Date_emission') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Date_emission">Date d&apos;adhesion</label>
                                                                    <input type="date" class="form-control"
                                                                           name="Date_emission" id="Date_emission" value="{{ old('Date_emission') }}" required>
                                                                           @if ($errors->has('Date_emission'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Date_emission') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                               
                                                               
                                                                <div class="form-group{{ $errors->has('categorie') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="categorie">Categorie</label>
                                                                    <select class="selectpicker  form-control" value="{{ old('categorie') }}"
                                                                            data-show-subtext="true" onchange="handleCheckDefault()"
                                                                            data-live-search="true" name="categorie"
                                                                            id="categorie">
                                                                        @foreach ($categorie_tarifs as $cat)
                                                                            <option value="{{$cat->numero}}"
                                                                                    data-subtext="{{$cat->description}}">{{$cat->numero}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('categorie'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('categorie') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                                <div class=" form-group{{ $errors->has('duree') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Nom">Dur&eacute;e de l&apos;adhesion</label>
                                                                    <select class="form-control" onchange="handleCheckDefault()" name="duree" value="{{ old('duree') }}"
                                                                            id="duree">
                                                                        <option value="60">60 Jours</option>
                                                                        <option value="120">120 Jours</option>
                                                                        <option value="180">180 jours</option>
                                                                        <option value="365">365 jours</option>
                                                                    </select>
                                                                    @if ($errors->has('duree'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('duree') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>
                                                                <div class="form-group{{ $errors->has('Date_effet') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Date_effet">Date effet</label>
                                                                    <input type="date" class="form-control" required value="{{ old('Date_effet') }}"
                                                                           name="Date_effet" id="Date_effet" onchange="caculEcheance();">
                                                                           @if ($errors->has('Date_effet'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Date_effet') }}</strong>
                                                                           </span>
                                                                       @endif
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
                                                                <div class="form-group{{ $errors->has('Date_echeance') ? ' has-error' : '' }} col-md-6">
                                                                    <label for="Date_echeance">Date &eacute;ch&eacute;ance</label>
                                                                    <input type="text" class="form-control" required value="{{ old('Date_echeance') }}"
                                                                           name="Date_echeance" id="Date_echeance">
                                                                           @if ($errors->has('Date_echeance'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('Date_echeance') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                </div>

                                                                <script>
                                                                function handleCheckDefault(){
                                                                    // $("#id").val(id);
                                                                   // alert(id);
                                                                  //  console.log(id);
                                                                    var duree = document.getElementById("duree").value;

                                                                    if(document.getElementById("Date_effet").value != ""){
                                                                        var options = { year: 'numeric', month: 'numeric',day: 'numeric'};
                                                                        var effet =  document.getElementById("Date_effet").value;
                                                                        var date_effet = new Date(effet.toLocaleString());
                                                                      //  console.log(date_effet);
                                                                        date_effet.setDate(date_effet.getDay() + parseInt(duree));
                                                                      //  console.log(date_effet.toLocaleDateString("fr-FR",options));
                                                                        $("#Date_echeance").val(date_effet.toLocaleDateString("fr-FR",options));

                                                                    }
                                                                    var totale = document.getElementById("totaux").value;
                                                                    var puissance = document.getElementById("puissance").value;
                                                                    var categorie = document.getElementById("categorie").value;
                                                                
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

                                                                                console.log(data);
                                                                                if(data != null || data != undefined){
                                                                                    for(let i = 0; i <= data.length; i++){
                                                                                        document.getElementById("."+data[i].garanti_id+".").removeAttribute("hidden");
                                                                                        $("#nette"+data[i].garanti_id).val(data[i].prime_nette);
                                                                                        $("#totale"+data[i].garanti_id).val(data[i].pttc);
                                                                                        totale = parseInt(totale + data[i].pttc);
                                                                                        $("#totaux").val(totale);
                                                                                    }
                                                                               //

                                                                                    // $("."+data[0].garanti_id).removeAttr('hidden');
                                                                                }
                                                                                //  $("#Matricule").val(data[0].Matricule);
                                                                                // $("#Datenaiss").val(data[0].Datenaiss);
                                                                                // $("#Lieu_naiss").val(data[0].Lieu_naiss);


                                                                                 message('<h4> Assur&eacute; ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                                            },
                                                                            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                                                console.log(JSON.stringify(jqXHR));
                                                                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                                                message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
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

                                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }} col-md-3">

                                            <label for="nom">Nom Du proprietaire : </label>
                                            <input type="text" class="form-control" name="nom" required value="{{ old('nom') }}"
                                                   placeholder="ex : Samuel Lee Jackson" id="nom">
                                                   @if ($errors->has('nom'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('nom') }}</strong>
                                                        </span>
                                                    @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('immatriculation') ? ' has-error' : '' }} col-md-3">

                                            <label for="immatriculation">N° Immatriculation : </label>
                                            <input type="text" class="form-control" name="immatriculation" required value="{{ old('immatriculation') }}"
                                                   placeholder="ex : CE 186 HI" id="immatriculation">
                                                   @if ($errors->has('immatriculation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('immatriculation') }}</strong>
                                                        </span>
                                                    @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('date_delivre') ? ' has-error' : '' }} col-md-3">

                                            <label for="date_delivre">Date Delivre carte grise: </label>
                                            <input type="date" class="form-control" name="date_delivre" required value="{{ old('date_delivre') }}"
                                                   id="date_delivre">
                                                   @if ($errors->has('date_delivre'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('date_delivre') }}</strong>
                                                        </span>
                                                    @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('date_first_circulation') ? ' has-error' : '' }} col-md-3">

                                            <label for="date_first_circulation">Date 1ere mise en circulation : </label>
                                            <input type="date" class="form-control" name="date_first_circulation" required value="{{ old('date_first_circulation') }}"
                                                   id="date_first_circulation">
                                                   @if ($errors->has('date_first_circulation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('date_first_circulation') }}</strong>
                                                        </span>
                                                    @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('marque') ? ' has-error' : '' }} col-md-3">

                                            <label for="marque">Marque : </label>
                                            <input type="text" class="form-control" name="marque" id="marque" required value="{{ old('marque') }}"
                                                   placeholder=" ex : Mercedes Benz">
                                                   @if ($errors->has('marque'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('marque') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }} col-md-3">

                                            <label for="genre">Genre : </label>
                                            <input type="text" class="form-control" name="genre" id="genre" required value="{{ old('genre') }}"
                                                   placeholder="ex : VP">
                                                   @if ($errors->has('genre'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('genre') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('carrosserie') ? ' has-error' : '' }} col-md-3">

                                            <label for="carrosserie">Carrosserie : </label>
                                            <input type="text" class="form-control" name="carrosserie" id="carrosserie" value="{{ old('carrosserie') }}"
                                                   placeholder="ex : CI">
                                                   @if ($errors->has('carrosserie'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('carrosserie') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('numero_serie') ? ' has-error' : '' }} col-md-3">
                                            <label for="numero_serie">N° de serie : </label>
                                            <input type="text" class="form-control" name="numero_serie" value="{{ old('numero_serie') }}"
                                                   id="numero_serie" placeholder="Numero de serie de la voiture ou Numero de chassis">
                                                   @if ($errors->has('numero_serie'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('numero_serie') }}</strong>
                                                   </span>
                                               @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('energie') ? ' has-error' : '' }} col-md-3">

                                            <label for="carrosserie">Energie : </label>
                                            <select name="energie" id="energie" value="{{ old('energie') }}" required onchange="handleCheckDefault();" class="form-control">
                                                <option value="essence">Essence</option>
                                                <option value="diesel">Diesel</option>
                                            </select>
                                            @if ($errors->has('energie'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('energie') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group col-md-3">

                                            <label for="Code_prestation">Puissance (en CV): </label>
                                            @php
                                                $puissanceGroupe = [1,2];
                                            @endphp
                                            <select name="puissance_id" id="puissance" required onchange="handleCheckDefault()" class="selectpicker form-control">
                                                <option value=" ">Selectionnez puissance</option>
                                                @foreach($puissanceGroupe as $puiss)
                                                    @php
                                                        $puissances = \App\Models\Puissance::whereType($puiss)->get();
                                                    @endphp
                                                    <optgroup label="{{$puiss == 1 ? "Essence" : "Diesel"}}">
                                                        @foreach($puissances as $puissance)
                                                            <option value="{{$puissance->id}}"> {{$puissance->max == 1000 ? $puissance->min ." et +" : $puissance->min . ' &agrave; '. $puissance->max .' CV' }}</option>
                                                        @endforeach
                                                    </optgroup>

                                                @endforeach

                                            </select>


                                        </div>
                                        <div class="form-group{{ $errors->has('puissance_reelle') ? ' has-error' : '' }} col-md-3">

                                            <label for="puissance_reelle">Puissance R&eacute;elle (en cm3): </label>
                                            <input type="number" class="form-control" name="puissance_reelle" value="{{ old('puissance_reelle') }}"
                                                   id="puissance_reelle" placeholder="ex : 400">
                                                   @if ($errors->has('puissance_reelle'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('puissance_reelle') }}</strong>
                                                   </span>
                                               @endif


                                        </div>
                                        <div class="form-group{{ $errors->has('nbre_places') ? ' has-error' : '' }}  col-md-3">

                                            <label for="nbre_place">Nombre de place : </label>
                                            <input type="number" class="form-control" name="nbre_places" id="nbre_places" value="{{ old('nbre_places') }}"
                                                   placeholder="ex: 5">
                                                   @if ($errors->has('nbre_places'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('nbre_places') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('charge_utile') ? ' has-error' : '' }}  col-md-3">

                                            <label for="charge_utile">Charge Utile : </label>
                                            <input type="number" class="form-control" name="charge_utile" value="{{ old('charge_utile') }}"
                                                   id="charge_utile" placeholder="ex: 0">
                                                   @if ($errors->has('charge_utile'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('charge_utile') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('ptac') ? ' has-error' : '' }} col-md-3">

                                            <label for="ptac">P.T.A.C (en Kg): </label>
                                            <input type="number" class="form-control" name="ptac" value="{{ old('ptac') }}"
                                                   id="ptac" placeholder="ex: 2850">
                                                   @if ($errors->has('ptac'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('ptac') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('poids_vide') ? ' has-error' : '' }} col-md-3">

                                            <label for="poids_vide">Poids Vide (en Kg): </label>
                                            <input type="number" class="form-control" name="poids_vide" id="poids_vide" value="{{ old('poids_vide') }}"
                                                   placeholder="ex : 1350">
                                                   @if ($errors->has('poids_vide'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('poids_vide') }}</strong>
                                                   </span>
                                               @endif

                                        </div>


                                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} col-md-3">

                                            <label for="type">Type : </label>
                                            <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}"
                                                   placeholder="ex : BJ14L3">
                                                   @if ($errors->has('type'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('type') }}</strong>
                                                   </span>
                                               @endif

                                        </div>

                                        <div class="form-group{{ $errors->has('valeur_neuf') ? ' has-error' : '' }} col-md-3">

                                            <label for="valeur_neuf">Valeur a neuf (en XFA): </label>
                                            <input type="number" class="form-control" required name="valeur_neuf" value="{{ old('valeur_neuf') }}"
                                                   id="valeur_neuf" placeholder="ex : 15 000 000">
                                                   @if ($errors->has('valeur_neuf'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('valeur_neuf') }}</strong>
                                                   </span>
                                               @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('valeur_venale') ? ' has-error' : '' }} col-md-3">

                                            <label for="valeur_venale">Valeur venale (en XFA): </label>
                                            <input type="number" class="form-control" name="valeur_venale" value="{{ old('valeur_venale') }}"
                                                   id="valeur_venale" placeholder="ex : 7 000 000">
                                                   @if ($errors->has('valeur_venale'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('valeur_venale') }}</strong>
                                                   </span>
                                               @endif

                                        </div>

                                        <div class="form-group{{ $errors->has('garage_habituel') ? ' has-error' : '' }} col-md-3">

                                            <label for="garage_habituel">Garage Habituel : </label>
                                            <input type="text" class="form-control" name="garage_habituel" id="garage_habituel" value="{{ old('garage_habituel') }}"
                                                   placeholder="ex : Les Garagistes">
                                                   @if ($errors->has('garage_habituel'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('garage_habituel') }}</strong>
                                                   </span>
                                               @endif

                                        </div>

                                        <div class="form-group col-md-3">

                                            <label for="zone">Zone: </label>
                                            <select name="zone_id" id="zone" class="selectpicker form-control">
                                                @foreach ($zones as $item)
                                                <option value="{{ $item->id }}">{{ $item->code }}</option>
                                                @endforeach
                                                
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
                                                <input type="text" name="cat" id="cat" class="form-control" value="{{ old('cat') }}">
                                            </div>
                                            <div class="form-inline col-md-5">
                                                <label for="tarif">Conducteur Habituelle :</label>
                                                <input type="text" name="conducteur_habituel" value="{{ old('conducteur_habituel') }}"  id="conducteur_habituel" class="form-control">
                                                <br>
                                                <br>
                                            </div>

                                            <h4><u>Garanti</u></h4>
                                            <script>
                                                function handleChange(checkbox, id) {
                                                    $("#id").val(id);
                                                    var totale = document.getElementById("totaux").value;

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
                                                           console.log(data);

                                                            if(data != null || data != undefined ){
                                                                if( data.length > 0 && data[0].checkAll == 1){
                                                                    console.log(data[0].checkAll);
                                                                    console.log($('input:checkbox'));

                                                                    $('input:checkbox').prop('checked', this.checked);
                                                                }
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

                                                            }


                                                          //   $("#Matricule").val(data[0].Matricule);
                                                            // $("#Datenaiss").val(data[0].Datenaiss);
                                                            // $("#Lieu_naiss").val(data[0].Lieu_naiss);


                                                            //message('<h4> Assur&eacute; ajout&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                        },
                                                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                           // document.getElementById("."+id+".").style.visibility="hidden";

                                                            console.log(JSON.stringify(jqXHR));
                                                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
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
                                                                                                   checked 
                                                                                                   @endif
                                                                                                   id="checkbox{{$garanti->ID}}"
                                                                                                   value="{{$garanti->ID}}">
                                                                                        </td>

                                                                                        <td>
                                                                                            <div class="form-group" id=".{{$garanti->ID}}."  class=".{{$garanti->ID}}." hidden>
                                                                                               <div class=" col-md-6 form-group">
                                                                                                   <label for="nette{{$garanti->ID}}">Prime nette (en XFA) : </label>
                                                                                                   <input class="form-control"
                                                                                                           type="text"
                                                                                                          id="nette{{$garanti->ID}}"
                                                                                                          placeholder="Prime nette"
                                                                                                           name="nette{{$garanti->ID}}"
                                                                                                           >
                                                                                               </div>
                                                                                                <div class=" col-md-6 form-group">
                                                                                                    <label for="totale{{$garanti->ID}}">Prime Totale (en XFA) : </label>
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
                                                <div >
                                                    <input type="hidden" name="id" id="id" class="form-control" >

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