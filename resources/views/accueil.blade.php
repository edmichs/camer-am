@extends('Layouts.template2')

@section('content')
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
          <h3>0</h3>

          <p>Souscripteur (s)</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-bag"></i-->
          <i class="fa fa-filter"></i>
        </div>
        <a href="" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>0</h3>

          <p>Assuré Total</p>
        </div>
        <div class="icon">
          <!--i class="ion ion-stats-bars"></i-->
          <i class="fa fa-hourglass"></i>
        </div>
        <a href="#" class="small-box-footer">Autres Infos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>0</h3>

          <p>Incorporé(s)</p>
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
      <div class="small-box bg-red">
        <div class="inner">
          <h3>0</h3>

          <p>Nombre de visites</p>
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
@endsection