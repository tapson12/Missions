@extends('layouts.template')

@section('content')
<div class="container">
    <style>
        .dropdown-toggle::after {
            content: none;
        }
    </style>
    <div class="row">
        <div class="col-7" style="margin-left: -50%">
            <strong style="font-size: 0.7cm;color:#A0351E;" >Système de gestion des Biens du MAAHM</strong>
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

                    <a  href="{{url('/parametrage')}}">
                        <i class="fas fa-user-cog fa-4x"></i>
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
                   <a href="{{url('/agents')}}"> <img src="{{asset('/img/users.png')}}" alt=""></a> <br>
                   <strong>GESTION DU PERSONNEL</strong>
                </div>
                <div class="col-6">

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('/img/avions.png')}}" class="img-circle" style="border:2px black solid" alt="">
                          </a>
                          <br>
                          <div style="text-align: center; margin-left: -50%;"><strong>GESTION DES DEPLACEMENTS <br> (MISSIONS)</strong></div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{ url('/missioninterne') }}">Mission interne</a>
                          <a class="dropdown-item" href="#">Mission externe</a>
                          <a class="dropdown-item" href="#">Paramètre</a>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2%" style="display: none">
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
       <div class="col-1">
           <img src="{{asset('/img/logo.jpg')}}" alt="">
       </div>
       <div class="col-9" style="margin-top: 2%;">
           <span  style="font-size: 0.5cm;font-weight: bold;">MINISTERE DE LAGRICULTURE ET DES AMENAGEMENTS HYDRO-AGRICOLES ET DE LA MECANISATION</span>
       </div>
       <div class="col-1" style="margin-top: 1%">




    </div>
       <div class="col-1" style="margin-top: 1%">
           <a href="#">
               <img src="{{asset('/img/password.png')}}" alt="">
           </a>
       </div>

   </div>

</div>
@endsection
