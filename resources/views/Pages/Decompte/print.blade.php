@extends('Layouts.print-template')
@section('css')
    <style>
        .undl {
            display: inline-block;
            width:auto;
            color: #0a0a0a;
            border-bottom: 2px solid grey  !important;
        }
        .undl2 {
            display: inline-block;
            width:auto;
            color: #0a0a0a;
            border-bottom: 2px solid grey  !important;
            height: 1.2cm;
        }
    </style>
@endsection

@section('content')

    <div class="content" style="margin: 2.54cm 0.54cm 0; border: 1px solid black; border-radius: 2.54cm 0; padding: 0.44cm 0.54cm 1cm 0.54cm">
        <h4 class="undl" style="margin-left: 3cm;">DECOMPTE</h4>
        <table class="table">
            <tr>
                <td>
                    <table class="table">
                        <tr style="border: none">
                            <td>
                                <div><b>N° Decompte: </b><span>Auto</span></div>
                            </td>
                            <td>
                                <div><b>Exercice fiscal: </b><span>xxxxxx</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div><b>Type Garantie: </b><span>xxxxxxxxxxx (Maladie/Obseques/Deces)</span></div>
                                <div><b>Numéro Police: </b><span>xxxxxxxxxxxxxxxxxxxx  (Affichage Police Maladie pour Hysacam Edéa)</span></div>
                                <div><b>Matricule/Réf: </b><span> xxxxxxxxxxx      xxxxxxxxxxxxxxxxxxxxxxx</span></div>

                            </td>
                        </tr>
                        <tr >
                            <td>
                                <div><b>Date naissance: </b><span>xxxxxxxxxxx</span></div>
                                <div><b>N°BPC: </b><span>AAAAAAAAAA</span></div>
                                <div><b>Déclaré le: </b><span>xxxxxxxxxxx</span></div>
                                <div><b>Numéro Facture: </b><span>xxxxxxxxxxx</span></div>
                                <div><b>Nb de pièces: </b><span>xxxxx</span></div>
                                <div><b>Catégorie affection: </b><span>xxxxx</span></div>
                            </td>
                            <td>
                                <div>
                                    <b>Plafond: </b>: <span>xxxxxx</span>
                                    <b>Encours: </b><span>xxxxxx</span>
                                </div>
                                <div><b>Bénéficiaire : </b><span>xxxxxx</span></div>
                                <div><b>Survenu le : </b><span>xxxxxx</span></div>
                                <div><b>Mt Facture: </b><span>xxxxxx</span></div>
                                <div><b>Description soins: </b><span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span></div>
                                <div><b>Nom médecin traitant: </b><span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table">
                        <tr >
                            <td>
                                <div><b>Catégorie affection: </b><span>xxxxx</span></div>
                                <div><b>Catégorie prestation/acte: </b><span>xxxxx</span></div>
                            </td>
                            <td>
                                <div><b>Description soins: </b><span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span></div>
                                <div><b>Nom médecin traitant: </b><span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span></div>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2">
                                <div><b>Zone (Z. géographique)</b><span>xx xxxxxxxxxxxxxxxxx</span></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr >
                <td colspan="2" style="height: 2cm;">
                    <p>&nbsp;</p>
                </td>
            </tr>
          </table>
    </div>
    <div class="content">
        <table style="margin: 0 0.54cm 2.54cm; ">
            <tr>
                <td>
                    <small>Listes des prestations à rembourser d’un décompte affiché au fur et à mesure</small>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table is-striped is-fullwidth">
                        <thead>
                        <tr>
                            <th>
                                <small class="undl2">Code prestat°</small>
                            </th>
                            <th>
                                <small class="undl2">Libellé prestation </small>
                            </th>
                            <th>
                                <small class="undl2">Plafond</small>
                            </th>
                            <th>
                                <small class="undl2">Taux</small>
                            </th>
                            <th>
                                <small class="undl2">Unité</small>
                            </th>
                            <th>
                                <small class="undl2">Mt déclaré </small>
                            </th>
                            <th>
                                <small class="undl2">Mt Facture </small>
                            </th>
                            <th>
                                <small class="undl2">Mt retenu </small>
                            </th>
                            <th>
                                <small class="undl2">Mt  à payer </small>
                            </th>
                            <th>
                                <small class="undl2">Rejet</small>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            {{--Item--}}
                            <tr>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>XX</div>
                                </td>
                                <td>
                                    <div>XX</div>
                                </td>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>XXXXXX</div>
                                </td>
                                <td>
                                    <div>N</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <div style="font-size: 10px"> <b>Motif rejet: </b><span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span></div>
                                </td>
                            </tr>
                            {{--/.Item--}}
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
@endsection
