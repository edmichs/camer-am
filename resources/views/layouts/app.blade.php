<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration {{ config("app.name") }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="manifest" href="/manifest.json">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  --}}

<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">



    <!-- Material Design -->
    <link rel="stylesheet" href="/plugins/material-admin-lte/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="/plugins/material-admin-lte/dist/css/ripples.min.css">
    <link rel="stylesheet" href="/plugins/material-admin-lte/dist/css/MaterialAdminLTE.min.css">
    <!-- AdminLTE Material Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/plugins/material-admin-lte/dist/css/skins/all-md-skins.min.css">

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" />--}}
    {{--<link rel="stylesheet" href="/css/select2-materialize.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css" />--}}



    @yield('css')
    @stack('css')




</head>

<body class="skin-blue sidebar-mini">
@auth
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <b>{{ config("app.name") }}</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                {{--  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">  --}}
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img height="150" width="150" class="user-image" src="" alt="User profile picture">

                            {{--  <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                   class="user-image" alt="User Image"/>--}}
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    {{--  <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                           class="img-circle" alt="User Image"/>--}}
                                    <img class="img-circle" src="" alt="User profile picture">

                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('account.index') }}" class="btn btn-default btn-app">
                                            <i class="fa fa-user"></i>Profile</a>
                                    </div>
                                    <div class="pull-right">

                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-app"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>

@else
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <b>{{ config("app.name") }}</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                {{--  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">  --}}
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img height="150" width="150" class="user-image" src="/plugins/material-admin-lte/dist/img/avatar.png" alt="User profile picture">

                            {{--  <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                   class="user-image" alt="User Image"/>--}}
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Guest</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    {{--  <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                           class="img-circle" alt="User Image"/>--}}
                                    <img class="img-circle" src="/plugins/material-admin-lte/dist/img/avatar.png" alt="User profile picture">

                                    <p>
                                        Guest
                                        <small>Since {!! now()->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">

                                    <div class="pull-right">

                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-app"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Kamitbrains</a>.</strong> All rights reserved.
        </footer>

    </div>
@endif

<!-- jQuery 3.1.1 -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>--}}
{{--<script src="https://www.gstatic.com/firebasejs/5.5.2/firebase.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  --}}

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>--}}
{{--<script src="/plugins/material-admin-lte/dist/js/ripples.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>--}}
{{--<script src="/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/phone-codes/phone-{{config('app.locale')}}.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/hideseek/0.8.0/jquery.hideseek.min.js"></script>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.7/bootstrap-confirmation.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.29/dist/sweetalert2.all.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/trunk8/1.3.3/trunk8.min.js"></script>--}}
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
{{--<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}

<script src="/js/ajax-csrf.js"></script>
@yield('scripts')
@stack('js')

<!-- Material Design -->
<script src="/plugins/material-admin-lte/dist/js/material.min.js"></script>
<!-- GMAP API script-->
{{--<script src="https://maps.googleapis.com/maps/api/js?key={{ $key ?? env('GOOGLE_MAP_KEY')  }}&v=3&language={{ config('app.locale')  }}&libraries=places&callback=initMap"  async defer></script>--}}


<script>

    $(document).ready(function(e){


        if ($.material !== undefined) {
            $.material.init();

        }



    });

</script>

</body>
</html>