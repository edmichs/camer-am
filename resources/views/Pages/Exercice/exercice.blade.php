@extends('Layouts.template2')
@section('css')
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            @if($encours != null)
                Exercice encours <strong>{{date("Y", strtotime($encours->Date_debut))}}</strong> <br>
                <hr>
               Date debut:   <strong>{{date("d/M/Y", strtotime($encours->Date_debut))}}</strong>  <br> Date fin :
                   <strong>{{date("d/M/Y", strtotime($encours->Date_fin))}}</strong>
                <a href="" data-toggle="modal" data-id="{{$encours->ID}}"
                   id="deleteButton"
                   data-target="#deleteModal" class="btn btn-info pull-right">Clotur&eacute; l&apos;exercice en cour</a><!--small>Preview</small-->
                <script type="text/javascript">
                    $('#deleteButton').on('click', function () {
                        var Id = $(this).data('id');
                        $(".modal-body #suppr").val(Id);
                    });



                </script>
            @else
                Aucun Exercice ouvert!!!!
                @endif

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des exercice</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Liste des Exerccices</h3><br>
                        <a href="{{route('add_exercice_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouvel exercice</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N�</th-->
                                <th>Date Debut</th>
                                <th width="12%">Date Fin</th>
                                <th>Date Cloture</th>
                                <th> Etat</th>
                                <th>Cr&eacute;e le:</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exercices as $exercice)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $exercice->Date_debut }}</td>
                                    <td>{{ $exercice->Date_fin}}</td>
                                    <td>@if($exercice->Date_cloture == null)
                                        Exercice en cours
                                            @else {{ $exercice->Date_cloture}}
                                        @endif
                                    </td>
                                    <td>@if( $exercice->Cloture == 1 )
                                        Clotur&eacute;
                                            @else
                                        Exercice Encours
                                            @endif
                                    </td>
                                    <td>{{ $exercice->created_at }}</td>

                                    <td >
                                        <a href='{{url("exercice/show/{$exercice->ID}")}}' class="btn btn-primary"  data-placement="top" title="Consulter les details de cette exercice">
                                            <i class=" fa fa-eye ">

                                            </i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <!--th>N�</th-->
                                <th>Nom</th>
                                <th>Raison Sociale</th>
                                <th>Activit&eacute;</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th >Options</th>
                            </tr>
                            </tfoot>
                        </table>
                        </div>
                       
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
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
            <script>
                $('#').on('click', function (e) {
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
                            alert(data);


                            message('<h4> Exercice clotur&eacute; avec succ�s ! </h4>', 'alert-success pull-lg-right');


                        },
                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                            console.log($('Numero_decompte').val());
                            message("<h4> Echec de cloture de l'exercice ! </h4>", 'alert-danger pull-lg-right');
                        }
                    });
                    e.preventDefault();
                    return false;
                });
            </script>
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection()