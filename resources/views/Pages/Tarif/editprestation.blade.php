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
            <li class="active">Modification Prestation</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <form id="form" method="POST" action="{{route('tarif_prestation_update_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <label >Code de la Prestation : <span>*</span></label>
                                        <input id="Code_prestation" type="text" value="{{$prestation->Code_prestation}}" name="Code_prestation" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Description">Description: <span>*</span></label>
                                        <input id="Description" type="text" value="{{$prestation->Description}}" name="Description" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6" hidden>
                                        <label for="ID">ID: <span>*</span></label>
                                        <input id="ID" type="text" value="{{$prestation->ID}}" name="ID" class="form-control" required>
                                    </div>
                                    @php

                                    $cat = $prestation->Categorie_PrestationID;
                                    @endphp
                                    <div class="form-group col-md-6">
                                        <label>Categorie de la prestation : <span>*</span></label>
                                        <select name="Categorie_PrestationID" id="Categorie_PrestationID" data-show-subtext="true" data-live-search="true" class="selectpicker form-control" >
                                            <option value=" ">-- selectionner une cat&eacute;gorie --</option>
                                            @foreach($categories as $categorie)
                                                <option value="{{$categorie->ID}}" {{($cat == $categorie->ID ? 'selected' : '')}}>{{$categorie->Libelle}}</option>
                                            @endforeach
                                        </select>
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