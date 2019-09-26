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



    <section class="content invoice">
        <!--Form Advance-->
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

            <h1 style="text-align: center">Bon de Prise en charge</h1>
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <p class="pull-left">
                            Souscripteur : <strong>@if(isset($bpc)) {{$bpc->police()->exists() ? ($bpc->police->succursale()->exists() ? $bpc->police->succursale->Nom: "") : ''}}@endif</strong>  <br> Police :
                            <strong>@if(isset($bpc)) {{$bpc->police->exists() ? $bpc->police->Numero_police : ''}}@endif</strong>

                        </p>
                        <p class="pull-right" style="text-align: left">
                            MOUKOKO <br>
                            {{date('d-m-Y')}}
                        </p>

                    </div>

                </div><!-- /.col -->
            </div>
            <form id="form" method="POST" action="{{route('add_bpc_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class=" ">
                        <!-- /.box-header -->
                        <div class="">
                            <div class="row invoice-info">

                                <div class="col-sm-6 invoice-col">

                                    <address>
                                        <label for="PoliceID">Num&eacute;ro Police</label>
                                        <input type="text" class="form-control" value="@if(isset($bpc)) {{$bpc->police->exists() ? $bpc->police->Numero_police : ''}}@endif">

                                    </address>
                                </div><!-- /.col -->
                                <div class="col-sm-6 invoice-col">

                                    <address>
                                        <label for="SuccursaleID">Police Maladie pour :</label>
                                        <input name="SuccursaleID" class="form-control"  value="@if(isset($bpc)) {{$bpc->police()->exists() ? ($bpc->police->succursale()->exists() ? $bpc->police->succursale->Nom: "") : ''}}@endif" id="SuccursaleID">

                                    </address>
                                </div><!-- /.col -->

                                <div class="col-sm-6 invoice-col">
                                    <label for="Date_effet">Date Effet</label>
                                    <input type="text"  value="@if(isset($bpc)) {{date("d/m/Y", strtotime($bpc->police->exists()  ? $bpc->police->Date_effet : ''))}}@endif" name="Date_effet" id="Date_effet" class="form-control">

                                </div><!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <label for="Date_echeance">Date Echeance</label>
                                    <input type="text" name="Date_echeance"  value="@if(isset($bpc)) {{date("d/m/Y", strtotime($bpc->police->exists()  ? $bpc->police->Date_echeance : ''))}}@endif" id="Date_echeance"
                                           class="form-control">

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                            <div class="">

                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col ">
                                        <label for="Nom">Nom & Prenoms :</label>
                                        <input type="text" name="nom"  value="@if(isset($bpc)) {{$bpc->assure->exists() ? $bpc->assure->Nom : ''}}@endif" id="nom" class="form-control">
                                    </div>

                                    <div class="col-sm-6 invoice-col ">
                                        <label for="Matricule">Matricule/Reference</label>
                                        <input name="Matricule" id="Matricule"  value="@if(isset($bpc)) {{$bpc->assure->exists() ? $bpc->assure->Matricule ."". $bpc->assure->code_famille->code : ''}}@endif" class="form-control">

                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        <label for="Datenaiss">Date de naissance :</label>
                                        <input type="text" class="form-control"  value="@if(isset($bpc)) {{date("d/m/Y", strtotime($bpc->assure->exists()  ? $bpc->assure->Datenaiss : ''))}}@endif" name="Datenaiss" id="Datenaiss">
                                    </div>
                                    <div class="col-sm-6 invoice-col">
                                        <label for="Lieu_naiss">Lieu de Naissance :</label>
                                        <input type="text" class="form-control"  value="@if(isset($bpc)) {{$bpc->assure->exists() ? $bpc->assure->Lieu_naiss : ''}}@endif" name="Lieu_naiss" id="Lieu_naiss">
                                    </div>
                                    <div class="col-sm-6 invoice-col">
                                        <label for="AffectionID">Affection (Maladie) :</label>
                                        <input type="text" name="affection"  value="@if(isset($bpc)) {{$bpc->affection->exists() ? $bpc->affection->Description : ''}}@endif" id="affection" class="form-control">
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col-4">
                                        <label for="Couverture">Hauteur couverture</label>
                                        <input type="text" class="form-control"  value="@if(isset($bpc)) {{$bpc->assure->exists() ? $bpc->assure->Taux_couverture : ''}}@endif %" name="Taux_couverture"
                                               id="Taux_couverture">
                                    </div>
                                    <div class="col-sm-6 invoice-col-4">
                                        <label for="Plafond">Plafond Remboursement</label>
                                        <input type="text" class="form-control"  value="@if(isset($bpc)) {{$bpc->assure->exists() ? $bpc->assure->Plafond : '0'}}@endif XFA " name="Plafond" id="Plafond">
                                    </div>
                                    <div class="col-sm-6 invoice-col-4">
                                        <label for="Encour">Encours</label>
                                        <input type="text" class="form-control"  value="@if(isset($bpc)) {{$bpc->assure->exists() ? $bpc->assure->Encour_conso : '0'}}@endif XFA" name="Encour" id="Encour">
                                    </div>

                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        <label for="Date_sinistre">Date Sinistre</label>
                                        <input type="text" class="form-control"  value="@if(isset($bpc)) {{date("d/m/Y", strtotime($bpc->Date_sinistre))}}@endif" name="Date_sinistre"
                                               id="Date_sinistre">
                                    </div>
                                    <div class="col-sm-6 invoice-col">
                                        <label for="Date_declaration">Date d&eacute;claration</label>
                                        <input type="text" class="form-control" name="Date_declaration"  value="@if(isset($bpc)) {{date("d/m/Y", strtotime($bpc->Date_declaration))}}@endif"
                                               id="Date_declaration">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ol>
                                        @if(isset($bpc))

                                            @foreach(\App\Models\Extrait_prestation::whereBpcid($bpc->ID)->get() as $prestation)

                                                <li>
                                                    {{$prestation->prestation->categorie_prestation->Libelle}}

                                                    <label>
                                                        <input type="radio" name="optradio[{{$prestation->ID}}]" checked class="flat-green" value="{{$prestation->ID}}" >
                                                        Oui
                                                    </label>
                                                    <label>
                                                        <input type="radio" disabled name="optradio[{{$prestation->ID}}]" class="flat-green" value="0">
                                                        Non
                                                    </label>
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <table class="table table-bordered table-striped dataTable">
                                                                <thead>
                                                                <tr>
                                                                    @foreach(\App\Models\Prestation::where('Categorie_PrestationID','=',$prestation->prestation->categorie_prestation->ID)->get() as $presta)
                                                                        <th>
                                                                            {{$presta->Code_prestation}} = {{$presta->Plafond}}
                                                                            <br>
                                                                        </th>

                                                                    @endforeach
                                                                </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>


                                                        </div>
                                                        <div >



                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach
                                        @else
                                            @foreach($prestations as $prestation)
                                                <li>
                                                    {{$prestation->Libelle}}
                                                    <label>
                                                        <input type="radio" name="optradio[{{$prestation->ID}}]"
                                                               class="flat-green" value="{{$prestation->ID}}">
                                                        Oui
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="optradio[{{$prestation->ID}}]"
                                                               class="flat-green" value="0">
                                                        Non
                                                    </label>

                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <table class="table table-bordered table-striped dataTable">
                                                                <thead>
                                                                <tr>
                                                                    @foreach(\App\Models\Prestation::where('Categorie_PrestationID','=',$prestation->ID)->get() as $presta)



                                                                        <th>
                                                                            {{$presta->Code_prestation}}
                                                                            = {{$presta->Plafond}}
                                                                            <br>
                                                                        </th>

                                                                    @endforeach
                                                                </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>


                                                        </div>
                                                        <div>


                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach

                                        @endif
                                    </ol>
                                </div>
                                <div class="row invoice-info">

                                    <div class="col-sm-6 invoice-col">

                                        <label for="Centre_sante">Nom (lib&eacute;ll&eacute;) :</label>
                                        <input type="text" name="centre" id="centre" class="form-control" value="@if(isset($bpc)) {{$bpc->centre_sante()->exists() ? $bpc->centre_sante->Nom : ""}} @endif">
                                    </div>
                                    <div class="col-sm-6 invoice-col">
                                        Nom (lib&eacute;ll&eacute;) :
                                        <input type="text" name="medecin" id="medecin" class="form-control" value="@if(isset($bpc)) {{$bpc->medecin_conseil()->exists() ? $bpc->medecin_conseil->Noms : ""}} @endif">
                                        T&egrave;l :
                                        <input type="tel" name="Tel_medecin" id="Tel_medecin" class="form-control" value="@if(isset($bpc)) {{$bpc->medecin_conseil()->exists() ? $bpc->medecin_conseil->Telephone : ""}} @endif">
                                        Email :
                                        <input type="email" name="email_medecin" id="email_medecin" value="@if(isset($bpc)) {{$bpc->medecin_conseil()->exists() ? $bpc->medecin_conseil->Email : ""}} @endif"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row invoice-info">


                                <div class="col-sm-6 invoice-col-4">
                                    <p>Signature
                                        Direction</p>
                                </div>
                                <div class="col-sm-6 invoice-col-4">

                                </div>

                                <div class="col-sm-6 invoice-col-4">
                                    <p>Signature B&eacute;n&eacute;ficiaire</p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>


            </form>
        </div>
        <footer class="main-footer">
            <strong>
                Copyright &copy; Assurance Maladie <small></small>
            </strong>
        </footer>
    </section>

<!-- Main content -->


<script src="{{ asset('dist/js/app.min.js') }}" type="text/javascript"></script>


</body>
</html>