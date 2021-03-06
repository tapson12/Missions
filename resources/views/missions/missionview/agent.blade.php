@extends('layouts.agenttemplate')

@section('content')

<div class="row" style="margin-left: -50%;margin-top:2%;">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0" style="background-color: rgb(227, 229, 222)">
                <h3 class="card-title p-3"><a href="{{'/home'}}"><i class="fa fa-home fa-2"></i></a></h3>
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Gestion personnel(Agents internes & externes)</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Affectations</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-2">
                        <a  href="#" data-toggle="modal" data-target="#exampleModal">
                          <img style="margin-left:30%" src="{{asset('img/useradd.ico')}}" height="60px" alt="">
                         <div style="background-color: rgb(133, 132, 131);color:white;text-align: center">Agents</div>
                        </a>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 2%;">
                      <div class="col-8">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                          <!-- /btn-group -->
                          <input type="text" class="form-control" id="reseach_id" placeholder="Rechercher un agent par son numéro matricule ou son nom">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-11">
                      <table id="table_agent" class="table table-bordered table-striped">
                            <thead style="background-color: #019d4a;color:white;opacity: .8;">
                            <tr>
                              <th>Matricule </th>
                              <th>Nom et prenom</th>
                              <th data-searchable=false>Date de naissance</th>
                              <th>Type d agent </th>
                              <th data-searchable=false>Sexe </th>

                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="table_agent_body">
                              @foreach ($agents as $agent)
                                  <tr>
                                    <td>{{$agent->matricule}}</td>
                                    <td>{{$agent->nom}} {{$agent->prenom}} </td>
                                    <td>{{$agent->datenaissance}}</td>
                                    <td>{{$agent->typeagent->typeagent}}</td>
                                    <td>{{$agent->sexe}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="{{'#suprimer'.$agent->id}}" class="btn btn-outline-danger"><i style="color: red" class="fa fa-trash"></i></button>

                                        <div class="modal fade" id="{{'suprimer'.$agent->id}}">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header modal-delete-header">
                                                  <h4 class="modal-title">Supprimer une Responsabilité</h4>
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
                                                              <a href="{{url('/delete-agent/'.$agent->id)}}" class="btn btn-danger">supprimer <i class="fa fa-trash" style="color: white"></i></a>
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
                            </tbody>

                          </table>
                      </div>
                    </div>
                    <div class="modal fade" id="exampleModal" data-bs-target="#staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #019d4a;color:white;opacity: .8;">
                            <h5 class="modal-title" id="exampleModalLabel" >Suivie des agents internes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" >
                            <div class="alert alert-success alert-dismissible" id="agent_success_save_alert">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fas fa-check"></i> Alert!</h5>
                              <div>Enregistrement reusit avec succès</div>
                            </div>
                            <div class="row" id="alert_agent">
                              <div class="col-12">
                                <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-ban"></i> Erreur !</h5>
                                  <div id="messageerror">Verifier les données saisies</div>
                                </div>
                              </div>
                            </div>
                            <form action="#" method="post">
                              <input type="text" value="{{csrf_token()}}" name="_token" id="token" hidden="true">
                              <div class="row">
                                <div class="col-12">
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="exampleInputFile">Agent externe ?</label>
                                      <input type="checkbox" name="agentexterne" id="agentexterne">
                                    </div>
                                   </div>
                                </div>
                              </div>
                             <div class="row">
                               <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Matricule</label>
                                  <input type="text" class="form-control" name="matricule" id="matricule">
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Nom</label>
                                  <input type="text" class="form-control" name="nom" id="nom">
                                </div>
                               </div>
                             </div>
                             <div class="row">
                               <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Prenom</label>
                                  <input type="text" class="form-control" name="prenom" id="prenom">
                                </div>
                               </div>


                               <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Sexe</label>
                                  <select name="sexe" id="sexe" class="form-control" >
                                    <option value="MASCULIN">MASCULIN</option>
                                    <option value="FEMININ">FEMININ</option>
                                    <option value="AUTRE">AUTRE</option>
                                  </select>
                                </div>
                               </div>

                             </div>
                             <div class="row" id="contact_hiden">
                              <div class="col-6">
                               <div class="form-group">
                                 <label for="exampleInputFile">Contact</label>
                                 <input type="text" class="form-control" name="contact" id="contact">
                               </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Date naissance</label>
                                  <input type="date" class="form-control" name="datenaissance" id="datenaissance">
                                </div>
                               </div>
                            </div>
                            <div class="row" id="situation_id">
                              <div class="col-6">
                               <div class="form-group">
                                 <label for="exampleInputFile">Distinction</label>
                                 <input type="text" class="form-control" name="distinction" id="distinction">
                               </div>
                              </div>
                              <div class="col-6">
                               <div class="form-group">
                                 <label for="exampleInputFile">Situation matrimoniale</label>
                                 <select name="situationmatrimoniale" id="situationmatrimoniale" class="form-control" >
                                   <option value="CELIBATAIRE">CELIBATAIRE</option>
                                   <option value="MARIE">MARIE(E)</option>
                                 </select>
                               </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Type agent</label>
                                  <select name="type_agent" id="type_agent" class="form-control" >
                                   @foreach ($types as $type)
                                       <option value="{{$type->id}}">{{$type->typeagent}}</option>
                                   @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="button" onclick="saveagent()" class="btn btn-success">Enregistrer <i class="fa fa-save"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="row">
                      <div class="col-2">
                        <a  href="#" data-toggle="modal" data-target="#affectionmodal">
                          <img style="margin-left:30%" src="{{asset('img/affectation.png')}}" height="60px" alt="">
                         <div style="background-color: rgb(133, 132, 131);color:white;text-align: center">Affectation</div>
                        </a>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 2%;">
                      <div class="col-8">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                          <!-- /btn-group -->
                          <input type="text" class="form-control" id="reseach_affectation_id" placeholder="Rechercher un agent par son numéro matricule ou son nom">
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-top: 5%;">
                      <div class="col-11">
                        <table id="table_affectation" class="table table-bordered table-striped">
                          <thead style="background-color: #019d4a;color:white;opacity: .8;">
                          <tr>
                            <th>Matricule </th>
                            <th>Nom et prenom</th>
                            <th>Structure</th>
                            <th>fonction </th>
                            <th>responsabilité </th>
                            <th>Actions</th>
                          </tr>
                          </thead>
                          <tbody id="table_affectation_body">
                            @foreach ($affectations as $affectation)
                                <tr>
                                  <td>{{$affectation->agent->matricule}}</td>
                                  <td>{{$affectation->agent->nom}} {{$affectation->agent->prenom}} </td>
                                  <td>
                                    {{$affectation->structure->libellestructure}}
                                  </td>
                                  <td>

                                    {{$affectation->fonction->libellefonction}}
                                  </td>
                                  <td>{{$affectation->responsabilite->code}}</td>
                                  <td>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>

                  <!-- Modal -->
            <div class="modal fade" id="affectionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #019d4a;color:white;opacity: .8;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Affectation agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputFile">Agent</label>
                            <select name="agent" id="agent" class="form-control">
                              @foreach ($agents as $agent)
                                  <option value="{{$agent->id}}">{{$agent->matricule}} {{$agent->nom}} {{$agent->prenom}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputFile">Structure</label>
                            <select name="structure" id="structure" class="form-control">
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
                            <label for="exampleInputFile">Responsabilites</label>
                            <select name="responsabilite" id="responsabilite" class="form-control">
                              @foreach ($reponsabilites as $reponsabilite)
                                  <option value="{{$reponsabilite->id}}">{{$reponsabilite->code}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputFile">Fonction</label>
                            <select name="fonction" id="fonction" class="form-control">
                             @foreach ($fonctions as $fonction)
                             <option value="{{$fonction->id}}">{{$fonction->libellefonction}}</option>
                             @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="activer">Date de debut</label>
                            <input id="datedebut" type="date" value="datedebut" class="form-control">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="activer">Date de fin</label>
                            <input type="date" id="datefin" value="datefin" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="activer">Activer</label>
                            <input type="checkbox" name="active" id="active">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="button" onclick="saveaffectation()" class="btn btn-success">Enregistrer <i class="fa fa-save"></i></button>
                  </div>
                </div>
              </div>
            </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
@endsection
