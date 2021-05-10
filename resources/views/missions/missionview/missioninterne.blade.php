@extends('layouts.parametragetemplate')

@section('content')



<div class="row" style="margin-top: 5%;margin-left: -45%; margin-right: +10%">
  <div class="card-body">
  <div class="row">
    <div class="col-3">
     <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="ion ion-clipboard mr-1"></i>
         Liste des ordre de mission
        </h3>

    
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <ul class="todo-list" data-widget="todo-list">
          @foreach ($ordremission as $ordre)
          <li>
          
            <!-- checkbox -->
            <div  class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo1" id="todoCheck1">
              <label for="todoCheck1"></label>
            </div>
            <!-- todo text -->
            <a href="{{url('/display-reporting-mission/'.$ordre->id)}}"><span class="text">{{$ordre->objet}} {{$ordre->structure->code}}</span></a>
            <!-- Emphasis label -->
            <div class="tools">
              <i class="fas fa-edit"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li>
          @endforeach
          
        </ul>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <div class="card-tools">
         {{$ordremission->onEachSide(5)->links()}}
        </div>
      </div>
    </div>
    </div>
    <div class="col-9">

      <div class="row">
        <div class="col-12">
          <div id="savemissionmessage" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            ordre de mission generé avec succès 
          </div>
        </div>
      </div>

      <form action="" method="POST">
        <input type="text" value="{{csrf_token()}}" name="_token" id="token" hidden="true">
      <div class="modal-content">
        <div class="modal-header modal-header-designed">
          <h5 class="modal-title" id="exampleModalLabel">Ordre de mission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <fieldset style="border: 2px solid #F37622; width:850px; background:#E9F3E6">
              <legend>Saisir une mission</legend>
          <div class="row" style="margin-left: 5%">
              <div class="col-sm-9">
                  <div class="form-group">
                   <select name="mission_structure_id" id="mission_structure_id" class="form-control">
                      <option value="">Choisissez la structure</option>
                      @foreach ($structures as $structure)
                          <option value="{{$structure->id}}">{{$structure->code}}</option>
                      @endforeach
                   </select>
                  </div>
                </div>
          </div>

          <div class="row" style="margin-left: 5%">
              <div class="col-sm-9">
                  <div class="form-group">
                   <select name="dt_id" id="dt_id" class="form-control">
                      <option value="">Choisissez la direction technique</option>
                   </select>
                  </div>
                </div>
          </div>

          <div class="row" style="margin-left: 5%">
              <div class="col-sm-11">
                <div class="form-group">
                  <textarea placeholder="Saisissez l'objet de votre mission" id="objetmission" name="objetmission" rows="2" cols="80"></textarea>
                  </div>
              </div>
            </div>

            <div class="row" style="margin-left: 5%">
              <div class="col col-lg-3">
                <div class="form-group">
                  <input id="datedebut" type="date"  value="datedebut" class="form-control">
                </div>
              </div>
              <div class="col col-lg-3">
                <div class="form-group">
                  <input type="date" id="datefin" value="datefin" class="form-control">
                </div>
              </div>

              <div class="col col-lg-3">
                  <div class="form-group">
                   <select name="immat_id" id="immat_id" class="form-control">
                      <option value="">Choisissez limmatriculation du véhicule</option>
                      @foreach ($vehicules as $vehicule)
                      <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                      @endforeach
                   </select>
                  </div>
                </div>
                <div class="col col-lg-3">
                  <div class="form-group">
                      <button class="btn btn-info">Nv. véhicule   <i class="fa fa-car"></i></button>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div id="mission_signataire_1">Signataire 1 :
                  <strong id="display_signataire1">

                  </strong>
                </div>
                <div id='mission_distinction_1'>Distinction signataire 1:
                  <strong id="display_distinction1">

                  </strong>
                </div>
                <div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="interim">Interim</label>
                        <input id="mission_parinterim1" disabled type="checkbox" value="interim">
                      </div>

                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label  for="interim">Par ordre</label>
                        <input id="mission_parordre1" disabled type="checkbox" value="parordre">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div id="mission_signataire_2">Signataire 2:

                  <strong id="display_signataire2">

                  </strong>

                </div>
                <div id='mission_distinction_2'>Distinction signataire 2:
                  <strong id="display_distinction2">

                  </strong>

                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="interim">Interim</label>
                      <input disabled id="mission_parinterim2" type="checkbox" value="interim">
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="interim">Par ordre</label>
                      <input  id="mission_parordre" disabled type="checkbox" value="parordre">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nominterim_mission1">Nom interim 1:</label>
                  <input  type="text" id="nominterim_val_mission1" value="">
                <strong id="nominterim_mission1"></strong>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="nominterim_mission2">Nom interim 2:</label>
                  <input  type="text" id="nominterim_val_mission2" value="">
                <strong id="nominterim_mission2"></strong>
                </div>
              </div>
            </div>
            <br><br>
           </fieldset>

          <fieldset style="border: 2px solid #F37622; width:850px; margin-top:30px; background:#E9F3E6">
              <legend>Lieux de la mission</legend>

          <div class="row" style="margin-top: 20px; margin-left:5%">
              <div class="col col-lg-3">
                  <div class="form-group">
                   <select name="mission_region_id" id="mission_region_id" required="required" class="form-control">
                      <option value=""></option>
                      @foreach ($regions as $region)
                          <option value="{{$region->id}}">{{$region->libelleregion}}</option>
                      @endforeach
                   </select>
                  </div>
                </div>
              <div class="col col-lg-3">
                  <div class="form-group">
                   <select name="mission_province_id" id="mission_province_id" class="form-control">


                    </select>
                  </div>
                </div>

              <div class="col col-lg-3">
                  <div class="form-group">
                   <select name="mission_commune_id" id="mission_commune_id" class="form-control">

                   </select>
                  </div>
                </div>

                <div class="col col-lg-3">
                  <div class="form-group">
                   <button id="btn_insert_lieu_mission" type="button" class="btn btn-info">Insérer le lieu   <i class="fa fa-map-marked-alt"></i></button>
                  </div>
                </div>

            </div>

      <div class="row" style="margin-top: 5%; margin-right:24%; margin-left:5%" >
          <div class="col-lg-12 col-md-12 col-sm-12">
          <div style="height: 200px;overflow: scroll;">
            <table id="table_lieu_mission" class="table table-striped" >
              <thead style="background-color: #019d4a;color:white;opacity: .8;">
              <tr>
                <th>Régions</th>
                <th>Provinces</th>
                <th>Communes</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody id="tbody_lieux_mission" >


              </tbody>

            </table>
          </div>
          </div>
      </div>
  </fieldset>

  <fieldset style="border: 2px solid #F37622; width:850px; margin-top : 30px; background:#E9F3E6">
      <legend>Membres de la mission</legend>

      <div class="row" style="margin-top: 5%; margin-right:24%;margin-left:5%">
          <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="row">
              <div class="col-11">
            <div  style="height: 400px;overflow: scroll">
              <table id="table_agent_mission_id" class="table table-striped">
                <thead style="background-color: #019d4a;color:white;opacity: .8;">
                <tr>
                  <th>Matricule</th>
                  <th>Nom Prenom</th>
                  <th>Structure</th>
                  <th>Resp.</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="agent_id_mission">


                </tbody>

              </table>
            </div>
              
              </div>
              <div class="col-1">
                <button class="btn btn-info" type="button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#selection_mission_membre"><i class="fa fa-user-friends"></i></button>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="chef_mission">Chef de mission</label>
                 <select class="form-control" name="chef_mission" id="chef_mission">
                  <option value="">Selectionner le chef de mission</option>
                 </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="conducteur_mission">Chauffeur mission</label>
                 <select class="form-control" name="conducteur_mission" id="conducteur_mission">
                  <option value="">Selectionner le chef de mission</option>
                 </select>
                </div>
              </div>
            </div>
          </div>
      </div>
  </fieldset>

  <fieldset style="border: 2px solid #F37622; width:850px; margin-top:20px; background:#E9F3E6">
      <legend >Source de financement</legend>
      <div class="row" style='margin-left:10%'>
          <div class="col col-lg-5">
              <div class="form-group">
                <select name="" id="hebergement_id" class="form-control">
                  <option value="">Hebergement</option>
                  @foreach ($sourceinternes as $sourceinterne)
                      <option value="{{$sourceinterne->id.',interne'.$sourceinterne->type}}">{{$sourceinterne->code}} </option>
                  @endforeach
                  @foreach ($sourcefincancements as $source)
                  <option value="{{$source->id.',externe'}}">{{$source->libellesourcefinancement}}</option>
                  @endforeach
                  @foreach ($sourceprojets as $sourceprojet)
                  <option value="{{$sourceprojet->id.',projet'}}">{{$sourceprojet->code}}</option>
                  @endforeach
               </select>
              </div>
            </div>
          <div class="col col-lg-5">
              <div class="form-group">
               <select name="" id="transport_id" class="form-control">
                  <option value="">Transport/carburant</option>
                  @foreach ($sourceinternes as $sourceinterne)
                      <option value="{{$sourceinterne->id.',interne'.$sourceinterne->type}}">{{$sourceinterne->code}} </option>
                  @endforeach
                  @foreach ($sourcefincancements as $source)
                  <option value="{{$source->id.',externe'}}">{{$source->libellesourcefinancement}}</option>
                  @endforeach
                  @foreach ($sourceprojets as $sourceprojet)
                  <option value="{{$sourceprojet->id.',projet'}}">{{$sourceprojet->code}}</option>
                  @endforeach
               </select>
              </div>
            </div>

        </div>
  </fieldset>
        <div class="modal-footer" >
          <a href="" class="btn btn-warning" data-dismiss="modal">Quitter <i class="fa fa-arrows" aria-hidden="true"></i></a>
          <button type="button" onclick="savemission()" class="btn btn-success">Sauvegarder <i class="fa fa-save" aria-hidden="true"></i></button>
        </div>
    </form>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="selection_mission_membre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selectionner les membres de la mission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="type_structure">Agent interne</label>
              <input type="checkbox" checked id="check_type_structure" value="">
            </div>
          </div>
        </div>
        <div class="row" id="date_no_select">
          <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
             <div >
               veuillez selectionner une date 
             </div>
            </div>
          </div>
        </div>
        <div class="row" id="doublon_alert">
          <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
             <div id='erreur_id'></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="mission_structure_agent_id">Agent interne</label>
              <select  class="form-control" name="mission_structure_agent_id" id="mission_structure_agent_id">
                @foreach ($structures as $structure)
                    <option value="{{$structure->id}}">{{$structure->code}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="search_agent_mission">Recherche un agent</label>
              <input type="text" class="form-control" id="rechercher"  placeholder="Rechercher l'agents" value="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <button id="insert_agent_to_mission" class="btn btn-warning"><i class="fa fa-plus fa-3x"></i></button>
          </div>
        </div>
        <div class="row" style="height: 500px;overflow: scroll;margin-top: 2%;">
          <div class="col-12">
            <table id="membre_mission_table" class="table table-bordered table-striped">
              <thead style="background-color: #019d4a;color:white;opacity: .8;">
              <tr>
                <th>Actions</th>
                <th>Nom et prenom</th>
                <th>Matricule </th>
                <th>Structure</th>
                <th>resp.</th>
              </tr>
              </thead>
              <tbody id="membre_mission_table_body">

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
