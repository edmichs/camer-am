@extends('Layouts.template2')
@section('css')
    <style>
        fieldset { 
            display: block;
            margin-left: 2px;
            margin-right: 2px;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            border: 2px groove (internal value);
        }
        
        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
        }
       
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ajout
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Nouvel Police</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
        <div class="row">
            <form id="form" method="POST" action="{{route('add_police_path')}}" class="col s12 m12 l12">
                {{ csrf_field() }}

                <div class="col-md-12">
                    <div class="box box-success">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <h3><u>Information sur la police</u></h3>

                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="ExerciceID">Exercice</label>
                                        <select name="ExerciceID" id="ExerciceID" class="form-control">
                                            <option value="{{$exercice->ID}}">{{date("Y", strtotime($exercice->Date_debut))}} </option>
                                        </select>
                                        @if ($errors->has('ExerciceID'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ExerciceID') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="SurccusaleID">Souscripteur/Surccusale</label>
                                        <select name="SuccursaleID" id="SuccursaleID" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                            @foreach($surccusales as $surccusale)
                                                <option value="{{$surccusale->ID}}">{{$surccusale->Nom}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('SuccursaleId'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('SuccursaleId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="EtablissementID">Code Compagnie Assurance</label>
                                        <select name="EtablissementID" id="EtablissementID" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                            @foreach($compagnies as $compagnie)
                                            <option value="{{$compagnie->ID}}">{{$compagnie->Nom}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('EtablissementID'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('EtablissementID') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Numero_police">Numero Police</label>
                                        <input name="Numero_police" id="Numero_police"  class="form-control" type="text" placeholder="Number Police">
                                        @if ($errors->has('Numero_police'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Numero_police') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Description">Libelle/Description</label>
                                        <input name="Description" id="Description" class="form-control" type="text" placeholder="Description">
                                        @if ($errors->has('Description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Description') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="Date_souscription">Date  soucription</label>
                                        <input type="date" class="form-control" name="Date_souscription" id="Date_souscription">
                                        @if ($errors->has('Date_souscription'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Date_souscription') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_emission">Date  &eacute;mission</label>
                                        <input type="date" class="form-control" name="Date_emission" id="Date_emission">
                                        @if ($errors->has('Date_emission'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Date_emission') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_effet">Date  effet</label>
                                        <input type="date" class="form-control" name="Date_effet" id="Date_effet">
                                        @if ($errors->has('Date_effet'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Date_effet') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date_echeance">Date  &eacute;ch&eacute;ance</label>
                                        <input type="date" class="form-control" name="Date_echeance" id="Date_echeance">
                                        @if ($errors->has('Date_echeance'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Date_echeance') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prime_total">Prime totale</label>
                                        <input type="number" class="form-control" name="Prime_total" id="Prime_total">
                                        @if ($errors->has('Prime_total'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Prime_total') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Accessoires">Frais Acc&eacute;ssoires</label>
                                        <input type="number" class="form-control" name="Accessoires" id="Accessoires">
                                        @if ($errors->has('Accessoires'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Accessoires') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prime_nette">Prime nette</label>
                                        <input type="number" class="form-control" name="Prime_nette" id="Prime_nette">
                                        @if ($errors->has('Prime_nette'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Prime_nette') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Plafond_garanti">Plafond Garanti</label>
                                        <input type="number" class="form-control" name="Plafond_garanti" id="Plafond_garanti">
                                        @if ($errors->has('Plafond_garanti'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Plafond_garanti') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <fieldset>
                                        <legend>Montant Prime en fonction des employés</legend>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line">
                                                    <label class="form-label"><strong><u>Directeurs/Expat</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"><strong><u>Cadres/Cadres Sup</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"><strong><u>Agents de maîtrises</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"><strong><u>Employés/Agents</u></strong></label>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <label class="form-label">Assuré principal  : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['principal']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="montantPrime['principal']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['principal']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <input type="number" class="form-control" name="montantPrime['principal']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label">Conjoint  : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['conjoint']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['conjoint']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['conjoint']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['conjoint']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label">Enfant  : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['enfant']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['enfant']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['enfant']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['enfant']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label">Taux (en %) : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['taux']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['taux']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['taux']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPrime['taux']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Montant Plafond en fonction des employés</legend>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line">
                                                    <label class="form-label"><strong><u>Directeurs/Expat</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"><strong><u>Cadres/Cadres Sup</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"><strong><u>Agents de maîtrises</u></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label"><strong><u>Employés/Agents</u></strong></label>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <label class="form-label">Assuré principal  : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['principal']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="montantPlafond['principal']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['principal']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <input type="number" class="form-control" name="montantPlafond['principal']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label">Conjoint  : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['conjoint']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['conjoint']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['conjoint']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['conjoint']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label">Enfant  : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['enfant']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['enfant']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['enfant']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['enfant']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-line" >
                                                    <label class="form-label">Taux (en %) : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['taux']['directeur']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['taux']['cadre']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['taux']['agent']" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <input type="number" class="form-control" name="montantPlafond['taux']['employe']" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success form-control"  type="submit" name="action">Soumettre</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </form>
        </div>
            @else
            <div class="row">
                <h1>Aucun exercice n'est ouvert, Veuillez Demarrer un nouvel exercice</h1>
            </div>
        @endif
    </section>
@endsection

@section('js')

@endsection()