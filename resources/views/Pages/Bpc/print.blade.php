@extends('Layouts.print-template')
@section('css')
    <style>
        .undl {
            display: inline-block;
            width:auto;
            color: #0a0a0a;
            border-bottom: 2px solid grey  !important;
        }
    </style>
@endsection

@section('content')



    <div class="content" style="margin: 2.54cm 0.54cm; border: 1px solid black; border-radius: 2.54cm; padding: 1cm 0.54cm">

        <table class="table">
            <tr>
                <td>
                    <table class="table">
                        <tr>
                            <th><span class="undl">POLICE</span></th>
                        </tr>
                        <tr>
                            <td>
                                <div><b>Numéro Police: </b><span>xxxxxxxxxxxxxxxxxxxx</span></div>
                                <div><b>Exercice fiscal: </b><span>xxxxxx</span></div>
                            </td>
                            <td>
                                <div><b>Numéro Police: </b><span>xxxxxxxxxxxxxxxxxxxx</span> </div>
                                <div>
                                    <b>Date effet: </b>: <span>xxxxxx</span>
                                    <b>Date échéance: </b><span>xxxxxx</span>
                                </div>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table">
                        <tr>
                            <th><span class="undl">ASSURÉ</span></th>
                        </tr>
                        <tr>
                            {{--<td><div><span>xxxxxxxxxxxxxxxxxxxxxxxxx</span></div></td>--}}
                            <td><div><b>Matricule/Ref: </b><span>xxxxxxxxxxxxxxxxxxxx</span></div></td>
                        </tr>
                        <tr>
                            <td>
                                <div><b>Date Naissance: </b><span>xxxxxx</span></div>
                                <div><b>Code Affection: </b><span>xxxxxx</span></div>
                                <div><b>Hauteur couverture: </b><span>xxxxxx</span></div>
                            </td>
                            <td>
                                <div><b>Lieu Naissance: </b><span>xxxxxxxxxxxxxxxxxxxx</span> </div>
                                <div>&nbsp;</div>
                                <div>
                                    <b>Plafond: </b>: <span>xxxxxx</span>
                                    <b>Encours: </b><span>xxxxxx</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div><b>Date survenance: </b><span>xxxxxxxxxxxxxxxxxxxx</span></div></td>
                            <td><div><b>Date déclaration : </b><span>xxxxxxxxxxxxxxxxxxxx</span></div></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table">
                        <tr>
                            <td>
                                <div>
                                    <p>1. HOSPITALISATION</p>
                                    <p>2. HONORAIRES MEDECIN</p>
                                    <p>3. SOINS EXTERNES</p>
                                    <p>4. ANALYSES MEDICALES</p>
                                    <p>5. ACCOUCHEMENT</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table">
                        <tr>
                            <th><span class="undl">CENTRE DE SANTE</span></th>
                            <th><span class="undl">MEDECIN CONSEIL</span></th>
                        </tr>
                        <tr>
                            <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                            <td>
                                <div>xxxxxxxxxxxxxxxxxxxxxxxxxx</div>
                                <div>(Tél) xxxxxxxxxxxx</div>
                                <div>(Email) xxxxxxxxxxxxxxxxxxx</div>
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>

        </table>

    </div>
@endsection
