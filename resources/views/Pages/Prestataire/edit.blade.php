@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Nouveau Centre sant&eacute;
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouveau Centre sant&eacute;</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        <div class="row">
            <form id="form" method="POST" action="{{route('update_prestataire_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouvel Centre sant&eacute;</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Nom">Nom du centre de sant&eacute;</label>
                                        <input name="Nom" value="{{$prestataire->Nom}}" id="Nom" class="form-control" type="text" placeholder="Number Centre sant&eacute;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Telephone">Telephone</label>
                                        <input type="text" class="form-control"  value="{{$prestataire->Telephone}}" name="Telephone" id="Date_souscription">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Email">Email</label>
                                        <input type="text" class="form-control"  value="{{$prestataire->Email}}" name="Email" id="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nom_contact">Nom Contact</label>
                                        <input type="text" class="form-control" name="Nom_contact"  value="{{$prestataire->Nom_contact}}" id="Nom_contact">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Ville">Ville</label>
                                        <input type="text" class="form-control" name="Ville"  value="{{$prestataire->Ville}}" id="Ville">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Pays">Pays</label>
                                        <input type="text" class="form-control" name="Pays"  value="{{$prestataire->Pays}}" id="Pays">
                                    </div>

                                    <div class="form-group col-md-6" hidden>
                                        <label for="ID">ID</label>
                                        <input type="number" class="form-control" name="ID"  value="{{$prestataire->ID}}" id="ID">
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