@extends('Layouts.template2')
@section('css')
    <script src="{{asset('bower_components/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('bower_components/chartjs/utils.js')}}"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Etat des assur&eacute;s</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

            <div class="row">
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{count($assures)}}</h3>

                            <p>Assur&eacute;(s) Total</p>
                        </div>
                        <div class="icon">
                            <!--i class="ion ion-stats-bars"></i-->
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{count($incorporates)}}</h3>

                            <p>Incorpor&eacute;(s) Total</p>
                        </div>
                        <div class="icon">
                            <!--i class="ion ion-person-add"></i-->
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Etat Mensuel</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="canvas"></canvas>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Line Chart</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart" height="250"></canvas>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col (RIGHT) -->
        </div><!-- /.row -->

    </section>

@endsection
@section('script')

    <script>
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var color = Chart.helpers.color;
        var barChartData = {
            labels: ['Janvier', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Assurés de l\'exercice en cours',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    10,
                    25,
                    35,
                    5,
                    60,
                    29,
                    29,
                    29,
                    29,
                    29,
                    29,
                    40
                ]
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            });

        };



        var colorNames = Object.keys(window.chartColors);

    </script>
@endsection