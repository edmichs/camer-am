@extends('Layouts.template1')

@section('content')

    <div class="login-page">
        <div class="form">

            <img src="{{ asset('img/logo.jpg') }}" width="100%" height="100%" class="col-md-4 img-responsive">

            @if(session()->has('error'))
                <div class="alert-danger dissmissable" style="padding: 1%;margin-bottom:5%;"> Login/password incorrect(s) !</div>
            @endif


            <form id="form" class="login-form" action="{{ route("login") }}" method="POST">
              
                {{ csrf_field() }}
                <input type="text" placeholder="Identifiant" name="identifiant" />
                @if ($errors->has('identifiant'))
                    <span class="help-block">
                        <strong>{{ $errors->first('identifiant') }}</strong>
                    </span>
                @endif
                <input type="password" placeholder="Mot de passe" name="password" />
                @if(session()->has('password'))
                    <div class="row alert-warning dissmissable" style="padding: 1%;"> <center>{{ session('password') }}</center> </div>
                @endif

                <button type="submit">Se connecter</button>
            </form>

            <center style="margin-top: 4%;font-size:0.8em;"><a href="{{ route('password.request') }}">Mot de passe oublie ?</a></center>
        </div>
    </div>
@endsection