
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>LOGICIEL DE GESTION DES BIENS</title>

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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-image:url({{url('img/background-image.jpg')}}); background-repeat: no-repeat; background-position: fixed; -webkit-background-size: cover;-webkit-filter: cover;">
<div class="wrapper">
<div class="row">
    <div class="col-12">
       <div style="margin-left: 35%;  margin-top: 4%;height: 100px">
    <div class="login-box" >
<!-- /.login-logo -->
<div class="card" style="height: 518px">
<div class="card-body login-card-body">
<div class="row">
    <div class="col-11">
        <p align='center' class="login-box-msg"><img src="{{asset('img/logo.jpg')}}"  style="height: 100px;"></p>

<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="col-12">
    @if ($errors->has('email'))
        <span class="help-block" style="color: red;">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<br><br>
<div class="input-group mb-3">
  <input type="email" name="email" class="form-control" placeholder="nom dutilisateur">
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-user fa-1x" style="color: #976F28"></span>
    </div>
  </div>
</div>
<div class="input-group mb-3">
  <input type="password" class="form-control" placeholder="Mot de passe" type="password" name="password" required autocomplete="current-password">
  <div class="input-group-append">
    <div class="input-group-text">
        <span class="fas fa-key fa-1x" style="color: #976F28"></span>
    </div>
  </div>
</div>

  <div class="row">
      <div class="col-12">

    <button type="submit" class="btn btn-success btn-lg btn-block">identifier</button>
  </div>
</br>

  <div class="col-12" style="margin-top: 8%">

    <p align='center' class="login-box-msg"><img src="{{asset('img/logo_dsi.png')}}"></p>  </div>

  </div>
<div class="row" style="margin-top: 2%;">
  <div class="col-12">
    <div class="icheck-primary">
      <input id="remember_me" name="remember" type="checkbox" id="remember">
      <label for="remember">
        Se souvenir de moi
      </label>
    </div>
  </div>
  <!-- /.col -->

  <!-- /.col -->
</div>
{{--  <p class="mb-1">
        <a href="forgot-password.html">mot de passe oublié ?</a>
     </p>   --}}
</form>

</div>
    <div class="col-1">
         <div style="border-left: 30px solid green; height: 500px;"></div>
    </div>
</div>
</div>
<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->
</div>
    </div>
</div>
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
<script src="{{asset('dist/js/saveComposition.js')}}"></script>
<script src="{{asset('dist/js/select2digned.js')}}"></script>
</body>
</html>
