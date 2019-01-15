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



    <div class="content" style="margin: 2.54cm 0.54cm; border: 1px solid black; border-radius: 2.54cm; padding: 0.44cm 0.54cm 1cm 0.54cm">
        <h4 class="undl" style="margin-left: 3cm;">VALIDATION REMBOURSEMENTS</h4>
        <table class="table">
            <tr>
                <td>
                    <table class="table">
                        <tr style="border: none">
                            <td>
                                <div><b>Exercice fiscal: </b><span>xxxxxx</span></div>
                            </td>
                            <td>
                                <div><b>Numéro Police: </b><span>xxxxxxxxxxxxxxxxxxxx</span></div>
                            </td>
                            <td>
                                <div><b>Mode règlement: </b><span>xxxxxxxxxxxxxxxxxxxx</span> </div>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <small>Affichage de la première ligne ci-dessous en modfication  (Premier décompte de la police)<br>
                        (Mt retenu et Mt à payer sont des rubriques calculées)</small>
                </td>
            </tr>
            <tr>
                <td>
                    <div><b>Décompte OK pour remboursement (O/N) :</b> <span>x</span></div>
                    <div><b>Référence paiement : </b><span>xxxxxx</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    <small>Listes des Factures à rembourser (Tous les décomptes d’une police sont affichés au fur et à mesure)</small>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table is-striped is-fullwidth">
                        <thead>
                            <tr>
                                <th>
                                    <small class="undl2">N° Déc</small>
                                </th>
                                <th>
                                    <small class="undl2">N° Facture</small>
                                </th>
                                <th>
                                    <small class="undl2">Bénéficiaire</small>
                                </th>
                                <th>
                                    <small class="undl2">Déclaré le </small>
                                </th>
                                <th>
                                    <small class="undl2">Survenu le </small>
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
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                            <td>
                                <div>N° Déc</div>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </td>
            </tr>

        </table>

    </div>
@endsection
