@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ajout
            <!--small>Preview</small-->

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouvelle categorie</li>
        </ol>
        @if(session('message'))
            <div class="row">
                <div class="alert alert-warning">{{session('message')}}</div>
            </div>
        @endif
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->

        <div class="row">
            <form id="form" method="POST" action="{{route('add_cate_presta_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <div class="form-group col-md-6">
                                        <label >code categorie : <span>*</span></label>
                                        <input id="code" type="text" name="code" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nom">Description: <span>*</span></label>
                                        <input id="Libelle" type="text" name="Libelle" class="form-control" required>
                                    </div>

                                </div>
                                <div class="form-group col-md-4">
                                    <button class="btn btn-success form-control"  type="submit" name="action">Soumettre</button>
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