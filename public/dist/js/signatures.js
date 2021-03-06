$(document).ready(function() {

    $("#structure_id").select2();
    $("#signataire_1").select2();
    $("#signataire_2").select2();
    var token=$('#token').val();

    

    $("#signataire_2").on('change',function() {
        
        var codeagent1=this.value;

        $.ajax({
            url: '/get-signatairebyone',
            type:'get',
            data: {
                codeagent1:codeagent1,
            }
        }).done(function(data){
            
           
            if(!(data.length==0))
            {
                $("#distinction_2").empty();
               data.forEach(element => {
                $("#distinction_2").val(element.distinction);   
               });
            }
              
        });



    });

    $("#signataire_1").on('change',function() {
        
        var codeagent2=this.value;

        $.ajax({
            url: '/get-signatairebytwo',
            type:'get',
            data: {
                codeagent2:codeagent2,
            }
        }).done(function(data){
            
           console.log(data);
           
            if(!(data.length==0))
            {
                $("#distinction_1").empty();
               data.forEach(element => {
                $("#distinction_1").val(element.distinction);   
               });
            }
              
        });



    })

    $("#structure_id").on('change',function() {
       var codestructure=this.value;
       $("#distinction_1").empty();
       $("#distinction_2").empty();
       
       $.ajax({
        url: '/get-signataire',
        type:'get',
        data: {
            codestructure:codestructure,
        }
    }).done(function(data){
        
       
       
        if(data[0].length==0)
        {
            console.log(data);
        }else
        {
            console.log(data);
            
            $("#id").val(data[0][0].signataire_id);
            $("#signataire_1").append("<option selected value='"+data[0][0].matricule+"'>"+data[0][0].nom+' '+data[0][0].prenom+"</option>")
            $("#signataire_2").append("<option selected value='"+data[1][0].matricule+"'>"+data[1][0].nom+' '+data[1][0].prenom+"</option>")
            $("#distinction_2").val(data[1][0].distinction) 
            $("#distinction_1").val(data[0][0].distinction);
            $("#parinterim1").prop('checked', data[2][0].isinterim1);
            $("#parordre1").prop('checked', data[2][0].isparorodre1);
            $("#nominterim1").append("<option selected value='"+data[2][0].matricule+"'>"+data[2][0].nom+" "+data[2][0].prenom+"</option>")
            
            $("#parinterim2").prop('checked', data[3][0].isinterim2);
            $("#parordre2").prop('checked', data[3][0].isparorodre2);
            $("#nominterim2").append("<option selected value='"+data[3][0].matricule+"'>"+data[2][0].nom+" "+data[2][0].prenom+"</option>")
            

            
          
        }
          
    });
    
    })

});

function savesignataire() {
    
    var structure_id=$("#structure_id").val();
    var signataire_1=$("#signataire_1").val();
    var signataire_2=$("#signataire_2").val();
    var distinction_1=$("#distinction_1").val();
    var distinction_2=$("#distinction_2").val();
    var activer=$("#activer").prop('checked');
    var token=$('#token').val();
    $.ajax({
        url: '/save-signature',
        type:'POST',
        data: {
            structure_id:structure_id,
            signataire_1:signataire_1,
            signataire_2:signataire_2,
            distinction_1:distinction_1,
            distinction_2:distinction_2,
            activer:activer,
            "_token": token
    
        }
    }).done(function(data){
    
        console.log(data);
       
        $("#signataire_table").data.reload();
          
    });

}