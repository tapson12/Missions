$(document).ready(function() {
    $("#savemissionmessage").hide();
    $("#mission_structure_id").select2();
    $("#immat_id").select2();
    
    $("#nominterim_val_mission1").hide();
    $("#nominterim_val_mission2").hide();
    $("#btn_insert_lieu_mission").on('click',function() {
        var region=$("#mission_region_id option:selected").text();
        var province=$("#mission_province_id option:selected").text();
        var commune=$("#mission_commune_id option:selected").text();
        
        $("#tbody_lieux_mission").append("<tr><td>"+region+"</td><td>"+province+"</td><td>"+commune+"</td><td><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");

    });
  

    $('#table_lieu_mission').on("click", "button", function(){
        $(this).closest('tr').remove();
  });

    $("#mission_structure_id").on('change',function() {
        var codestructure=this.value;
        var token=$('#token').val();
        $.ajax({
            url:'/filter-structure',
            type: 'post',
            data: {
                codestructure:codestructure,
                "_token": token
            },
            success:function(data) {
                $("#dt_id").empty();

                console.log(data);

                data.structure.child.forEach(element => {
                    $("#dt_id").append("<option>selectionner une direction technique</option><option value='"+element.id+"'>"+element.code+"</option>")
                });


          
                  /*    $("#display_signataire1").remove();
                    $("#display_signataire2").remove();
                    $("#display_distinction1").remove();
                    $("#display_distinction2").remove();  */ 

                
                if(data.signataire1[0].length==0 || data.signataire2.length==0)
                {


                    $("#display_signataire1").text("<strong style='color:red;font-size:0.6cm;' id='msg_sigantaire_1'>Veuillez paramètré le signataire</strong>");
                    $("#display_signataire2").append("<strong style='color:red;font-size:0.6cm;' id='msg_sigantaire_2'>Veuillez paramètré le signataire</strong>");


                }else
                {


                    $("#display_signataire1").append("<strong style='font-size=0.6cm;'>"+data.signataire1[0].nom+" "+data.signataire1[0].prenom+"</strong>");
                    $("#display_signataire2").append("<strong style='font-size=0.6cm;'>"+data.signataire2[0].nom+" "+data.signataire2[0].prenom+"</strong>");
                    $("#display_distinction1").append("<strong style='font-size=0.6cm;'>"+data.signataire1[0].distinction+"</strong>");
                    $("#display_distinction2").append("<span>"+data.signataire2[0].distinction+"</span>");

                    if(data.parinterim1.length!=0)
                    {
                        $("#mission_parinterim1").prop('checked',data.parinterim1[0].isinterim1);
                        $("#mission_parordre1").prop('checked',data.parinterim1[0].isparorodre1);
                        $("#nominterim_mission1").text(data.parinterim1[0].nom+" "+data.parinterim1[0].prenom);
                        $("#nominterim_val_mission1").val(data.parinterim1[0].matricule);
                    }

                   
                    if(data.parinterim2.length!=0)
                    {
                        $("#mission_parinterim2").prop('checked',data.parinterim2[0].isinterim2);
                        $("#mission_parordre2").prop('checked',data.parinterim2[0].isparorodre2);
                        $("#nominterim_mission2").text(data.parinterim2[0].nom+" "+data.parinterim2[0].prenom);
                        $("#nominterim_val_mission2").val(data.parinterim2[0].matricule);
                    }
                   

                    
                }



            },
            error:function(reject) {
                console.log(reject);
            }
        }

        );

    });



    /////////////////////////////////////////////// Filtre province


    $("#mission_region_id").on('change',function() {
        var region_id=this.value;
        var token=$('#token').val();
        $.ajax({
            url:'/filter-province',
            type: 'post',
            data: {
                region_id:region_id,
                "_token": token
            },
            success:function(data) {
                $("#mission_province_id").empty();
                $("#mission_commune_id").empty();

                $("#mission_province_id").append("<option>selectionner la province</option>")

                data.province.forEach(element => {
                    $("#mission_province_id").append("<option value='"+element.id+"'>"+element.libelleProvince+"</option>")
                });


                    /* $("#display_signataire1").remove();
                    $("#display_signataire2").remove();
                    $("#display_distinction1").remove();
                    $("#display_distinction2").remove();  */





            },
            error:function(reject) {
                console.log(reject);
            }
        }

        );

    });

    /////////////////////////////////////////////



     /////////////////////////////////////////////// Filtre commune


     $("#mission_province_id").on('change',function() {
        var province_id=this.value;
        var token=$('#token').val();
        $.ajax({
            url:'/filter-commune',
            type: 'post',
            data: {
                province_id:province_id,
                "_token": token
            },
            success:function(data) {
                $("#mission_commune_id").empty();

                $("#mission_commune_id").append("<option>selectionner la commune</option>")

                data.commune.forEach(element => {
                    $("#mission_commune_id").append("<option value='"+element.id+"'>"+element.libelleCommune+"</option>")
                });


                    /* $("#display_signataire1").remove();
                    $("#display_signataire2").remove();
                    $("#display_distinction1").remove();
                    $("#display_distinction2").remove();  */





            },
            error:function(reject) {
                console.log(reject);
            }
        }

        );

    });

    /////////////////////////////////////////////

});


function savemission(){

    var isinterim1 =$("#mission_parinterim1").is(":checked");
    var isinterim2=$("#mission_parinterim2").is(":checked");
    var isordre1=$("#mission_parordre1").is(":checked");
    var isordre2=$("#mission_parordre1").is(":checked");
    var interiname1=document.getElementById('nominterim_val_mission1').value ;
    var interiname2=$("#nominterim_val_mission2").value;
    
    var structure_id=$("#mission_structure_id").val();
    var objetmission=$("#objetmission").val();
    var datedepart=$("#datedebut").val();
    var datefin=$("#datefin").val();
    var vehiculemission=$("#immat_id").val();
    var chefmission=$("#chef_mission").val();
    var chauffeurmission=$("#conducteur_mission").val();
    var hebergement=$("#hebergement_id option:selected").val();
    var transport=$("#transport_id option:selected").val();
    var lieux_mission=[];
    var membremission=[];
    var token=$('#token').val();
    $("#table_lieu_mission").closest('tr');
   
    var tablelieumision=document.getElementById("table_lieu_mission");
   
    for (var i=1;i<tablelieumision.rows.length;i++) {
        let row = tablelieumision.rows[i]
        let col1 = row.cells[0].innerHTML;
        let col2=row.cells[1].innerHTML;
        let col3=row.cells[1].innerHTML;
        var ligne=col1+"/"+col2+"/"+col3;
        
         lieux_mission.push(ligne);
     }

     var tablemembremission=document.getElementById("agent_id_mission");

     for (var i=0;i<tablemembremission.rows.length;i++) {
        let row = tablemembremission.rows[i]
        let col = row.cells[0]
        membremission.push(col.innerHTML);
     }
       
     
     $.ajax({
        url: '/save-mission',
        type:'post',
        data: {
            structure_id:structure_id,
            objetmission:objetmission,
             datedepart:datedepart,
             datefin:datefin,
             vehiculemission:vehiculemission,
             chefmission:chefmission,
            chauffeurmission:chauffeurmission,
             hebergement:hebergement,
             transport:transport,
             lieux_mission:lieux_mission,
             membremission:membremission,
             isinterim1:isinterim1,
             isinterim2:isinterim2,
             isordre1:isordre1,
             isordre2:isordre2,
             interiname1:interiname1,
             interiname2:interiname2,
             "_token": token
        }
    }).done(function(data){
        
            console.log(data);

            var loc=window.location
            var adresse=loc.protocol+"//"+loc.hostname+":"+loc.port+"/display-reporting-mission/"+data;
            
            window.open(adresse, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
       
    });
 

}
    
