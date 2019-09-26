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
            <li class="active">Nouvelle compagnie</li>
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

        <div class="row">
            <form id="form" method="POST" action="" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <label >Code de la compagnie : <span>*</span></label>
                                        <input id="Raison_social" type="text" name="Raison_social" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nom">Nom Compagnie: <span>*</span></label>
                                        <input id="Nom" type="text" name="Nom" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Adresse: <span>*</span></label>
                                        <input type="text" id="Adresse" name="Adresse" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Email">Email :</label>
                                        <input type="email" id="Email" name="Email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telephone">Telephone : <span>*</span></label>
                                        <input type="number" id="Telephone" name="Telephone" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Nom_contact">Nom Contact <span>*</span></label>
                                        <input type="text" id="Nom_contact" name="Nom_contact" class="form-control" required>
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
        var checker = document.getElementById('surccusale');
        var sendbtn = document.getElementById('newSurccu');
        checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
            }else {
                sendbtn.disabled = true;
            }
        }

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