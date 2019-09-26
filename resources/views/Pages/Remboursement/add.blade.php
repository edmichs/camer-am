@extends('Layouts.template2')
@section('css')
    <style>
        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
        }
        .right {
            float: right;
            right: 0px;
            width: 50%;
            padding: 10px;
        }
        hr{
            border-top: 2px solid black;
            width: 100%;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
             Remboursements
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Validation Remboursements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('store_remboursement_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <h3 class="center"><u>Validation Rembousement</u></h3>
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

                                                console.log(data);
                                                if(data == 0){
                                                    message('<h4> Aucun remboursement en cour pour cette police! </h4>', 'alert-success pull-lg-right');
                                                }else{
                                                    $('#prestadecompte').html(data);
                                                    consloe.log(data);
                                                    $('#example1').DataTable();
                                                    // $("#SuccursaleID").val(data[0].succursale.Nom);
                                                    //$("#Date_effet").val(data[0].Date_effet);
                                                    //$("#Date_echeance").val(data[0].Date_echeance);
                                                    console.log(data[0].Date_echeance);
                                                    message('<h4> Liste des remboursements en cour ! </h4>', 'alert-success pull-lg-right');
                                                }

                                            },
                                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                console.log(JSON.stringify(jqXHR));
                                                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
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
                            <div class="form-inline col-md-6 right">
                                <label for="PoliceID">Num&eacute;ro Police :</label>
                                <select class="selectpicker " onchange="val()" name="PoliceID" id="PoliceID" data-show-subtext="true" data-live-search="true">
                                    <option value=" ">-- selectionner une police --</option>
                                    @foreach($polices as $police)
                                        <option data-subtext="{{$police->succursale->Nom}}" value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                    @endforeach
                                </select>
                            </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inline col-md-6">

                                        <label for="ExerciceID">Exercice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}}</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inline col-md-6 right">
                                        <label for="Numero_police">Mode de r&eacute;gl&egrave;ment :</label>
                                        <select name="mode_reglement" id="mode_reglement" class="form-control">
                                            <option value=" "> </option>
                                            <option value="Comptant">Comptant</option>
                                            <option value="Virement Bancaire">Virement Bancaire</option>
                                            <option value="Visa">Visa</option>
                                            <option value="PayPal">PayPal</option>
                                            <option value="Master Card">Master Card</option>
                                            <option value="Orange Money">Orange Money</option>
                                            <option value="MTN Mobile Money">MTN Mobile Money</option>

                                        </select>
                                        <br><br><br><br>
                                    </div>
                                    <br><br><br><br>
                                    <hr>
                                </div>
                                <br>


                                <p class="center">Liste des factures &agrave; rembourser (Tous les d&eacute;comptes d'une police sont affich&eacute;s au fur et &agrave; m&eacute;sure)</p>
                                <div class="" id="prestadecompte">
                                    <table id="example2" class="table table-bordered table-striped dataTable">
                                        <thead>
                                        <tr>
                                            <!--th>N�</th-->
                                            <th>N&deg; D&eacute;compte</th>
                                            <th width="12%">N&deg; Facture</th>
                                            <th>B&eacute;n&eacute;ficiaire</th>
                                            <th>D&eacute;clar&eacute;</th>
                                            <th>Survenu</th>
                                            <th>Montant Facture</th>
                                            <th>Montant Retenu</th>
                                            <th width="12%">Montant A payer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th>0</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    </table>
                                </div>


                                <br><br><br>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4">
                                        <button class="btn btn-success form-control"  type="submit" name="action">Imprimer BPC vierge</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info form-control"  type="submit" name="action">Soumettre sans Imprimer</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary form-control"  type="submit" name="action">Soumettre et Imprimer</button>
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