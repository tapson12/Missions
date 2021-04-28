@extends('layouts.parametragetemplate')

@section('content')

<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">
    <form action="{{url('/save-structure')}}" method="POST">
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
              <label for="">Structure</label>
              <select name="structure_id" id="structure_id"  class="form-control">
                @foreach ($structures as $structure)
                    <option value="{{$structure->id}}">{{$structure->libellestructure}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Signataire 1</label>
             <select name="signataire_1" id="" class="form-control" >
              @foreach ($agents as $agent)
              <option value="{{$agent->nom}} {{$agent->prenom}}">{{$agent->nom}} {{$agent->prenom}}</option>
              @endforeach
             </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Signataire 1</label>
              <select name="signataire_2" id=""  class="form-control">
                <option value=""></option>
                @foreach ($agents as $agent)
                <option value="{{$agent->nom}} {{$agent->prenom}}">{{$agent->nom}} {{$agent->prenom}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Distinction signataire 1</label>
              <input readonly  class="form-control" type="text" name="distinction_1" id="distinction_1">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Distinction signataire 2</label>
              <input readonly  class="form-control" type="text" name="distinction_2" id="distinction_2">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Activer</label>
              <input type="checkbox" name="activer" id="activer">
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