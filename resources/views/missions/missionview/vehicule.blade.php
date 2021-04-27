@extends('layouts.parametragetemplate')

@section('content')

<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-success">
               <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg" style="color: white; font-weight:bold;"> Nouveau <i class="fa fa-plus"></i></button>
                <a class="btn btn-warning" style="color: white; font-weight:bold;"> Exporter <i class="fa fa-download"></i></a>
               </div>
            </div>
        </div>
    </div>
  @if($errors->first('libelletypevehicule')=='validation.required')
  <div class="row">
    <div class="col-12">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        le libelle ne doit pas être vide
      </div>
    </div>
  </div>
  @endif
    <div class="row" style="margin-top: 5%">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="typeenvoyeurTable" class="table table-bordered table-striped">
                <thead style="background-color: #019d4a;color:white;opacity: .8;">
                <tr>
                  <th>Type vehicule </th>
                  <th>Immatriculation</th>
                  <th>Marque</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($vehicules as $vehicule)
                  <tr>
                    <td>{{$vehicule->typevehicules->libelletypevehicule}}</td>
                    <td>{{ $vehicule->immatriculation }}</td>
                    <td>{{ $vehicule->libellevehicule }}</td>
                      <td>
                          <button  data-toggle="modal" data-target="{{'#modifier'.$vehicule->id}}"  class="btn btn-outline-success"><i style="color: #007bff"  class="fa fa-edit"></i></button>
                          <button data-toggle="modal" data-target="{{'#suprimer'.$vehicule->id}}" class="btn btn-outline-danger"><i style="color: red" class="fa fa-trash"></i></button>

                        <div class="modal fade" id="{{'modifier'.$vehicule->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <form action="{{url('/update-vehicule')}}" method="POST">
                              @csrf
                            <div class="modal-content">
                              <div class="modal-header modal-header-designed">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un véhicule</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <input hidden name="id" value="{{$vehicule->id}}" type="text">
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label for="">Immatriculation</label>
                                        <input type="text" value="{{$vehicule->immatriculation}}" name="immatriculation" id="" class="form-control" placeholder="L'immatriculation du véhicule" aria-describedby="helpId" required/>
                                        <small id="helpId" class="text-muted" ><span style="color: red">L'immatriculation est obligatoire</span></small>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">Marque</label>
                                  <input type="text" value="{{$vehicule->libellevehicule}}" name="libellevehicule" id="" class="form-control" placeholder="La marque du véhicule" aria-describedby="helpId"/>
                                  <small id="helpId" class="text-muted" ><span style="color: red"></span></small>
                                </div>
                              </div>
                          </div>


                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="">Type véhicule</label>
                                <select id="" class="form-control" name="typevehicule">
                                    @foreach ($typevehicules as $typevehicule)
                                    <option @if ($vehicule->id==$typevehicule->id)
                                        selected
                                    @endif value="{{$typevehicule->id}}">{{$typevehicule->libelletypevehicule}}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Quitter <i class="fa fa-arrows" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-primary">Sauvegarder <i class="fa fa-save" aria-hidden="true"></i></button>
                              </div>
                            </div>
                          </form>
                          </div>
                        </div>


    <div class="modal fade" id="{{'suprimer'.$vehicule->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal-delete-header">
              <h4 class="modal-title">Supprimer un véhicule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="row">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12">
                     <div class="row">
                       <div class="col-lg-12 col-md-12 col-sms-12">
                         <span style="color: red;font-weight:bold;font-size:0.5cm">Voulez vous effectuer cette action <i class="fa fa-exclamation-triangle fa-3x" style="color: red;"></i></span>
                       </div>
                     </div>
                      <div class="row">
                        <div class="col-lg-12 col-sm-12  col-md-12">
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                          <a href="{{url('/delete-vehicule/'.$type->id)}}" class="btn btn-danger">supprimer <i class="fa fa-trash" style="color: white"></i></a>
                        </div>
                      </div>
                   </div>
                 </div>
             </div>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


                        </td>
                    </tr>
                  @endforeach


              </table>
              {{ $vehicules->onEachSide(5)->links() }}
        </div>
    </div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{url('/save-vehicule')}}" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header modal-header-designed">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un  véhicule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="">Immatricullation</label>
                <input type="text" name="immatriculation" id="" class="form-control" placeholder="L'immatriculation du véhicule" aria-describedby="helpId" required>
                <small id="helpId" class="text-muted" ><span style="color: red">L'immatriculation est obligatoire</span></small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="">Marque</label>
                <input type="text" name="libellevehicule" id="" class="form-control" placeholder="La marque du véhicule" aria-describedby="helpId" required>
                <small id="helpId" class="text-muted" ><span style="color: red">La marque est obligatoire</span></small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="">Type véhicule</label>
                <select id="" class="form-control" name="libelletypevehicule" >
                    @foreach ($typevehicules as $typevehicule)
                    <option value="{{$typevehicule->id}}">{{$typevehicule->libelletypevehicule}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Quitter <i class="fa fa-arrows" aria-hidden="true"></i></button>
        <button type="submit" class="btn btn-success">Sauvegarder <i class="fa fa-save" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>
  </div>
</div>

@endsection
