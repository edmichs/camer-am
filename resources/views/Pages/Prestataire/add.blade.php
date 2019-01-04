@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Nouveau Centre de sant&eacute;
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouveau Centre de sant&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

        <div class="row">
            <form id="form" method="POST" action="{{route('add_prestataire_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouvel Centre de sant&eacute;</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Nom">Nom</label>
                                        <input type="text" class="form-control" name="Nom" id="Nom">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Telephone">Telephone</label>
                                        <input type="number" class="form-control" name="Telephone" id="Telephone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control" name="Email" id="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nom_contact">Nom Contact</label>
                                        <input type="text" class="form-control" name="Nom_contact" id="Nom_contact">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Ville">Ville/Quartier</label>
                                        <input type="text" class="form-control" name="Ville" id="Ville">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Pays">Pays</label>
                                        <input type="text" class="form-control" name="Pays" id="Pays">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <button class="btn btn-success form-control"  type="submit" name="action">Enregistrer</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </form>
        </div>

    </section>
@endsection

@section('js')

@endsection()