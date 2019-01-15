@extends('Layouts.template2')
@section('css')
    <style>
        .no-js #loader { display: none;  }
        #loading { display: block; position: absolute; left: 100px; top: 0; }
        #loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(/img/load.gif) center no-repeat #fff;
        }
        #loading { display: none; }
    </style>

@endsection

@section('content')


    <section class="content-header">
        <h1>
            Nouvel Exercice
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouvel Exercice</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
            <div class="row">
                <h1>Veuillez clotur&eacute; l'exercice en cours avant d'en saisir un nouveau</h1>
            </div>
            <br>
            <br>
            <div class="text-center">
                <a href="" data-toggle="modal" data-id="{{$exercice->ID}}"
                   id="deleteButton"
                   data-target="#deleteModal" class="btn btn-info text-center">Clotur&eacute; l&apos;exercice en cour</a><!--small>Preview</small-->
                <script type="text/javascript">
                    $('#deleteButton').on('click', function () {
                        var Id = $(this).data('id');
                        $(".modal-body #suppr").val(Id);
                    });



                </script>
            </div>

        @else
            <div class="row">
                <form id="form" method="POST" action="{{route('add_exercice_path')}}" class="col s12 m12 l12">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Nouvel Exercice</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">

                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="Date_debut">Date debut : <span>*</span></label>
                                            <input id="Date_debut" type="date" name="Date_debut" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="Date_fin">Date Fin : <span>*</span></label>
                                            <input id="Date_fin" type="date" name="Date_fin" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <button class="btn btn-success form-control"  type="submit" name="action">Ouverture vide</button>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button class="btn btn-info form-control" id="importer" type="button" name="action">Ouvrir en important les donn&eacute;s</button>
                                    </div>
                                    <div id="loading">
                                        <!-- You can add gif image here
                                        for this demo we are just using text -->
                                        Loading...
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $(document).ajaxStart(function () {
                                                $("#loading").show();
                                            }).ajaxStop(function () {
                                                $("#loading").hide();
                                            });
                                        });
                                       $('#importer').on('click', function(){
                                           var formObj = $("#form");
                                           var formURL = formObj.attr("action");
                                           var formData = new FormData($("#form")[0]);
                                           formData.append('importer', 'ok');

                                           $(".se-pre-con").fadeOut("slow");
                                           $.ajax({
                                               url: formURL,
                                               type: 'POST',
                                               data: formData,
                                               contentType: false,
                                               processData: false,
                                               success: function (data) {

                                                   $(".se-pre-con").hide();
                                                    console.log(data);

                                                  message('<h4> Nouvel exercice cr&eacute; avec succes ! </h4>', 'alert-success pull-lg-right');
                                                   window.location.href = "/exercice/list";
                                               },
                                               error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                   console.log(JSON.stringify(jqXHR));
                                                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                   $(".se-pre-con").hide();
                                                   message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                               }
                                           });
                                       });

                                    </script>
                                </div>

                            </div>
                        </div>

                    </div>


                </form>
            </div>

        @endif
    </section>
    <div class="modal fade in" id="deleteModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" method="POST" action="{{route('cloture_excercice_path')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span></button>
                        <h4 class="modal-title">Cl&ocirc;ture de l&apos;exercice en cours</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous Cloturer l'exercice en cours ??? </p>
                        {{ csrf_field() }}
                        <input type="text" hidden name="suppr" id="suppr">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="supprimer" class="btn btn-primary">Cloturer</button>
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
        var checker = document.getElementById('surccusale');
        var sendbtn = document.getElementById('newSurccu');
        checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
            }else {
                sendbtn.disabled = true;
            }
        }


    </script>
@endsection()