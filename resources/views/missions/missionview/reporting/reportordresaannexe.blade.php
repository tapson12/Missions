
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Logiciel de gestion des biens</title>


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
    <style>

        body{
            font-family: 'Century Gothic';
            src: url('fonts/Century Gothic.ttf');
            font-weight: normal;
            font-style: normal;
            background-image:url(img/filigrane-sif2.png);
        }

        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }

        th, td {
            padding-left: 5px;
        }

        </style>
    <div class="container">
        <!--En tete-->
        <div class="row">
            <div class="col-12" style="text-align: center;">
                </br>
                <H4><u><b>LISTE ANNEXEE</b></u></H4></br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5><b> R??f??rence de l'ordre de mission : N?? 2021/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/MAAHM/SG/P078/DGPV</b></h5></br>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align: center;">
            </div>
            <div class="col-6" style="text-align: center;" >
                <img src="{{asset('/img/artest.png')}}" alt="" style="width: 120px; height: 120px;"></br></br>
            </div>
        </div>
        <!--Fin en tete-->

        <!--Corps-->

        </br>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Lieu(x)</b></br>
            </div>
            <div class="col-10" style="text-align: left;">
            </br>
                <b>:</b>
                    <table style="width:99%" align="right">
                        <tr>
                            <th width=40% >REGION(S)</th>
                            <th width=25%>PROVINCE(S)</th>
                            <th>COMMUNE(S)</th>
                        </tr>
                        <tr>
                            <td>BOUCLE DU MOUHOUN</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>BOUCLE DU MOUHOUN</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>BOUCLE DU MOUHOUN</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Participants</b></br>
            </div>
            <div class="col-10" style="text-align: left;">
            </br>
                <b>:</b>
                <table style="width:99%" align="right">
                    <tr>
                        <th width=40%>MEMBRE(S)</th>
                        <th width=25%>FONCTION(S)</th>
                        <th>STRUCTURE(S)</th>
                        <th>STATUT</th>
                    </tr>
                    <tr>
                        <td>OUEDRAOGO Oumarou</td>
                        <td>Agent</td>
                        <td>DSI</td>
                        <td>Chef de mission</td>
                    </tr>
                    <tr>
                        <td>DIALLO Bassirou</td>
                        <td>Agent</td>
                        <td>DGPV</td>
                        <td>Chauffeur</td>
                    </tr>
                    <tr>
                        <td>DIALLO Bassirou</td>
                        <td>Agent</td>
                        <td>DGPV</td>
                        <td>Chauffeur</td>
                    </tr>
                    <tr>
                        <td>DIALLO Bassirou</td>
                        <td>Agent</td>
                        <td>DGPV</td>
                        <td>Chauffeur</td>
                    </tr>
                    <tr>
                        <td>DIALLO Bassirou</td>
                        <td>Agent</td>
                        <td>DGPV</td>
                        <td>Chauffeur</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

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

</body>
</html>
