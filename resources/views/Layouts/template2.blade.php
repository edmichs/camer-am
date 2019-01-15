<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | SOGECAR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <!--link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}"-->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-daterange-picker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-daterange-picker/daterangepicker.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
      #collection_perso{
        display: none;
      }

      #collection_perso .list div:hover{
        background-color: #e0e0e0;
        cursor: pointer;
      }

     #collection_user{
        display: none;
      }

      #collection_user .list div:hover{
        background-color: #e0e0e0;
        cursor: pointer;
      }

      #msg{
        color: white;
        position: fixed;;
        z-index: 9999;
        top: 5% !important;
        right: 1% !important;
      }

      .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
          background-color: #00a65a !important;
          border-color: #00a65a !important;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('libs/select2/css/select2.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{asset('libs/select2/select2.min.css')}}"> <!-- Customization -->
    @yield('css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!--div class="wrapper"-->
    <div id="wrapper">
      @include('Inc.header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('Inc.menu')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      @yield('content')
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <center>
          <strong>
            Copyright &copy; Assurance Maladie <small></small>
          </strong>
        </center>
      </footer>

      <div class="control-sidebar-bg"></div>
    </div>

    <div id="msg" style="display:none;padding: 1%;"></div>

    <div class="modal fade in" id="modal-danger" style="display: none;">
      <div class="modal-dialog">
        <form id="profile-form" method="POST" action="#">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Modification du profile...</h4>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- ./wrapper -->

    <script src="/libs/jquery/jquery-3.3.1.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('js/jspdf.min.js') }}"></script>
    <!-- Page script -->
    <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{asset('js/html2canvas.js')}}"></script>


    <script type="text/javascript">

      $('#modal-danger [data-dismiss="modal"]').click(function(){
        $('#modal-danger .modal-body').html('');
        $('#modal-danger').hide();
      });

      $('#profile-modif').click(function(e){
        var formObj = $('#profile-form');
        var formURL = formObj.attr('action');
        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('edit_profile', 'ok');

        $.ajax({
          url : formURL,
          type : 'POST',
          data : formData,
          processData: false,
          contentType: false,
          success:function(data){
            if (data == 0) {
              message("<h4> Echec de l'opération !</h4>", 'alert-danger pull-lg-right');
            }else{
              $('#modal-danger .modal-body').html(data);
              $('#modal-danger').show();
            }
          },
          error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            /*console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
            message("<h4> Echec de l'opération ! </h4>", 'alert-danger pull-lg-right');
          }
        });

        e.preventDefault();
        return false;
      });

      $('#profile-form').submit(function(e){
        var formObj = $('#profile-form');
        var formURL = formObj.attr('action');
        var formData = new FormData($('#profile-form')[0]);
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('profile', 'ok');

        $.ajax({
          url : formURL,
          type : 'POST',
          data : formData,
          processData: false,
          contentType: false,
          success:function(data){
            if (data == 0) {
              message("<h4> Echec de l'opération ! </h4>", 'alert-danger pull-lg-right');
            }else{
              $('#modal-danger').css('display', 'none');
              document.location.href = '/accueil';
              //$('#modal-danger .modal-body').html(data);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            //message("<h4> Echec de l'opération ! </h4>", 'alert-danger pull-lg-right');
          }
        });

        e.preventDefault();
        return false; 
      });

      function message(data, val){
        $('#msg').hide();
        $('#msg').html(data);
        $('#msg').addClass(val);
        $('#msg').fadeIn(1000, 'swing', function(){
            $('#msg').fadeOut(1000);
        });
      };

      $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();
        //$('.dataTables_filter').css('float', 'right');

        //Initialize Select2 Elements
        $('.select2').select2();

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
        //Money Euro
        $('[data-mask]').inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        );

        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        });

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        });
      });
    </script>
    <script src="{{asset('libs/select2/js/select2.min.js')}}"></script>
  </body>
</html>
