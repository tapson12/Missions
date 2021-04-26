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
            +'</div><div class="col-lg-6 col-md-6 col-sm-6"><div class="form-group">'
           +'<label>Immatriculation vehicule</label>'
            +'<div>'+data[0].imma+'</div></div> </div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6">'
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

function saveComposition() {
    var token=$('#token').val();
    var anomalie=$('#anomalie').val();
    var refechantillon= $("#refEchantillon").val();
    var echantillon_id=$('#echantillon_id').val();

    
    if(!(echantillon_id==0))
    {
        $.ajax({
            url: '/save-composition-echantillon/',
            type: 'POST',
            data: {
            refechantillon:refechantillon,
            echantillon_id:echantillon_id,   
            anomalie:anomalie,
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