@extends('Layouts.print-template')
@section('css')
 {{--   <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
--}}
@endsection

@section('content')
    <table id="example1" class="table table-bordered table-striped dataTable">
        <thead>
        <tr>
            <!--th>N�</th-->
            <th>Nom</th>
            <th width="12%">Code Soci&eacute;t&eacute;</th>
            <th>Activit&eacute;</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Ville</th>
            <th>Pays</th>
            <th width="12%">Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($souscripteurs as $souscripteur)
            <tr>
            <!--td>{{ $loop->iteration }}</td-->
                <td>{{ $souscripteur->nom }}</td>
                <td>{{ $souscripteur->raison_social}}</td>
                <td>{{ $souscripteur->activite }}</td>
                <td>{{ $souscripteur->adresse }}</td>
                <td>{{ $souscripteur->telephone}}</td>
                <td>{{ $souscripteur->ville }}</td>
                <td>{{ $souscripteur->pays }}</td>
                <td >
                    <a href='{{url("souscripteur/show/{$souscripteur->ID}")}}' class="btn btn-primary"  data-placement="top" title="Voir les d&eacute;tails">
                        <i class=" fa fa-eye ">

                        </i></a>
                    <a href="{{url("souscripteur/new/{$souscripteur->ID}")}}" title="Nouvelle surccusale" class="btn btn-info"><i class="fa fa-plus " >

                        </i></a>
                    <a href='{{url("souscripteur/update/{$souscripteur->ID}")}}' class="btn btn-warning edit"
                       id="editButton" title="Modifier">
                        <i class="fa fa-edit " style="margin-right: 0.5%;" >

                        </i>
                    </a>
                    <a href="{{url("souscripteur/delete/{$souscripteur->ID}")}}" class="btn btn-danger"
                       data-placement="bottom" title="Supprimer">
                        <i class=" fa fa-trash " >

                        </i></a>

                </td>
            </tr>
            <div class="modal fade in" id="deleteModal" style="display: none;">
                <div class="modal-dialog">
                    <form id="form-suppr" method="POST" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span></button>
                                <h4 class="modal-title">Suppression...</h4>
                            </div>
                            <div class="modal-body">
                                <p> Souhaitez-vous supprimer cet &eacute;l&eacute;ment ? </p>
                                {{ csrf_field() }}
                                <input type="text" name="" id="" value="{{$souscripteur->ID}}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>

        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <!--th>N�</th-->
            <th>Nom</th>
            <th>Code Soci&eacute;t&eacute;</th>
            <th>Activit&eacute;</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Ville</th>
            <th>Pays</th>
            <th >Options</th>
        </tr>
        </tfoot>
    </table>

@endsection
