@extends('layouts.parametragetemplate')

@section('content')



<div class="row" style="margin-top: 5%;margin-left: -30%; margin-right: +10%">
  <div class="card-body">
  <div class="row">
    <div class="col-2">

    </div>
    <div class="col-10">
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
                  <textarea placeholder="Saisissez l'objet de votre mission" id="objet" name="objet" rows="2" cols="80"></textarea>
                  </div>
              </div>
            </div>
  
            <div class="row" style="margin-left: 5%">
              <div class="col col-lg-3">
                <div class="form-group">
                  <input id="datedebut" type="date" value="datedebut" class="form-control">
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
                      <option value="">Choisissez l'immatriculation du véhicule</option>
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
                        <input type="checkbox" value="interim">
                      </div>
                     
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="interim">Par ordre</label>
                        <input type="checkbox" value="parordre">
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
                      <input type="checkbox" value="interim">
                    </div>
                   
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="interim">Par ordre</label>
                      <input type="checkbox" value="parordre">
                    </div>
                  </div>
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
                   <select name="mission_region_id" id="mission_region_id" class="form-control">
                      <option value="">Choisissez la région</option>
                      @foreach ($regions as $region)
                          <option value="{{$region->id}}">{{$region->libelleregion}}</option>
                      @endforeach
                   </select>
                  </div>
                </div>
              <div class="col col-lg-3">
                  <div class="form-group">
                   <select name="mission_province_id" id="mission_province_id" class="form-control">
                    <option value="''"></option>
                    <option value="">Choisissez la province</option>
                      @foreach ($provinces as $province)
                          <option value="{{$province->id}}">{{$province->libelleProvince}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
  
              <div class="col col-lg-3">
                  <div class="form-group">
                   <select name="mission_commune_id" id="mission_commune_id" class="form-control">
                      <option value="''"></option>
                    <option value="">Choisissez la commune</option>
                      @foreach ($communes as $commune)
                          <option value="{{$commune->id}}">{{$commune->libelleCommune}}</option>
                      @endforeach
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
              <div class="col-1">
                <button class="btn btn-info" type="button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#selection_mission_membre"><i class="fa fa-user-friends"></i></button>
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
                  <option value="">hébergement et restauration</option>
                  @foreach ($sourcefincancements as $source)
                      <option value="{{$source->id}}">{{$source->libellesourcefinancement}}</option>
                  @endforeach
               </select>
              </div>
            </div>
          <div class="col col-lg-5">
              <div class="form-group">
               <select name="" id="transport_id" class="form-control">
                  <option value="">Transport/carburant</option>
                  @foreach ($sourcefincancements as $source)
                  <option value="{{$source->id}}">{{$source->libellesourcefinancement}}</option>
                  @endforeach
               </select>
              </div>
            </div>
  
        </div>
  </fieldset>
        <div class="modal-footer" >
          <a href="" class="btn btn-warning" data-dismiss="modal">Quitter <i class="fa fa-arrows" aria-hidden="true"></i></a>
          <button type="submit" class="btn btn-success">Sauvegarder <i class="fa fa-save" aria-hidden="true"></i></button>
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
        <button type="button" class="btn btn-primary">Enregistrer <i class="fa fa-save"></i></button>
      </div>
    </div>
  </div>
</div>
@endsection
