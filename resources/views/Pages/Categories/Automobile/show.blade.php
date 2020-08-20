@extends('Layouts.template2')
@section('css')
    <style>
        hr {
            border: 1px solid black;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        @include('Inc.print-header')
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
            <div class="row">
                <form id="form"  class="col s12 m12 l12">
                  

                    <div class="col-md-12">
                        <div class="box ">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                
                                                <div class="box">
                                                    <div class="box-header">
                                                        <h3 class="text-left"><u>Renseignements sur le Souscripteur</u></h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                               
                                                                <div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }} col-md-8">
                                                                        <h5 for="Nom">Nom Complet
                                                                            : <strong>{{ $auto->incorporation()->exists() ? $auto->incorporation->titre. ". ". $auto->incorporation->Nom : "" }}</strong></h5>
                                                                        
                                                                </div>
                                                                <div class="form-group{{ $errors->has('Datenaiss') ? ' has-error' : '' }} col-md-4">
                                                                        <h5 for="Datenaiss">Date Naissance <strong>{{ $auto->incorporation()->exists() ? date("d/m/Y",strtotime($auto->incorporation->Datenaiss)) : "" }}</strong></h5>
                                                                        
                                                                </div>
                                                               <div class="form-group{{ $errors->has('Lieu_naiss') ? ' has-error' : '' }} col-md-4">
                                                                        <h5 for="Lieu_naiss">Lieu de Naissance : <strong>{{ $auto->incorporation()->exists() ? $auto->incorporation->Lieu_naiss : "" }}</strong>
                                                                            </h5>
                                                                       
                                                                </div>
                                                                <div class="form-group{{ $errors->has('Telephone') ? ' has-error' : '' }} col-md-4">
                                                                        <h5 for="Telephone">T&eacute;l&eacute;phone : <strong>{{ $auto->incorporation()->exists() ? $auto->incorporation->Telephone : ""}}</strong>
                                                                            </h5>
                                                                       
                                                                </div>
                                                                <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }} col-md-4">
                                                                        <h5 for="Email">Email :  <strong>{{ $auto->incorporation()->exists() ? $auto->incorporation->Email : ""}}</strong></h5>
                                                                       
                                                                </div>
                                                                <div class="form-group{{ $errors->has('numero_permis') ? ' has-error' : '' }} col-md-4">
                                                                    <h5 for="numero_permis">N° Permis Conduire
                                                                        : <strong>{{ $auto->incorporation()->exists() ? $auto->incorporation->numero_permis : ""}}</strong></h5>
                                                                           
                                                                </div>
                                                                      
                                                                <div class="form-group{{ $errors->has('Fct_employe') ? ' has-error' : '' }} col-md-4">
                                                                    <h5 for="Fct_employe">Prof&eacute;ssion
                                                                        : <strong>{{ $auto->incorporation()->exists() ? $auto->incorporation->Fct_employe : ""}}</strong></h5>
                                                                           
                                                                </div>
                                                                      
        
                                                                <div class="form-group col-md-3">
                                                                    <h5 for="Situa_marital">Statut
                                                                        matrimoniale : <strong>{{ $auto->incorporation->Situa_marital == 1 ? "Maeié" : "Célibataire"}}</strong></h5>
                                                                    
                                                                </div>
                                                               
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="col-md-12">
                                                <div class="box">
                                                    <div class="box-header">
                                                        <h3 class="text-left"> <u>Modalité d&apos;adhesion</u>  </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">

                                                                <div class="form-group{{ $errors->has('Date_emission') ? ' has-error' : '' }} col-md-6">
                                                                    <h5 for="Date_emission">Date d&apos;adhesion : <strong>{{ date("d/m/Y",strtotime($auto->date_adhesion))  }}</strong> </h5>
                                                                    
                                                                </div>
                                                               
                                                               
                                                               
                                                                <div class=" form-group{{ $errors->has('duree') ? ' has-error' : '' }} col-md-6">
                                                                    <h5 for="Nom">Dur&eacute;e de l&apos;adhesion : <strong>{{ $auto->duree_adhesion  }}</strong> Jours </h5>
                                                                    
                                                                </div>
                                                                <div class="form-group{{ $errors->has('Date_effet') ? ' has-error' : '' }} col-md-6">
                                                                    <h5 for="Date_effet">Date effet : <strong>{{ date("d/m/Y",strtotime($auto->date_effet))  }}</strong> </h5>
                                                                    
                                                                </div>
                                                                
                                                                <div class="form-group{{ $errors->has('Date_echeance') ? ' has-error' : '' }} col-md-6">
                                                                    <h5 for="Date_echeance">Date &eacute;ch&eacute;ance : <strong>{{ date("d/m/Y",strtotime($auto->date_echeance))  }}</strong> </h5>
                                                                   
                                                                </div>

                                                                
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                    <div class="box">
                                                            <div class="box-header">
                                                                <h3 class="text-left"> <u>Identification du V&eacute;hicule</u>  </h3>
                                                            </div>
                                                            <div class="box-body">
                                                                <div class="col-md-12">
        
                                                                        <div class="form-group  col-md-6">
                                                                            <h5 for="Date_emission">Nom Du proprietaire  : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->nom : ""  }}</strong> </h5>
                                                                            
                                                                        </div>
                                                                       
                                                                       
                                                                       
                                                                        <div class=" form-group  col-md-6">
                                                                            <h5 for="Nom">N° Immatriculation : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->immatriculation : ""  }}</strong> </h5>
                                                                            
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <h5 for="Date_effet">Date delivrance carte grise:  <strong>{{ $auto->carte_grise()->exists() ? date("d/m/Y",strtotime($auto->carte_grise->date_delivre)) : ""  }}</strong> </h5>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="form-group col-md-4">
                                                                            <h5 for="Date_echeance">Date 1ère mise en circulation : <strong>{{ $auto->carte_grise()->exists() ? date("d/m/Y",strtotime($auto->carte_grise->date_first_circulation))  : ""  }}</strong> </h5>
                                                                           
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Marque : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->marque : ""  }}</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <h5 for="Date_echeance">Genre : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->genre : ""  }}</strong> </h5>
                                                                       
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Carrosserie : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->carrosserie : ""  }}</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">N° de serie : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->numero_serie : ""  }}</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Energie : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->energie : ""  }}</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Puissance R&eacute;elle (en cm3) : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->puissance_reelle : ""  }}</strong>  cm3</h5>
                                                                               
                                                                        </div>
                                                                       
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Nombre de place : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->nbre_places : ""  }}</strong> Places</h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Charge Utile : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->charge_utile : ""  }}</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">P.T.A.C (en Kg) : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->ptac : ""  }}</strong> Kg</h5>
                                                                               
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Poids Vide (en Kg) : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->poids_vide : ""  }}</strong> Kg</h5>
                                                                               
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Type : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->type : ""  }}</strong> </h5>
                                                                               
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Valeur a neuf (en FCFA) : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->valeur_neuf : ""  }} FCFA</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Valeur venale (en FCFA) : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->valeur_venale : ""  }} FCFA</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Garage Habituel : <strong>{{ $auto->carte_grise()->exists() ? $auto->carte_grise->garage_habituel : ""  }} FCFA</strong> </h5>
                                                                               
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <h5 for="Date_echeance">Zone : <strong>@if ($auto->carte_grise->zone == 1)
                                                                                    A
                                                                                @elseif($auto->carte_grise->zone == 2)
                                                                                B
                                                                                @else
                                                                                C
                                                                                @endif   </strong> </h5>
                                                                               
                                                                        </div>
                                                                        
                                                                </div>
        
                                                            </div>
                                                        </div>
                                        
                                                <div class="col-md-12">
                                                    <div class="form-inline col-md-3">
                                                        <h5 for="tarif">Tarif : <strong>Normal</strong></h5>
                                                       
                                                    </div>
                                                    @php
                                                        $garantis = \App\Repositories\AutomobileRepository::getAllGaranti($auto->id);
                                                        $categorie = \App\Repositories\AutomobileRepository::getCategorie($auto->id);
                                                        $total = 0;
                                                    @endphp
                                                    <div class="form-inline col-md-4">
                                                        <h5 for="tarif">Categorie : <strong>{{ $categorie->tarifs->categorie_tarif->description }}</strong> </h5>
                                                    </div>
                                                    <div class="form-inline col-md-5">
                                                        <h5 for="tarif">Conducteur Habituelle : <strong>{{ $auto->conducteur_habituel }}</strong></h5>
                                                      
                                                    </div>
        
                                                    
                                                   
                                                </div>
                                                <div class="col-md-12">

                                                        <div class="col-md-12">
                                                            <div class="box">
                                                                <div class="box-header">
                                                                    <h3 class="text-left"> <u>Garantis</u>  </h3>
                                                                </div>
                                                                <div class="box-body">
                                                                    <div class="col-md-12">
                                                                        <ol>
                                                                            @foreach ($garantis as $item)
                                                                            @php
                                                                              $total += $item->tarifs->prime_nette;
                                                                            @endphp
                                                                                <li>
                                                                                    <h5>{{ $item->garanti->Description }} :  <strong>{{ $item->tarifs->prime_nette }}</strong> FCFA</h5>
                                                                                </li>    
                                                                            @endforeach
                                                                                    
                                                                        </ol>
                                                                        <br>
                                                                        <h4 class="text-center">Total : <strong>{{ $total }} FCFA</strong></h4>
                                                                    </div>
            
                                                                </div>
                                                            </div>
                                                        </div>
                                                <div class="col-md-12 text-center">
                                                        <a class="btn btn-info " href="{{ route('auto_list_path') }}" >
                                                                Afficher la liste des Propositions automobile
                                                            </a>
                                                        <a class="btn btn-warning " href="{{ route('auto_edit_path', ['title' => $auto->numero,'id'=>$auto->id]) }}" >
                                                                Modifier les valeurs
                                                            </a>
                                                    <a class="btn btn-success " >
                                                        Imprimer
                                                    </a>
        
        
                                                </div>
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
    <script>
        function resetForm(id) {
            $('#' + id).val(function () {
                return this.defaultValue;
            });
        }
        ;

    </script>
@endsection()