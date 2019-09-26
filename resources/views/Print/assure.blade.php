<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> SOGECAR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <!--link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}"-->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style media="print">
        @page{
            size: auto;
            margin: 0;
        }
    </style>
    <style>
        body{
            padding-left: 1.3cm;
            padding-right: 1.3cm;
            pading-top: 1.1cm;
        }
    </style>

</head>
<body onload="window.print();">

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <p class="pull-left">
                    <strong>SOGECAR S.A <br> RUE SYLVANIE AKWA - BP 18139 DOUALA <br>Tel/Fax: 343-85-32 / 343-85-32</strong>

                </p>
                <p class="pull-right"><strong>REPUBLIQUE DU CAMEROUN <br> PAIX-TRAVAIL-PATRIE</strong> </p>

            </div>

        </div><!-- /.col -->
    </div>
    <!--Form Advance-->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h1 style="text-align: center">
                    Liste des Assur&eacute;s
                    <!--small>Preview</small-->
                </h1>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="">
                        <table  class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Filiale</th>
                                <th>Numero police</th>
                                <th>Reference</th>
                                <th>Type d&apos;employ&eacute;</th>
                                <th>Nationalite</th>
                                <th>Taux Couverture</th>
                                <th>Plafond</th>
                                <th>Montant Prime</th>
                                <th>Conso</th>
                                <th>Solde</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assures as $assure)
                                @php
                                $police = \App\Repositories\PoliceRepository::getBySuccursale($assure->succursale->ID,$assure->exercice->ID);
                                $categorie_assure = \App\Models\CategorieAssure::wherePoliceid($police->ID)->whereTypeemployeid($assure->TypeEmployeId)->whereExerciceid($assure->ExerciceID)->first();

                                @endphp
                                <tr>
                                    <td>{{$assure->Nom}}</td>
                                    <td>{{$assure->succursale()->exists() ? $assure->succursale->Nom : ''}}</td>
                                    <td>{{$police->Numero_police}}</td>
                                    <td>{{$assure->Matricule}}-{{$assure->code_famille()->exists() ? $assure->code_famille->Code : ''}}</td>
                                    <td>{{$assure->type_employe()->exists() ? $assure->type_employe->Libelle : ''}}</td>
                                    <td>{{$assure->Nationalite}}</td>
                                    <td>{{$assure->Taux_couverture}}</td>
                                    <td>{{$categorie_assure ? $categorie_assure->plafond : ''}}</td>
                                    <td>{{$categorie_assure ? $categorie_assure->montant_prime : '' }}</td>
                                    <td>{{$assure->Encour_conso}}</td>
                                    <td>{{$assure->Solde}}</td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <footer class="main-footer">
        <strong>
            Copyright &copy; Assurance Maladie <small></small>
        </strong>
    </footer>
</section>


<script src="{{ asset('dist/js/app.min.js') }}" type="text/javascript"></script>


</body>
</html>