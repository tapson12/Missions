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

      <div class="row" style="margin-top: 5%; margin-right:24%; margin-left:5%">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <table id="table_lieu_mission" class="table table-striped">
                  <thead style="background-color: #019d4a;color:white;opacity: .8;">
                  <tr>
                    <th>Régions</th>
                    <th>Provinces</th>
                    <th>Communes</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>


                  </tbody>

                </table>
          </div>
      </div>
  </fieldset>

  <fieldset style="border: 2px solid #F37622; width:850px; margin-top : 30px; background:#E9F3E6">
      <legend>Membres de la mission</legend>

      <div class="row" style="margin-top: 5%; margin-right:24%;margin-left:5%">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <table id="" class="table table-striped">
                  <thead style="background-color: #019d4a;color:white;opacity: .8;">
                  <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Structure</th>
                    <th>Resp.</th>
                    <th>Actions</th>
                    <th>
                      <button class="btn btn-info">Les participants<i class="fa fa-user-friends"></i></button>
                    </th>
                  </tr>
                  </thead>
                  <tbody>


                  </tbody>

                </table>
          </div>
      </div>
  </fieldset>

  <fieldset style="border: 2px solid #F37622; width:850px; margin-top:20px; background:#E9F3E6">
      <legend >Source de financement</legend>

      <div class="row" style='margin-left:10%'>
          <div class="col col-lg-5">
              <div class="form-group">
               <select name="" id="" class="form-control">
                  <option value="">hébergement et restauration</option>
                  @foreach ($sourcefincancements as $source)
                      <option value="{{$source->id}}">{{$source->libellesourcefinancement}}</option>
                  @endforeach
               </select>
              </div>
            </div>
          <div class="col col-lg-5">
              <div class="form-group">
               <select name="" id="" class="form-control">
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



@endsection
