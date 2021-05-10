@extends('layouts.parametragetemplate')

@section('content')

<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">
    <form action="{{url('/update-password/'.$user->id)}}" method="POST">
        @csrf
        <div class="modal-header modal-header-designed">
            <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de lutiisateur {{$user->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="row">
          <div class="col-12">
            @if ($isegale)
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Le mot de passe de confirmation ne correspond pas !!!!
            </div> 
            @endif
          </div>
        </div>
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="nom_complet">Nom & prenom</label>
                    <input type="text" readonly value="{{$user->name}}" name="nom_complet" class="form-control @error('nom_complet') is-invalid @enderror" id="nom_complet" placeholder="Le nom & prenom">
                   
                  </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                  <label for="telephone">email</label>
                  <input type="text" readonly value="{{$user->email}}" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="nom_complet" placeholder="Le telephone">
                  
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="telephone">Nouveau mot de passe</label>
              <input type="password"  name="newpassword" class="form-control @error('telephone') is-invalid @enderror" id="nom_complet" placeholder="Nouveau mot de passse .....">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="telephone">Confirmer le  mot de passe</label>
              <input type="password"  name="newconfirmpassword" class="form-control @error('telephone') is-invalid @enderror" id="nom_complet" placeholder="Nouveau mot de passse .....">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-default">
              <div class="card-body">
                <button type="submit" class="btn btn-primary" href="#">Modifier <i class="fa fa-edit" style="color: white"></i></button>
                <a href="{{url('/users')}}" class="btn btn-danger">Annuller <i class="fa fa-reply" style="color: white"></i></a>
              </div>
            </div>    
          </div>
      </div>
    </form>
  
  
</div>
</div>



@endsection