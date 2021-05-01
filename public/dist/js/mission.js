$(document).ready(function() {
    $("#mission_structure_id").select2();
    $("#immat_id").select2();

   

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
    
                    }

                   
                    if(data.parinterim2.length!=0)
                    {
                        $("#mission_parinterim2").prop('checked',data.parinterim2[0].isinterim2);
                        $("#mission_parordre2").prop('checked',data.parinterim2[0].isparorodre2);
                        $("#nominterim_mission2").text(data.parinterim2[0].nom+" "+data.parinterim2[0].prenom);
    
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
   var structure_id=$("#mission_structure_id").val();
    var objetmission=$("#objetmission").val();
    var datedepart=$("#datedebut").val();
    var datefin=$("#datefin").val();
    var vehiculemission=$("#immat_id").val();
    var chefmission=$("#chef_mission").val();
    var chauffeurmission=$("#conducteur_mission").val();
    var hebergement=$("#hebergement_id").val();
    var transport=$("#transport_id").val();
    var lieux_mission=[];

    $("#table_lieu_mission").closest('tr');
   
    console.log(document.getElementById("table_lieu_mission").rows[1].cells[0].innerHTML);
   
}
