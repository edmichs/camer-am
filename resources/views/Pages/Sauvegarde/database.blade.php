@extends('Layouts.template2')

@section('content')
    <section class="content-header">
        <h1>
            Sauvegarde de la base de données
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste Remboursement</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Sauvegarde de la base de données </h3><br>
                        @if(session('message'))
                            <div class="row">
                                <div class="alert alert-warning">{{session('message')}}</div>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{!! route('sauvegarde.bd.create') !!}" method="post">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-primary  pull-left"">Sauvegarder la base de donnée</button>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>




@endsection
