@extends('layouts.parametragetemplate')

@section('content')
<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-success">
               <div class="card-body">
                <a  class="btn btn-success" href="{{url('/display-structure-form')}}" style="color: white; font-weight:bold;"> Nouveau <i class="fa fa-plus"></i></a>
                <a class="btn btn-warning" style="color: white; font-weight:bold;"> Exporter <i class="fa fa-download"></i></a>
               </div>
            </div>
        </div>
    </div>
  @if($errors->first('libellestructure')=='validation.required')
  <div class="row">
    <div class="col-12">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        le libelle de la region ne doit pas être vide
      </div>
    </div>
  </div>
  @endif
    <div class="row" style="margin-top: 5%">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="typeenvoyeurTable" class="table table-bordered table-striped">
                <thead style="background-color: #019d4a;color:white;opacity: .8;">
                <tr>
                  <th>Sigle</th>
                  <th>Structure </th>
                  <th>type structure</th>
                  <th>Profil </th>
                  <th>niveau </th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($structures as $structure)

                  @if (sizeof($structure->child))

                    <tr>
                      <td>{{$structure->code}}</td>
                      <td>{{$structure->libellestructure}}</td>
                      <td>{{$structure->typestructure->libellestructure}}</td>
                      <td>{{$structure->profil}}</td>
                        <td>{{$structure->typestructure->niveau}}</td>
                        <td>
                            <a  href="{{url('/display-update-structure-form/'.$structure->id)}}"  class="btn btn-outline-success"><i style="color: #007bff"  class="fa fa-edit"></i></a>
                            <button data-toggle="modal" data-target="{{'#suprimer'.$structure->id}}" class="btn btn-outline-danger"><i style="color: red" class="fa fa-trash"></i></button>
                            <a class="btn btn-warning" onclick="displaysubstructure({{$structure->id}})" href="javascript:void(0)"><i class="fa fa-eye"></i></a>
      <div class="modal fade" id="{{'suprimer'.$structure->id}}">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header modal-delete-header">
                <h4 class="modal-title">Supprimer un type de structure</h4>
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
                            <a href="{{url('/delete-structure/'.$structure->id)}}" class="btn btn-danger">supprimer <i class="fa fa-trash" style="color: white"></i></a>
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
                  @endif

                  @endforeach


              </table>
              {{ $structures->onEachSide(5)->links() }}
        </div>
    </div>

    <div class="row">
      <div class="col-12">
        <table id="typeenvoyeurTable" class="table table-bordered table-striped">
                <thead style="background-color: #019d4a;color:white;opacity: .8;">
                <tr>
                  <th>Structure fille</th>
                  <th>Structure Parente</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="childtable">

                </tbody>
              </table>
      </div>
    </div>

</div>
</div>

<!-- Modal -->

@endsection
