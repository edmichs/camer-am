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
            Liste
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Categorie</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <a href="{{route('add_cate_presta_path')}}" class="btn btn-info"><i class="fa fa-plus"></i>Nouvelle Categorie</a>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <!--th>N°</th-->

                                <th>Code Categoriee</th>
                                <th>Libelle</th>
                                <th width="12%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <!--td>{{ $loop->iteration }}</td-->
                                    <td>{{ $categorie->code }}</td>
                                    <td>{{ $categorie->Libelle}}</td>
                                    <td >

                                        <a href="{{url("tarif/categorie/edit/{$categorie->ID}")}}" class="btn btn-warning"
                                           title="Modifier">
                                            <i class="fa fa-edit " style="margin-right: 0.5%;" >

                                            </i>
                                        </a>
                                        <a href="{{url("tarif/categorie/delete/{$categorie->ID}")}}" class="btn btn-danger"
                                           title="Supprimer">
                                            <i class=" fa fa-trash " >

                                            </i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </section>


@endsection

@section('js')
    <script type="text/javascript">
        $(document).on("click","#editButton", function(){
            var id = $(this).data('id');
            var raison = $(this).data('raison_social');
            var nom = $(this).data('nom');
            var activite = $(this).data('activite');
            var adresse = $(this).data('adresse');
            var telephone = $(this).data('telephone');
            var ville = $(this).data('ville');
            var pays = $(this).data('pays');
            var nom_contact = $(this).data('nom_contact');
            console.log(id);

            $(".modal-body #raison_social").val(raison);
            $(".modal-body #nom").val(nom);
            $(".modal-body #activite").val(activite);
            $(".modal-body #adresse").val(adresse);
            $(".modal-body #telephone").val(telephone);
            $(".modal-body #ville").val(ville);
            $(".modal-body #pays").val(pays);
            $(".modal-body #nom_contact").val(nom_contact);
        });

    </script>
@endsection()