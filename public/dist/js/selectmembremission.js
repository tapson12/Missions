$(document).ready(function() {
    
    $("#check_type_structure").on('change',function() {
        var type_structure=$("#check_type_structure").is(":checked");

        $.ajax({
            url: '/filter-strucutre-mission',
            type:'get',
            data: {
                type_structure:type_structure,
            }
        }).done(function(data){
            $("#membre_mission_table_body").empty();
            $("#mission_structure_agent_id").empty();
               console.log(data)
               data.forEach(element => {
                $("#mission_structure_agent_id").append("<option  value='"+element.id+"'>"+element.code+"</option>");
            });
            
        });
    });
    
    $('#table_agent_mission_id').on("click", "button", function(){
        $(this).closest('tr').remove();


  });

    $("#mission_structure_agent_id").on('change',function() {
        
        var codestructure=$("#mission_structure_agent_id option:selected").val();
        $.ajax({
            url: '/filter-agent-mission',
            type:'get',
            data: {
                codestructure:codestructure,
            }
        }).done(function(data){
            $("#membre_mission_table_body").empty();
                console.log(data);
            data.forEach(element => {
                $("#membre_mission_table_body").append("<tr><td><input type='checkbox'></td><td>"+element.nom+" "+element.prenom+"</td><td> "+element.matricule+"</td><td>"+element.code+"<td>"+element.coderespond+"</td>tr>");
            });
        });



    });

    $("#insert_agent_to_mission").on('click',function() {
        var grid = document.getElementById("membre_mission_table");
 
        var checkBoxes = grid.getElementsByTagName("INPUT");

        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].parentNode.parentNode;
                
                $("#conducteur_mission").append("<option value='"+row.cells[1].innerHTML+"'>"+row.cells[1].innerHTML+"</option>");
                $("#chef_mission").append("<option value='"+row.cells[1].innerHTML+"'>"+row.cells[1].innerHTML+"</option>");
                
                $("#agent_id_mission").append("<tr><td>"+row.cells[2].innerHTML+"</td><td>"+row.cells[1].innerHTML+"</td><td>"+row.cells[3].innerHTML+"</td><td>"+row.cells[4].innerHTML+"</td><td><button class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");
            }
        }
    });
});