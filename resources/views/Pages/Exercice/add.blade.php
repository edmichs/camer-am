@extends('Layouts.template2')
@section('css')


@endsection

@section('content')
    <section class="content-header">
        <h1>
            Nouvel Exercice
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouvel Exercice</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
            <div class="row">
                <h1>Veuillez clotur&eacute; l'exercice en cours avant d'en saisir un nouveau</h1>
            </div>
        @else
            <div class="row">
                <form id="form" method="POST" action="{{route('add_exercice_path')}}" class="col s12 m12 l12">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Nouvel Exercice</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">

                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="Date_debut">Date debut : <span>*</span></label>
                                            <input id="Date_debut" type="date" name="Date_debut" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="Date_fin">Date Fin : <span>*</span></label>
                                            <input id="Date_fin" type="date" name="Date_fin" class="form-control" required>
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

        @endif
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        var checker = document.getElementById('surccusale');
        var sendbtn = document.getElementById('newSurccu');
        checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
            }else {
                sendbtn.disabled = true;
            }
        }


    </script>
@endsection()