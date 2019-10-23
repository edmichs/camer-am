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
        <h1>
            Proposition de contrat d&apos;assurance maladie
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('accueil_path') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Contrat assurance maladie</li>
        </ol>
        @if(session('message'))
            <div class="row">
                <div class="alert alert-warning">{{session('message')}}</div>
            </div>
        @endif
    </section>
    <div class="row">
            <div class="col-md-12" style="padding: 2% 0 0 5%">
                    <a href="{{ route('retraite_path') }}" class="btn btn-bitbucket"> Retour a la liste</a>
        
            </div>
    </div>
    

    <!-- Main content -->
    <section class="content">
        <!--Form Advance-->
        @if($exercice != null)
            <div class="row">
                <form id="form" method="POST" action="{{route('auto_add_path')}}" class=" col s12 m12 l12">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="box ">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        
                                            <div class="col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                            <h2 class="text-center" style="font-weight: bold">Bulletin individuel d&apos;adhesion</h2>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">
                                                            <h3 class="text-center"><u>Renseignements sur l&apos;assuré </u></h3>
                                                            <div class="col-md-12 ">
                                                                <div class="form-group  col-md-6">
                                                                    <label for="titre">Titre : </label>
                                                                    <select name="titre" id="titre" class="form-control">
                                                                        <option value="M">M</option>
                                                                        <option value="Mme">Mme</option>
                                                                        <option value="Mlle">Mlle</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="nom">Nom
                                                                        <span>*</span> :</label>
                                                                    <input type="text" class="form-control"
                                                                           name="nom" id="nom"
                                                                           placeholder="Nom" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="nom_jeune_fille">nom de jeune fille 
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="nom de jeune fille" required onkeyup="autocompleteNom();" name="nom_jeune_fille"
                                                                           id="nom_jeune_fille">
                                                                </div>
                                                                <script>
                                                                    function autocompleteNom(){
                                                                       // console.log(document.getElementById("Nom").value);
                                                                        $("#assure").val(document.getElementById("Nom").value);
                                                                    }
                                                                </script>
                                                                <div class="form-group col-md-12">
                                                                    <label for="prenom">Prénom
                                                                        <span>*</span> :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="prenom" name="prenom"
                                                                           id="prenom" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="datenaiss">Date de naissance</label>
                                                                    <input type="date" class="form-control"
                                                                           placeholder="date" name="datenaiss" id="datenaiss">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="lieunaiss">Lieu
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Lieu de naissance" name="lieunaiss"
                                                                           id="lieunaiss">
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label for="Profession">Profession * :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Profession" id="Profession" name="Profession" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="adresse">Adresse</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Adresse" id="adresse" name="adresse">
                                                                </div>
                                                                
                                                            </div>
                                                           
                                                            <h3 class="text-center"><u>Modalités d&apos;adhesion</u></h3>
                                                            <div class="col-md-12 ">
                                                                <div class="form-group  col-md-6">
                                                                    <label for="date_effet">Date effet : </label>
                                                                    <input name="date_effet" type="date" id="date_effet" class="form-control" required>
                                                                       
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="date_echeance">date_echeance
                                                                        <span>*</span> :</label>
                                                                    <input type="date" class="form-control"
                                                                           name="date_echeance" id="date_echeance"
                                                                           placeholder="date_echeance" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="date_adhesion">Date de l&apos;adhesion 
                                                                        :</label>
                                                                    <input type="date" class="form-control"
                                                                           placeholder="nom de jeune fille" required onkeyup="autocompleteNom();" name="date_adhesion"
                                                                           id="date_adhesion">
                                                                </div>
                                                                <script>
                                                                    function autocompleteNom(){
                                                                       // console.log(document.getElementById("Nom").value);
                                                                        $("#assure").val(document.getElementById("Nom").value);
                                                                    }
                                                                </script>
                                                                <div class="form-group col-md-6">
                                                                    <label for="age_retraite">Age prévu pour la retraite
                                                                        <span>*</span> :</label>
                                                                    <input type="number" class="form-control"
                                                                            name="age_retraite"
                                                                           id="age_retraite" required>
                                                                </div>
                                                            </div>
                                                      
                                                            <h3 class="text-center"><u>Paiement des primes</u></h3>
                                                            <div class="col-md-12 ">
                                                                <div class="checkbox col-md-3">
                                                                    <label ><input type="checkbox" name="prime_periodique" id="prime_periodique" >Primes Periodiques : </label>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="montant_prime">montant prime
                                                                        <span>*</span> :</label>
                                                                    <input type="number" class="form-control"
                                                                           name="montant_prime" id="montant_prime"
                                                                           placeholder="montant prime" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="checkbox col-md-3">
                                                                        <label ><input type="checkbox" name="versement_libre" id="versement_libre" >Versement Libre : </label>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                        <label for="montant_prime">montant du versement initial
                                                                            <span>*</span> :</label>
                                                                        <input type="number" class="form-control"
                                                                               name="montant_prime" id="montant_prime"
                                                                               placeholder="montant prime" required>
                                                                </div>
                                                                <div class="col-md-3" style="margin-top: 3%">
                                                                    <label  for="">Minimum : 100 000 FCFA</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Fractionnement</td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="fractionnement" id="fractionnement">Annuel</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="fractionnement" id="fractionnement">Semestriel</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="fractionnement" id="fractionnement">Trimestriel</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="fractionnement" id="fractionnement">Mensuel</label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Mode de paiement</td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="mode_paiement" id="mode_paiement">Espèces</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="mode_paiement" id="mode_paiement">Banque</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="mode_paiement" id="mode_paiement">Salaire</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="radio">
                                                                                    <label for=""><input type="radio" name="mode_paiement" id="mode_paiement">Autres</label>
                                                                                </div>                                                                                
                                                                            </td>
                                                                            </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <h3 class="text-center"><u>Options Au thermes</u></h3>
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class=" checkbox">
                                                                                        <label ><input type="checkbox" name="prime_periodique" id="prime_periodique" >capital </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class=" checkbox">
                                                                                        <label ><input type="checkbox" name="rente_certaine" id="rente_certaine"  >Rente Certaine </label>
                                                                                  </div>
                                                                                </td>
                                                                                <td>
                                                                                <label >Durée de paiement : <input type="text" name="rente_certaine" id="rente_certaine" >
                                                                                    </label>
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                        <div class="form-group">
                                                                            <div class=" checkbox col-md-3">
                                                                                <label ><input type="checkbox" name="rente_viagere" id="rente_viagere" >Rente Viagère </label>
                                                                            </div>
                                                                                <div class="radio col-md-9" >
                                                                                    Reversibilité de la rente : 
                                                                                    <label for="">
                                                                                        <input type="radio" name="reversibilite_rente" class="radio" value="oui" >
                                                                                            Oui
                                                                                     </label>
                                                                                     <label for="">
                                                                                            <input type="radio" name="reversibilite_rente"  class="radio" value="non" >
                                                                                          Non
                                                                                        </label>
                                                                                </div>
                                                                              
                                                                            
                                                                                    
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <div class="col-md-3">
                                                                                    <label >Taux : <input type="number" name="taux" id="taux" > </label>
                                                                                </div>
                                                                                    <div class="col-md-9" >
                                                                                        <label for=""> Age du conjoint :
                                                                                            <input type="number" name="reversibilite_rente" >
                                                                                         </label>
                                                                                </div>
                                                                                <br><br><br>

                                                                               
                                                                        </div>
                                                                
                                                            </div>

                                                            <h3 class="text-center"><u>Bénéficiaire en cas de deces</u></h3>
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                               <label for=""> Mon conjoint, à défaut mes enfants par part égales, à defaut mes ascendants, à défaut mes ayants-droit légaux. 
                                                                   si cette formule ne convient pas, indiquer ci dessous les beneficiaires désignés :</label> 
                                                                   <textarea name="" id="" cols="120" rows="10"></textarea>
                                                                 </div>
                                                        
                                                            </div>

                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                       
                                    </div>
                                   
                                    <div class="col-md-12" >
                                            <button class="btn btn-success" style="width: 100%" type="submit">Soumettre</button>
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