
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Gestion des biens - Missions</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/js/example-styles.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/print.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('styles/accueil_style.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-white navbar-light" style="background-color: #F3F2F2;color: black">

    <a class="navbar-brand" href="{{url('/home')}}">
      <i class="fa fa-home fa-3x" style="color: green"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">


        <li class="nav-item dropdown">
          <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-cog fa-2x icon_color"></i>Structures
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{url('/type-structure')}}">type structure</a>
            <a class="dropdown-item" href="{{url('/structures')}}">structures</a>

          </div>
        </li>



        <li class="nav-item dropdown">
          <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-user fa-2x icon_color"></i>Agents
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('/agents')}}">Agent</a>
            <a class="dropdown-item" href="{{url('/type-agent')}}">Type agents</a>
            <a class="dropdown-item" href="{{url('/fonction')}}">Fonctions</a>
            <a class="dropdown-item" href="{{ url('/responsabilite') }}">Responsabilit??s</a>
            <a class="dropdown-item" href="{{ url('/source-financement') }}">Source Financement</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-home fa-2x icon_color"></i> D??coupage administratif
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('/region')}}">Region</a>
            <a class="dropdown-item" href="{{url('/province')}}">Province</a>
            <a class="dropdown-item" href="{{ url('/commune') }}">Commune</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-users fa-2x icon_color"></i>Utilisateurs
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('/users')}}">Utilisateurs</a>
            <a class="dropdown-item" href="{{url('/kits')}}">Droits</a>
            <div class="dropdown-divider"></div>
          </div>
        </li>

        <li class="nav-item dropdown">
            <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fa fa-car fa-2x icon_color"></i> V??hicules
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('/type-vehicule')}}">Type v??hicule</a>
              <a class="dropdown-item" href="{{url('/vehicule')}}">V??hicule</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>

          <li>
            <a href="{{url('/signataire')}}" class="nav-link">
             <i class="fa fa-user fa-2x icon_color"></i>Signataire
            </a>

          </li>


      </ul>

    </div>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4">

  </div>
   <div class="col-lg-8 col-md-8 col-sm-8">
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
   <section class="content">
    <div class="container-fluid">
      @yield('content')
    </div>
   </section>
     </div>
   </div>
  </div>
</div>

<div class="row" style="margin-top: 20%;">

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('dist/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('dist/js/scriptdatable.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('dist/js/verifier.js')}}"></script>
<script src="{{asset('dist/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('dist/js/jquery.multi-select.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{asset('dist/js/print.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dist/js/savestructure.js')}}"></script>
<script src="{{asset('dist/js/select2digned.js')}}"></script>
<script src="{{asset('dist/js/selectscript.js')}}"></script>
<script src="{{asset('dist/js/statistique.js')}}"></script>
<script src="{{asset('dist/js/signatures.js')}}"></script>
<script src="{{asset('dist/js/mission.js')}}"></script>
<script src="{{asset('dist/js/selectmembremission.js')}}"></script>
</body>
</html>

  </div>
</div>
