@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7" style="margin-left: -50%">
            <strong style="font-size: 0.7cm;color:#A0351E;" >Système de gestion des Biens du MAAH</strong>
        </div>
        <div class="col-2" style="margin-left: 75%">
            <img src="{{asset('/img/logo_dsi.png')}}" alt="">
        </div>
    </div>
  
    <div class="row" style="margin-left: -45%; margin-top: 5%;">
        <div class="col-4">
            <div class="row">
                <div class="col-6">
                  <a href="#"> <img src="{{asset('/img/keys.png')}}" alt=""><br><span>Changer votre <br> mot de passe</span></a>
                  
                </div>
            </div>
            <div class="row" style="margin-top: 5%;">
                <div class="col-6">
                    <a href="#">
                        <i class="fa fa-question-circle fa-3x"></i><br>
                        <span align='center'>Ouvrir le fichier <br> d aide</span>
                    </a>
                </div>
            </div>
            <div class="row" style="margin-top: 15%;">
                <div class="col-6">
                    <a href="#"><i class="fa fa-power-off fa-3x" style="color: red"></i></a>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="row">
                <div class="col-6">
                   <a href="#"> <img src="{{asset('/img/users.png')}}" alt=""></a> <br>
                   <strong>GESTION DU PERSONNEL</strong>
                </div>
                <div class="col-6">
                    
                   <a href="#"> <img src="{{asset('/img/avions.png')}}" class="img-circle" style="border:2px black solid" alt=""></a>
                   <br>
                   <strong>GESTION DES DEPLACEMENTS <br> (MISSIONS)</strong>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <div class="col-6">
                   <a href="#"> <img src="{{asset('/img/stations.png')}}" alt="" class="img-circle" style="border:2px black solid"></a>
                   <br> <strong>DOTATION CARBURANT</strong>
                </div>
                <div class="col-6">
                   <a href="#"> <img src="{{asset('/img/money.png')}}" class="img-circle" style="border:2px black solid" alt=""></a>
                    <br>
                    <strong>RETRIBUTION</strong>
                </div>
            </div>
        </div>
    </div>

   <div class="row" style="margin-left:-60%; ">
       <div class="col-12">
        <hr style="border-top: 2px solid;">
       </div>
   </div>

   <div class="row" style="margin-left:-50%; ">
       <div class="col-2">
           <img src="{{asset('/img/logo.jpg')}}" alt="">
       </div>
       <div class="col-8" style="margin-top: 2%;margin-left: -5%;">
           <span  style="font-size: 0.5cm;font-weight: bold;">MINISTERE DE LAGRICULTURE ET DES AMENAGEMENT HYDRO-AGRICOLE ET DE LA MECANISATION</span>
       </div>

       <div class="col-2" style="margin-top: 1%;margin-right:-60%;">
           <a href="#">
               <img src="{{asset('/img/password.png')}}" alt="">
           </a>
       </div>
   </div>

</div>
@endsection
