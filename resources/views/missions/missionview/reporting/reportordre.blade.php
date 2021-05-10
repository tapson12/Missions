
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
        }

        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }

        th, td {
            padding-left: 5px;
        }

        </style>
    </br>
    <div class="container">
        <!--En tete-->
        <b>
        <div class="row">
            <div class="col-6" style="text-align: center;">
                @foreach ($hierachie as $item)
                {{mb_strtoupper($item->libellestructure,'UTF-8')}}
            </br> *****************************
                  </br>
                @endforeach
                <br><br><br><br>
                N° {{date('Y')}}/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/{{$mission->reference}}
            </div>
            <div class="col-6" style="text-align: center;" >
                BURKINA FASO</br>
                *************</br>
                Unité-Progrès-Justice</br></br>
               <div> {!! QrCode::size(100)->generate(date('Y').' '.$mission->id.' '.$mission->reference); !!}</div>
                <br>Ouagadougou le
            </div>
        </div>
        </b>
        <!--Fin en tete-->

        <!--Corps-->
        <div class="row">
            <div class="col-12" style="text-align: center;">
                </br></br>
                <H4><u><b>ORDRE DE MISSION TEMPORAIRE</b></u></H4></br>
                <i>Décret n°2016-1056/PRES/PM/MINEFID/MATDSI/MTMUSR du 14/11/2016 portant réglementation générale de l'utilisation des véhicules de l'Etat, de ces démenbrements et des autres organismes publics</i>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Je soussigné</b></br>
            </div>
            <div class="col-10" style="text-align: left;">
                </br>
                <b>:</b>
                <table style="width:99%; border: 0; border-collapse : collapse;" align="right">
                    <tr>
                        <td style="border: none;">Monsieur <b>Salifou OUEDRAOGO</b>, Ministre de l'Agriculture, des Aménagements Hydro-agricoles et de la Mécanisation, ordonne la mission qui suit:</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Objet</b></br>
            </div>
            <div class="col-10" style="text-align: left;">
            </br>
                <b>:</b>
                <table style="width:99%; border: 0; border-collapse : collapse;" align="right">
                    <tr>
                        <td style="border: none;">{{$mission->objet}}</td>
                    </tr>
                </table>
            </div>
        </div>
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
                        @if (count($mission->lieumission)>0 && count($mission->lieumission)>4)
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td>{{$mission->lieumission[$i]->region}}</td>
                            <td>{{$mission->lieumission[$i]->province}}</td>
                            <td>{{$mission->lieumission[$i]->commune}}</td>
                        </tr>
                        @endfor
                      @endif 

                      @if (count($mission->lieumission)>0 && count($mission->lieumission)<4)
                      @foreach ($mission->lieumission as $item)
                      <tr>
                          <td>{{$item->region}}</td>
                          <td>{{$item->province}}</td>
                          <td>{{$item->commune}}</td>
                      </tr>
                      @endforeach
                      
                    @endif 
                       
                       
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

                    @if (count($mission->agent)>5)
                    @for ($i = 0; $i < 5; $i++)
                    <tr>
                        <td>{{$mission->agent[$i]->nom}} {{$mission->agent[$i]->prenom}}</td>
                        <td>
                            
                            @empty(!$mission->agent[$i]->responsabilite)
                            {{$mission->agent[$i]->affectation[0]->responsabilite->code}}
                            @endempty
                        </td>
                        <td>{{$mission->agent[$i]->structure[0]->code}}</td>
                        <td>
                            @if ($mission->agent[$i]->matricule==$mission->chefmission)
                                <span>Chef de mission</span>
                            @endif
 
                            @if ($mission->agent[$i]->matricule==$mission->chauffeurmission)
                                <span>chauffeur</span>
                            @endif
                        </td>
                    </tr>
                    @endfor
                    @endif


                   @if (count($mission->agent)<5)
                   @foreach ($mission->agent as $agent)
                   <tr>
                       <td>{{$agent->nom}} {{$agent->prenom}}</td>
                       <td>
                           
                           @empty(!$agent->responsabilite)
                           {{$agent->affectation[0]->responsabilite->code}}
                           @endempty
                       </td>
                       <td>{{$agent->structure[0]->code}}</td>
                       <td>
                           @if ($agent->matricule==$mission->chefmission)
                               <span>Chef de mission</span>
                           @endif

                           @if ($agent->matricule==$mission->chauffeurmission)
                               <span>chauffeur</span>
                           @endif
                       </td>
                   </tr>
                   @endforeach
                   @endif
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Période</b></br>
            </div>
            <div class="col-2" style="text-align: left;">
                </br>
                <b>: Date de départ</b></br>
            </div>
            <div class="col-2" style="text-align: left;">
                </br>
                : {{date('d/m/Y', strtotime($mission->datedepart))}}</br>
            </div>
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Date de retour</b></br>
            </div>
            <div class="col-2" style="text-align: left;">
                </br>
                : {{date('d/m/Y', strtotime($mission->dateretour))}}</br>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Moyen de transport</b></br>
            </div>
            <div class="col-2" style="text-align: left;">
                </br>
                : {{$mission->vehicule->immatriculation}}</br>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Imputation budgétaire</b></br>
            </div>
            <div class="col-4" style="text-align: left;">
                </br>
                : Hébergement + Restauration</br>
                : Carburant + Déplacement</br>
            </div>
            <div class="col-3" style="text-align: left;">
                </br>
                <b>{{$mission->hebergement}}</b></br>
                <b>{{$mission->logement}}</b></br>
            </div>
        </div>
        <div class="row">
            <div class="col-1" style="text-align: left;">

            </div>
            <div class="col-4" style="text-align: center;">
                </br><br>
            
                
            
                @if ($mission->isordre==true)
                {{$signature1->structure[0]->profil}} par ordre
                @else
                @if ($mission->isinterim==true)
                {{$signature1->structure[0]->profil}}, le {{$signature1->structure[0]->libellestructure}} en mission,{{$signataireinterim1[0]->structure[0]->code}} assurant l'interim
                @else
                {{$signature1->structure[0]->profil}}
                @endif
                
                @endif

               

            </br>
            </div>
            <div class="col-2" style="text-align: left;">

            </div>
            <div class="col-4" style="text-align: Center;">
                </br><br>
                @if ($mission->isordre2==true)
                {{$signature2->structure[0]->profil}} par ordre
                @else
                @if ($mission->isinterim2==true)
                {{$signature2->structure[0]->profil}}, le {{$signature2->structure[0]->libellestructure}} en mission,{{$signataireinterim2[0]->structure[0]->code}} assurant l'interim
                @else
                {{$signature2->structure[0]->profil}}
                @endif
                
                @endif
                
            </div>
            <div class="col-1" style="text-align: left;">

            </div>
        </div>
    </br></br>
        <div class="row">
            <div class="col-1" style="text-align: left;">

            </div>
            <div class="col-4" style="text-align: center;">
                </br>
                <b><u>
                   @if ($mission->isinterim==true || $mission->isordre==true)
                   {{$signataireinterim1[0]->prenom}} {{$signataireinterim1[0]->nom}}
                   @else
                   {{$signature1->prenom}} {{$signature1->nom}} 
                   @endif
                    
                    
                </u></b></br>
            </div>
            <div class="col-2" style="text-align: left;">

            </div>
            <div class="col-4" style="text-align: Center;">
                </br>
                @if ($mission->isinterim2==true || $mission->isordre2==true)
                {{$mission->interimname2}}
                    <strong>{{$signataireinterim2[0]->prenom}} {{$signataireinterim2[0]->nom}}</strong>
                   @else
                   <strong>{{$signature2->prenom}} {{$signature2->nom}}</strong>
                   @endif
                <b><u> </u></b></br>
            </div>
            <div class="col-1" style="text-align: left;">

            </div>
        </div>
        </br>
        <!--Fin-->


        <div class="row">

        </div>
    </br></br>
    </div>
    
    @if (count($mission->agent)>1)
        
    <div class="container" style="margin-top: 20%;">
        <!--En tete-->
        <div class="row">
            <div class="col-12" style="text-align: center;">
                </br>
                <H4><u><b>LISTE ANNEXEE</b></u></H4></br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5><b> Référence de l'ordre de mission :    N° {{date('Y')}}/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/{{$mission->reference}}</b></h5></br>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align: center;">
            </div>
            <div class="col-6" style="text-align: center;" >
                <div> {!! QrCode::size(100)->generate(date('Y').' '.$mission->id.' '.$mission->reference); !!}</div>
            </div>
        </div>
        <!--Fin en tete-->

        <!--Corps-->

        </br>
        @if (count($mission->lieumission)>4)
        <div class="row">
            <div class="col-2" style="text-align: left;">
                </br>
                <b>Lieu(x)</b></br>
            </div>
            <div class="col-10" style="text-align: left;">
            </br>
                <b>:</b>
                    <table style="width:99%" align="right">
                        @for ($i = 5; $i <count($mission->lieumission); $i++)
                            <tr>
                                <td>{{$mission->lieumission[$i]->region}}</td>
                                <td>{{$mission->lieumission[$i]->province}}</td>
                                <td>{{$mission->lieumission[$i]->commune}}</td>
                            </tr>
                            @endfor
                      
                        
                    </table>
            </div>
        </div>
        @endif

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
                    @for ($i = 1; $i < count($mission->agent); $i++)
                    <tr>
                        <td>{{$mission->agent[$i]->nom}} {{$mission->agent[$i]->prenom}}</td>
                        <td>
                            @empty(!$mission->agent[$i]->responsabilite)
                            {{$mission->agent[$i]->affectation[0]->responsabilite->code}}
                            @endempty
                        </td>
                        <td>{{$mission->agent[$i]->structure[0]->code}}</td>
                        <td></td>
                    </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
    @endif
<br>br
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
