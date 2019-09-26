@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Modification
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Modification Bareme</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <form id="form" method="POST" action="{{route('tarif_bareme_update_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">
                                    @php
                                    $pol = $bareme->PoliceID;
                                    $presta = $bareme->PrestationID;
                                    $typ = $bareme->Type_EmployeID;
                                    $zon = $bareme->zonegeoID;
                                    @endphp
                                    <div class="form-group col-md-6">
                                        <label >Numero Police : <span>*</span></label>
                                        <select id="PoliceID"  name="PoliceID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner une police --</option>
                                            @foreach($polices as $police)
                                                <option {{($pol == $police->ID ? 'selected' : '')}} value="{{$police->ID}}">{{$police->Numero_police}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nom">Prestation: <span>*</span></label>
                                        <select id="PrestationID"  name="PrestationID"data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner une prestation --</option>
                                            @foreach($prestations as $prestation)
                                                <option {{($presta == $prestation->ID ? 'selected' : '')}} value="{{$prestation->ID}}">{{$prestation->Description}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Categorie Employe: <span>*</span></label>
                                        <select id="Type_EmployeID"  name="Type_EmployeID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner type employ&eacute; --</option>
                                            @foreach($types as $type)
                                                <option {{($typ == $type->ID ? 'selected' : '')}} value="{{$type->ID}}">{{$type->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Zone Geo: <span>*</span></label>
                                        <select id="zonegeoID"  name="zonegeoID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control">
                                            <option value=" ">-- selectionnner zone geographique --</option>
                                            @foreach($zones as $zone)
                                                <option {{($zon == $zone->ID ? 'selected' : '' )}} value="{{$zone->ID}}">{{$zone->Libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Base_remboursement">Base/Plafond : <span>*</span></label>
                                        <input type="number" id="Base_remboursement" value="{{$bareme->Base_remboursement}}" name="Base_remboursement" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Taux_rembrousement">Taux de Remboursement : <span>*</span></label>
                                        <input type="number" id="Taux_rembrousement" value="{{$bareme->Taux_rembrousement}}" name="Taux_rembrousement" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6" hidden>
                                        <label for="ID">ID <span>*</span></label>
                                        <input type="text" id="ID" name="ID" value="{{$bareme->ID}}" class="form-control" required>
                                    </div>

                                </div>
                                <div class="form-group col-md-4">
                                    <button class="btn btn-success form-control"  type="submit" name="action">Soumettre</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </form>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">


        /* $("#form").submit(function(e) {
         var formObj = $("#form");
         var formURL = formObj.attr("action");
         var formData = new FormData($("#form")[0]);
         formData.append('validation', 'ok');

         $.ajax({
         url: formURL,
         type: 'POST',
         data:  formData,
         contentType: false,
         processData:false,
         success: function(data){
         //alert(data);
         if (data == 0) {
         message('<h4> Veuillez ajouter une équipe ! </h4>', 'alert-warning pull-lg-right');
         }else{
         message('<h4> Opération réussie ! </h4>', 'alert-success pull-lg-right');
         }

         },
         error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
         /*console.log(JSON.stringify(jqXHR));
         console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         message("<h4> Echec de l'opération ! </h4>", 'alert-danger pull-lg-right');
         }
         });

         e.preventDefault();
         return false;
         });*/
    </script>
@endsection()