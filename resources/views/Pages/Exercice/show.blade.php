@extends('Layouts.template2')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Accueil
        <small>d&eacute;tails exercice</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$police}}</h3>

                    <p>Succursales</p>
                </div>
                <div class="icon">
                    <!--i class="ion ion-stats-bars"></i-->
                    <i class="fa fa-building"></i>
                </div>
                <a href="{{url("exercice/succursale/{$id}")}}" class="small-box-footer">Voir la liste <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$assure}}</h3>

                    <p>Assur&eacute;s Total</p>
                </div>
                <div class="icon">
                    <!--i class="ion ion-stats-bars"></i-->
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{url("exercice/assure/{$id}")}}" class="small-box-footer">Voir la liste <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$incorporate}}</h3>

                    <p>Incorpor&eacute;(s)</p>
                </div>
                <div class="icon">
                    <!--i class="ion ion-person-add"></i-->
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{url("exercice/incorporate/{$id}")}}" class="small-box-footer">Voir la liste <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3>{{$bpc}}</h3>

                    <p>BPC</p>
                </div>
                <div class="icon">
                    <i class="fa fa-handshake-o"></i>
                </div>
                <a href="{{url("exercice/bpc/{$id}")}}" class="small-box-footer">Voir la liste <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua-gradient">
                <div class="inner">
                    <h3>{{$decompte}}</h3>

                    <p> Decomptes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-balance-scale"></i>
                </div>
                <a href="{{url("exercice/decompte/{$id}")}}" class="small-box-footer">Voir la liste <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia-active">
                <div class="inner">
                    <h3>{{$remboursement}}</h3>

                    <p>Remboursements</p>
                </div>
                <div class="icon">
                    <i class="fa fa-handshake-o"></i>
                </div>
                <a href="{{url("exercice/remboursement/{$id}")}}" class="small-box-footer">Voir la liste <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <section class="content-header">

        </section>


    </div>
</section>



<!-- /.content -->
@endsection