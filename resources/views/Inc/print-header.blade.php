<table class="table table-borderless table-danger " style="border : 2px solid black">
        <tbody>
            <tr>
                <td style="width:30%;border : 2px solid black"><img src="{{ asset('img/logo.jpg') }}" style="width:180px; height:150px"  class="col-md-4 img-responsive"></td>
                <td style="border : 2px solid black" >
                   
                        <h3>Nom de l&apos;intermédiaire : <strong>{{ Auth::user()->name }}</strong></h3>
                        <h3>Code : <strong>{{ Auth::user()->identifiant }}</strong></h3>
                   
                </td>
                <td style="width: 30%;border : 2px solid black" class="text-center"><h4><u>N&deg; DE PROPOSITION </u> </h4> <br> <h3><strong>{{ $auto->numero }}</strong></h3> </td>
            </tr>
        </tbody>
    </table>