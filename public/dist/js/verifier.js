$(document).ready(function() {

});

function verifiercode() {
    var token=$('#token').val();
    var code_analyse=$('#code_analyse').val();
    $.ajax({
    url: '/verifiercode',
    type: 'POST',
    data: {code : code_analyse, "_token": token},
    dataType: 'json',

    success: function( data) {
        
        var apphtml='';
        
        if(data.length!=0)
        {
            $('#idjoint').val(data[0].idenvoyeurciterne);
                
             apphtml='<div class="row"><div class="col-lg-6 col-md-6 col-sm-6">'
                +'<div class="form-group">'
                +'<input type="text" name="codejoint" id="codejoint" hidden value="'+data[0].idenvoyeurciterne+'">'
                +'<label>Immatriculation citerne</label>'
                +'<div>'+data[0].immaciterne+'</div> </div> '
            +'<div class="row"><div class="col-lg-6 col-md-6 col-sm-6">'
            +'<div class="form-group"><label>Envoyeur</label>'
            +'<div>'+data[0].nom_complet+'</div></div> </div><div class="col-lg-6 col-md-6 col-sm-6">'
            +'<div class="form-group"> <label for="numero_analyse">contructeur</label> <div></div>'
            +'</div>'+data[0].contructeur_citerne+'</div></div>';
           
            $('#dataviews').append(apphtml);
        }else
        {
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'code analyse incorrect',
                body: 'le code analyse que vous avez entrer est incorrect'
              });
        }


        

    }       
})
}

function saveresultat() {
    var token=$('#token').val();
    var anomalie=$('#anomalie').val();
    var codejoint= $("#codejoint").val();
    var date_essaie=$('#date_essaie').val();
    var pression_service=$('#pression_service').val();
    var pression_epreuve=$('#pression_epreuve').val();
    var fluide_utilise=$('#fluide_utilise').val();
    var essaie_soupage=$('#essaie_soupage').val();
    var num_certificat=$('#codeCertificat').val();
    
    if(!(codejoint==null) || !(codejoint==0) || !(codejoint==undefined))
    {

        $.ajax({
            url: '/save-resultat',
            type: 'POST',
            data: {
            anomalie:anomalie,
            codejoint:codejoint,   
            date_essaie:date_essaie,
            pression_service:pression_service,
            pression_epreuve:pression_epreuve,
            fluide_utilise:fluide_utilise,
            essaie_soupage:essaie_soupage,
            num_certificat:num_certificat,
                "_token": token},
            dataType: 'json',
        
            success: function(data) { 
                console.log(data);

                $(document).Toasts('create', {
                    class: 'bg-success', 
                    title: 'Enregistrement',
                    body: 'enregistrement effectuer avec success'
                  });   
            }
        });
    }else
    {
        $(document).Toasts('create', {
            class: 'bg-danger', 
            title: 'Error',
            body: 'Code incorrect'
          });  
    
    }
    
}

function saveanalyse() {
    var token=$('#token').val();
    var anomalie=$('#anomalie').val();
    var idciterne= $("#idciterne").val();
    var compartiment_id=$('#compartiment_id').val();
    var plien=$('#plien').val();
    var creu=$('#creu').val();
    
    
    if(!(idciterne==null) || !(compartiment_id==0))
    {
        $.ajax({
            url: '/save-analyse-compartiment/'+compartiment_id,
            type: 'POST',
            data: {
            compartiment_id:compartiment_id,
            idciterne:idciterne,   
            plien:plien,
            creu:creu,
            anomalie:anomalie,
                "_token": token},
            dataType: 'json',
        
            success: function(data) { 

                console.log(data);

                $(this).prop('disabled', true)

                $(document).Toasts('create', {
                    class: 'bg-success', 
                    title: 'Enregistrement',
                    body: 'enregistrement effectuer avec success'
                  });   
            }
        });
    }else
    {
        $(document).Toasts('create', {
            class: 'bg-danger', 
            title: 'Error',
            body: 'Code incorrect'
          });  
    
    }
    
}


function updateanalyse() {
    var token=$('#token').val();
    var anomalie=$('#anomalie').val();
    var analyse_id=$("#analyse_id");
    var idciterne= $("#idciterne").val();
    var compartiment_id=$('#compartiment_id').val();
    var plien=$('#plien').val();
    var creu=$('#creu').val();
    
    
    if(!(idciterne==null) || !(compartiment_id==0))
    {
        $.ajax({
            url: '/update-analyse-compartiment/'+compartiment_id,
            type: 'POST',
            data: {
            compartiment_id:compartiment_id,
            idciterne:idciterne, 
            analyse_id:analyse_id,  
            plien:plien,
            creu:creu,
            anomalie:anomalie,
                "_token": token},
            dataType: 'json',
        
            success: function(data) { 

                console.log(data);

                $(this).prop('disabled', true)

                $(document).Toasts('create', {
                    class: 'bg-success', 
                    title: 'Enregistrement',
                    body: 'enregistrement effectuer avec success'
                  });   
            }
        });
    }else
    {
        $(document).Toasts('create', {
            class: 'bg-danger', 
            title: 'Error',
            body: 'Code incorrect'
          });  
    
    }
    
}


function researchejaugeage() {
    var token=$('#token').val();
    var code_analyse=$('#code_analyse').val();
    $.ajax({
    url: '/reachprocessjaugeage',
    type: 'POST',
    data: {code : code_analyse, "_token": token},
    dataType: 'json',

    success: function( data) {
        
        var apphtml='';
        
        if(data.length!=0)
        {
            
            //$('#idjoint').val(data[0].idenvoyeurciterne);
                var link='/display-compartiement/'+data[0].id;
             apphtml='<div class="row"><div class="col-lg-6 col-md-6 col-sm-6">'
                +'<div class="form-group">'
                +'<input type="text" name="codejoint" id="codejoint" hidden value="'+data[0].idenvoyeurciterne+'">'
                +'<label>Immatriculation citerne</label>'
                +'<div>'+data[0].immatriculationCiterne+'</div> </div> '
            +'</div><div class="col-lg-6 col-md-6 col-sm-6"><div class="form-group">'
           +'<label>Immatriculation vehicule</label>'
            +'<div>'+data[0].imma+'</div></div> </div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6">'
            +'<div class="form-group"><label>Envoyeur</label>'
            +'<div>'+data[0].nom_complet+'</div></div> </div><div class="col-lg-6 col-md-6 col-sm-6">'
            +'<div class="form-group"> <label for="numero_analyse">contructeur</label> <div></div>'
            +'</div>'+data[0].constructeur+'</div>'+
            '<div><a class="btn btn-success" href="'+link+'"><i class="fa fa-search"></i></a></div></div>';

            $('#dataviews').append(apphtml);
            

            console.log(data);
        }else
        {
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'code analyse incorrect',
                body: 'le code analyse que vous avez entrer est incorrect'
              });
        }


        

    }       
})
}
