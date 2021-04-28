@extends('layouts.parametragetemplate')

@section('content')

<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">
    <form action="{{url('/update-structure/'.$updatestructure->id)}}" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header modal-header-designed">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une structure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Sigle</label>
                <input  type="text" value="{{$updatestructure->code}}"   name="code" id="" class="form-control" placeholder="Le sigle de la structure" aria-describedby="helpId" required>
                <small id="helpId" class="text-muted" ><span style="color: red">le sigle de la structure est obligatoire</span></small>
              </div>
            </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Structure</label>
              <input  type="text" value="{{$updatestructure->libellestructure}}"   name="libellestructure" id="" class="form-control" placeholder="Le libelle de la structure" aria-describedby="helpId">
              <small id="helpId" class="text-muted" ><span style="color: red">le libelle de la structure ne doit pas être vide</span></small>
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Profil</label>
              <input type="text" value="{{$updatestructure->profil}}"    name="profil" id="" class="form-control" placeholder="Le profil de la structure" aria-describedby="helpId" required>
              <small id="helpId" class="text-muted" ><span style="color: red">le profil de la structure ne doit pas être vide</span></small>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Type de structure</label>
             <select name="type_structure_id" id="" class="form-control" >
              @foreach ($types as $type)
              <option @if ($updatestructure->typestructure->id==$type->id)
                  selected
              @endif value="{{$type->id}}">{{$type->libellestructure}}</option>
              @endforeach
             </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Structure parent</label>
              <select name="structure_id" id=""  class="form-control">
                <option value=""></option>
                @foreach ($structures as $structure)
               <option  value="{{$structure->id}}">{{$structure->libellestructure}}</option>
               @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{url('/structures')}}" class="btn btn-warning" data-dismiss="modal">Quitter <i class="fa fa-arrows" aria-hidden="true"></i></a>
        <button type="submit" class="btn btn-success">Sauvegarder <i class="fa fa-save" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>


</div>
</div>



@endsection
