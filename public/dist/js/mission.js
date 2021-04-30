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

                
                data.structure.child.forEach(element => {
                    $("#dt_id").append("<option>selectionner une direction technique</option><option value='"+element.id+"'>"+element.code+"</option>")
                }); 

          
                    /* $("#display_signataire1").remove();
                    $("#display_signataire2").remove();
                    $("#display_distinction1").remove();
                    $("#display_distinction2").remove();  */

                
                if(data.signataire1.length==0 || data.signataire2.length==0)
                {
                    

                    $("#display_signataire1").append("<strong style='color:red;font-size:0.6cm;' id='msg_sigantaire_1'>Veuillez paramètré le signataire</strong>");
                    $("#display_signataire2").append("<strong style='color:red;font-size:0.6cm;' id='msg_sigantaire_2'>Veuillez paramètré le signataire</strong>");

                
                }else
                {
                   
                    
                    $("#display_signataire1").append("<strong style='font-size=0.6cm;'>"+data.signataire1[0].nom+" "+data.signataire1[0].prenom+"</strong>");
                    $("#display_signataire2").append("<strong style='font-size=0.6cm;'>"+data.signataire2[0].nom+" "+data.signataire2[0].prenom+"</strong>");
                    $("#display_distinction1").append("<strong style='font-size=0.6cm;'>"+data.signataire1[0].distinction+"</strong>");
                    $("#display_distinction2").append("<span>"+data.signataire2[0].distinction+"</span>");
                
                }

               
                
            },
            error:function(reject) {
                console.log(reject);
            }
        }
        
        );

    });

});
