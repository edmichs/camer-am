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
                    <a href="{{ route('maladie_path') }}" class="btn btn-bitbucket"> Retour a la liste</a>
        
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
                                                        <h4>Information de la société</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12 ">
                                                                <div class="form-group  col-md-6">
                                                                    <label for="nom">Nom de la société : </label>
                                                                    <input type="text" name="nom" id="nom" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="nom_contact">Interlocuteur/Nom du contact
                                                                        <span>*</span> :</label>
                                                                    <input type="text" class="form-control"
                                                                           name="nom_contact" id="nom_contact"
                                                                           placeholder="Nom de l'interlocuteur" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="adresse">Adresse <span>*</span>
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Adresse" required onkeyup="autocompleteNom();" name="adresse"
                                                                           id="adresse">
                                                                </div>
                                                                <script>
                                                                    function autocompleteNom(){
                                                                       // console.log(document.getElementById("Nom").value);
                                                                        $("#assure").val(document.getElementById("Nom").value);
                                                                    }
                                                                </script>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Telephone">T&eacute;l&eacute;phone
                                                                        <span>*</span> :</label>
                                                                    <input type="tel" class="form-control"
                                                                           placeholder="telephone" name="Telephone"
                                                                           id="Telephone" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Email">Email</label>
                                                                    <input type="email" class="form-control"
                                                                           placeholder="email" name="Email" id="Email">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="numero_permis">Activite
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ex : W14*****" name="numero_permis"
                                                                           id="numero_permis">
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label for="Ville">Ville* :</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="ville" id="Ville" name="Ville" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="Pays">Pays</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="pays" id="Pays" name="Pays">
                                                                </div>
                                                            <p style="font-weight: bold; font-size: 1em">Population à assurer</p>
                                                            <div class="form-inline col-md-6" >
                                                                <label for="nombre_adultes">Nombre d&apos;adultes : </label>
                                                                <input type="number" class="form-control" name="adulte" id="adulte">
                                                            </div>
                                                            <div class="form-inline col-md-6" >
                                                                <label for="nombre_enfants">Nombre d&apos;enfants (-21 ans) : </label>
                                                                <input type="number" class="form-control" name="enfant" id="enfant">
                                                            </div>
                                                            <br><br><br>
                                                            </div>
                                                           
                                                        </div>
                                                       
                                                        <p class="text-left" style="margin-top: 5%">Les regrouper par catégorie socio-professionnelle (cadres, Agents de maitrise, Employés)</p>
                                                        <table class="table table-responsive table-bordered">
                                                            <thead>
                                                                <th>Catégorie</th>
                                                                <th>Cadres</th>
                                                                <th>Agents de maitrise</th>
                                                                <th>Employés</th>
                                                                <th >Total</th>
                                                                <th style="width: 25%">Taux de couverture</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                        <td>Employés</td>
                                                                        <td><input type="number" name="employe_cadre" id="employe_cadre" class="form-control"></td>
                                                                        <td><input type="number" name="employe_ag_maitrise" id="employe_ag_maitrise" class="form-control"></td>
                                                                        <td><input type="number" name="employe" id="employe" class="form-control"></td>
                                                                       <td><input type="number" name="employe_total" id="employe_total" class="form-control"></td>
                                                                       <td>
                                                                            <div class="form-group">
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="employe_taux_couverture" id="employe_taux_couverture1" value="100" >
                                                                                    100%
                                                                                   </label>
                                                                                
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="employe_taux_couverture" id="employe_taux_couverture2" value="90" >
                                                                                        90%
                                                                                    </label>
                                                                                
                                                                               
                                                                                     <label for="">
                                                                                        <input type="radio" name="employe_taux_couverture" id="employe_taux_couverture3" value="80" >
                                                                                        80%
                                                                                    </label>
                                                                                
                                                                              
                                                                                    <label for="">
                                                                                            <input type="radio" name="employe_taux_couverture" id="employe_taux_couverture4" value="70" >
                                                                                        70%
                                                                                    </label>
                                                                            </div>
                                                                        
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Conjoints</td>
                                                                        <td><input type="number" name="conjoint_cadre" id="conjoint_cadre" class="form-control"></td>
                                                                        <td><input type="number" name="conjoint_ag_maitrise" id="conjoint_ag_maitrise" class="form-control"></td>
                                                                        <td><input type="number" name="conjoint" id="conjoint" class="form-control"></td>
                                                                        
                                                                       <td><input type="number" name="conjoint_total" id="conjoint_total" class="form-control"></td>
                                                                       <td>
                                                                            <div class="form-group">
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="conjoint_taux_couverture" id="conjoint_taux_couverture1" value="100" >
                                                                                    100%
                                                                                   </label>
                                                                                
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="conjoint_taux_couverture" id="conjoint_taux_couverture2" value="90" >
                                                                                        90%
                                                                                    </label>
                                                                                
                                                                               
                                                                                     <label for="">
                                                                                        <input type="radio" name="conjoint_taux_couverture" id="conjoint_taux_couverture3" value="80" >
                                                                                        80%
                                                                                    </label>
                                                                                
                                                                              
                                                                                    <label for="">
                                                                                            <input type="radio" name="conjoint_taux_couverture" id="conjoint_taux_couverture4" value="70" >
                                                                                        70%
                                                                                    </label>
                                                                               
                                                                               
                                                                            </div>
                                                                        
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Enfants</td>
                                                                        <td><input type="number" name="enfant_cadre" id="enfant_cadre" class="form-control"></td>
                                                                        <td><input type="number" name="enfant_ag_maitrise" id="enfant_ag_maitrise" class="form-control"></td>
                                                                        <td><input type="number" name="enfant" id="enfant" class="form-control"></td>
                                                                        
                                                                       <td><input type="number" name="enfant_total" id="enfant_total" class="form-control"></td>
                                                                       <td>
                                                                            <div class="form-group">
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="enfant_taux_couverture" id="enfant_taux_couverture1" value="100" >
                                                                                    100%
                                                                                   </label>
                                                                                
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="enfant_taux_couverture" id="enfant_taux_couverture2" value="90" >
                                                                                        90%
                                                                                    </label>
                                                                                
                                                                               
                                                                                     <label for="">
                                                                                        <input type="radio" name="enfant_taux_couverture" id="enfant_taux_couverture3" value="80" >
                                                                                        80%
                                                                                    </label>
                                                                                
                                                                              
                                                                                    <label for="">
                                                                                            <input type="radio" name="enfant_taux_couverture" id="enfant_taux_couverture4" value="70" >
                                                                                        70%
                                                                                    </label>
                                                                               
                                                                               
                                                                            </div>
                                                                        
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Total</td>
                                                                        <td><input type="number" name="total_cadre" id="total_cadre" class="form-control"></td>
                                                                        <td><input type="number" name="total_ag_maitrise" id="total_ag_maitrise" class="form-control"></td>
                                                                        <td><input type="number" name="total" id="total" class="form-control"></td>
                                                                        
                                                                       <td><input type="number" name="total_total" id="total_total" class="form-control"></td>
                                                                       <td>
                                                                            <div class="form-group">
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="total_taux_couverture" id="total_taux_couverture1" value="100" >
                                                                                    100%
                                                                                   </label>
                                                                                
                                                                               
                                                                                    <label for="">
                                                                                        <input type="radio" name="total_taux_couverture" id="total_taux_couverture2" value="90" >
                                                                                        90%
                                                                                    </label>
                                                                                
                                                                               
                                                                                     <label for="">
                                                                                        <input type="radio" name="total_taux_couverture" id="total_taux_couverture3" value="80" >
                                                                                        80%
                                                                                    </label>
                                                                                
                                                                              
                                                                                    <label for="">
                                                                                            <input type="radio" name="total_taux_couverture" id="total_taux_couverture4" value="70" >
                                                                                        70%
                                                                                    </label>
                                                                               
                                                                               
                                                                            </div>
                                                                        
                                                                        </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>
                                                    <div class="form-inline" >
                                                        <h5 style="font-weight: bold">Etendue territoriale : </h5>
                                                        @foreach ($zone as $item)
                                                        <div class="radio" style="padding: 2%">
                                                            
                                                                <label for="">
                                                                        <input type="radio" name="zone" id="{{ $item->ID }}" value="{{ $item->ID }}" >
                                                                        {{ $item->Libelle }}
                                                                   </label>
                                                        </div>
                                                        @endforeach     
                                                    </div>
                                                    <div class="form-inline" >
                                                            <h5 style="font-weight: bold">Centre de soins : </h5>
                                                            @foreach ($centre_santes as $item)
                                                            <div class="radio" style="padding: 2%">
                                                                
                                                                    <label for="">
                                                                            <input type="radio" name="centre" id="{{ $item->ID }}" value="{{ $item->ID }}" >
                                                                            {{ $item->Nom }}
                                                                       </label>
                                                            </div>
                                                            @endforeach     
                                                    </div>
                                                    <div class="form-inline" >
                                                            <h5 style="font-weight: bold">Extensions des garanties  </h5>
                                                            <div class="col-md-12">
                                                                    <div class="radio" style="padding: 2%">
                                                                            Evacuation sanitaire et assistance : 
                                                                        <label for="">
                                                                            <input type="radio" name="centre" id="oui" value="oui" >
                                                                                   Oui
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio" style="padding: 2%">
                                                                         <label for="">
                                                                            <input type="radio" name="centre" id="non" value="non" >
                                                                                   Non
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                    <div class="radio" style="padding: 2%">
                                                                            Avez-vous déja été assuré ?  
                                                                        <label for="">
                                                                            <input type="radio" name="already_assure"  value="oui" >
                                                                                   Oui
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio" style="padding: 2%">
                                                                         <label for="">
                                                                            <input type="radio" name="already_assure"  value="non" >
                                                                                   Non
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            <div style="padding-left : 5%">
                                                                <div class="col-md-5">
                                                                        <label for="">
                                                                                Si oui, en quelle année ? <input type="number" name="already_assure_year" id="already_assure_year" class="form-control">
                                                                            </label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                        <label for="">
                                                                                Auprès de quelle compagnie : <input type="text" name="already_assure_compagnie" id="already_assure_compagnie" class="form-control">
                                                                             

                                                                            </label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="" >Montant de la prime payée : <input type="number" name="" id="" class="form-control"> FCFA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <label for="" >Montant des Remboursements perçus : <input type="number" name="" id="" class="form-control"> FCFA</label>
                                                                        <br><br>    
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                           
                                                            
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                            <label for="">Quels autres risques souhaiteriez vous assurer :</label>
                                                            <input type="text" name="other" id="other" class="form-control"> 
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