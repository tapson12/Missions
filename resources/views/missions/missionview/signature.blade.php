@extends('layouts.parametragetemplate')

@section('content')
<div class="row" style="margin-top: 5%;margin-left: -50%">
  <div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-success">
               <div class="card-body">
                <a  class="btn btn-success" href="{{url('/display-signataire-form')}}" style="color: white; font-weight:bold;"> Nouveau <i class="fa fa-plus"></i></a>
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
            <table id="signataire_table" class="table table-bordered table-striped">
                <thead style="background-color: #019d4a;color:white;opacity: .8;">
                <tr>
                  <th>Structure </th>
                  <th>Signataire 1</th>
                  <th>Signataire 2 </th>
                 <th>Distinction signataire 1 </th>
                 <th>Distinction signataire 2 </th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($signataires as $signataire)
                   
                  
                         
                    <tr>
                      <td>{{$signataire->structure->code}}</td>
                      <td>{{$signataire->signature_1}}</td>
                      <td>{{$signataire->signature_2}}</td>
                        <td>{{$signataire->distinction_signataire_1}}</td>  
                        <td>{{$signataire->distinction_signataire_2}}</td>  
                        <td>
                            <a  href="{{url('/display-update-structure-form/'.$signataire->id)}}"  class="btn btn-outline-success"><i style="color: #007bff"  class="fa fa-edit"></i></a>
                            <button data-toggle="modal" data-target="{{'#suprimer'.$signataire->id}}" class="btn btn-outline-danger"><i style="color: red" class="fa fa-trash"></i></button>
                            <a class="btn btn-warning" onclick="displaysubstructure({{$signataire->id}})" href="javascript:void(0)"><i class="fa fa-eye"></i></a>
      <div class="modal fade" id="{{'suprimer'.$signataire->id}}">
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
                            <a href="{{url('/delete-structure/'.$signataire->id)}}" class="btn btn-danger">supprimer <i class="fa fa-trash" style="color: white"></i></a>
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
              {{ $signataires->onEachSide(5)->links() }}
        </div>
    </div>
</div>
</div>

<!-- Modal -->

@endsection