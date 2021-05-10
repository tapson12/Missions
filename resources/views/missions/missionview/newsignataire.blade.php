@extends('layouts.parametragetemplate')

@section('content')

<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">
    <form action="{{url('/save-signature')}}" method="POST">
      <input type="text" value="{{csrf_token()}}" name="_token" id="token" hidden="true">
      <input type="text" name="id" id="id" hidden>
    <div class="modal-content">
      <div class="modal-header modal-header-designed">
        <h5 class="modal-title" id="exampleModalLabel">Paramètrage signataire</h5>
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
             <select name="signataire_1" id="signataire_1" class="form-control" >
              @foreach ($agents as $agent)
              
              <option value="{{$agent->matricule}}">{{$agent->nom}} {{$agent->prenom}}</option>
              @endforeach
             </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Signataire 2</label>
              <select name="signataire_2" id="signataire_2"  class="form-control">
                <option value=""></option>
                @foreach ($agents as $agent)
                <option value="{{$agent->matricule}}">{{$agent->nom}} {{$agent->prenom}}</option>
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
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="parinterim1">Par interim</label>
                  <input type="checkbox" name="parinterim1" id="parinterim1">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="parordre1">Par ordre</label>
                  <input type="checkbox" name="parordre1" id="parordre1">
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="parinterim2">Par interim</label>
                  <input type="checkbox" name="parinterim2" id="parinterim2">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="parordre1">Par ordre</label>
                  <input type="checkbox" name="parordre2" id="parordre2">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="nominterim1">Nom interim</label>
                  <select class="form-control" name="nominterim1" id="nominterim1">
                    <option value=""></option>
                    @foreach ($agents as $agent)
                      <option value="{{$agent->matricule}}">{{$agent->nom}} {{$agent->prenom}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="nominterim2">Nom interim</label>
                  <select class="form-control" name="nominterim2" id="nominterim2">
                    <option value=","></option>
                    @foreach ($agents as $agent)
                      <option value="{{$agent->matricule}}">{{$agent->nom}} {{$agent->prenom}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
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
        <a href="{{url('/signataire')}}" class="btn btn-warning" data-dismiss="modal">Quitter <i class="fa fa-arrows" aria-hidden="true"></i></a>
        <button type="submit"  class="btn btn-success">Sauvegarder <i class="fa fa-save" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>
  
  
</div>
</div>



@endsection