@extends('Layouts.template2')
@section('css')
    <style>
        body{
            background-image: url(/img/assurmal.jpg);
        }
    </style>


@endsection
@section('content')
<div class="section-container" >

    <div class="container layouts">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Accueil
    <small>Panneau de control</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $souscripteurs }}</h3>

          <p>Souscripteur (s)</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-bag"></i-->
          <i class="fa fa-user-circle"></i>
        </div>
        <a href="{{ route('souscripteur_list_path') }}" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $assures }}</h3>

          <p>Assuré(s) Total</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-stats-bars"></i-->
          <i class="fa fa-users"></i>
        </div>
        <a href="{{ route('list_assure_path') }}" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-violet">
        <div class="inner">
          <h3>{{ $decomptes }}</h3>

          <p>Decomptes</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-person-add"></i-->
          <i class="fa fa-balance-scale"></i>
        </div>
        <a href="{{ route('list_decompte_path') }}" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>{{ $bpcs }}</h3>

          <p>Bons de Pris en Charge</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ route('list_bpc_path') }}" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
 <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $prestataires }}</h3>

          <p>Prestataires (s)</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-bag"></i-->
          <i class="fa fa-hospital-o"></i>
        </div>
        <a href="{{ route('all_prestation_path') }}" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-gray">
        <div class="inner">
          <h3>{{ $remboursements }}</h3>

          <p>Remboursements</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-stats-bars"></i-->
          <i class="fa fa-balance-scale"></i>
        </div>
        <a href="{{ route('list_remboursement_path') }}" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>0</h3>

          <p>Contrat d&apos;assurance totale</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-person-add"></i-->
          <i class="fa fa-trash"></i>
        </div>
        <a href="" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>0</h3>

          <p>Propositions totale</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <section class="content-header">
      <h1>
        Statistiques
        <small>Eléments statistiques</small>
      </h1>
    </section>

    <br>
  </div>
</section>



<!-- /.content -->

    </div>
</div>

@endsection