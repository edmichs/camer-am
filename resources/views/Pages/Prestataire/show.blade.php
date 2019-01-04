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
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">D&eacute;tails Centre sant&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Details sur le centre de  sant&eacute;</h3> <br>
                        <a href="{{url('centre-sante/list')}}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>  Retour a la liste</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="col-md-12">


                                <div class="col-md-6">
                                    <p >Nom : <strong>{{ $prestataire->Nom}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>T&eacute;l&eacute;phone :<strong>{{ $prestataire->Telephone}}</strong></p>
                                </div>

                                <div class="col-md-6">
                                    <p>Email <strong>{{ $prestataire->Email }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Nom Contact : <strong>{{ $prestataire->Nom_contact}}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p >Ville : <strong>{{ $prestataire->Ville}}</strong></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p >Pays : <strong>{{ $prestataire->Pays}}</strong> </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>

@endsection

@section('js')
    <script type="text/javascript">


    </script>
@endsection()