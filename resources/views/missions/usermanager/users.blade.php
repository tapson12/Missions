@extends('layouts.parametragetemplate')

@section('content')
<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">

    <!-- /.card-header -->
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-primary">
                   <div class="card-body">
                    <a href="{{url('/register-user-form')}}" class="btn btn-primary"  style="color: white; font-weight:bold;"> Nouveau <i class="fa fa-plus"></i></a>
                    <a class="btn btn-warning" style="color: white; font-weight:bold;"> Exporter <i class="fa fa-download"></i></a>
                   </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 5%">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table id="listevehicule" class="table table-bordered table-striped">
                    <thead style="background-color: #007bff;color:white;">
                    <tr>
                      <th>Nom & prénom </th>
                      <th>email </th>
                      <th>Roles</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user )
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>

                            @foreach($user->roles as $v)
                              <label class="badge badge-success">{{ $v->name }}</label>
                            @endforeach

                        </td>
                        <td>
                            <a href="{{url('/reset-password-by-admin/'.$user->id)}}"><i style="color: rgb(130, 179, 253)"  class="fa fa-key"></i></a>
                            <a data-toggle="modal" data-target="{{'#deletemodale'.$user->id}}"><i style="color: red" class="fa fa-trash"></i></a>
                            <a href="{{url('/reset-role-byadmin/'.$user->id)}}"><i style="color: green" class="fa fa-edit"></i></a>
                            <div class="modal fade" id="{{'deletemodale'.$user->id}}">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header  bg-danger">
      <h4 class="modal-title">Suppression de lutilisateur: {{$user->name}}</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Voulez vous vraiment effectuer cette action ? </p>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      <a href="{{url('/delete-user/'.$user->id)}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> supprimer</a>
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
            </div>
        </div>

    </div>
    <!-- /.card-body -->
  </div>


</div>
</div>
@endsection
