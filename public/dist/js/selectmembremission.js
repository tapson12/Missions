$(document).ready(function() {

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
                
            data.forEach(element => {
                $("#membre_mission_table_body").append("<tr><td><input type='checkbox'></td><td>"+element.nom+" "+element.nom+"</td><td> "+element.matricule+"</td><td>"+element.code+"<td>"+element.coderespond+"</td>tr>");
            });
        });



    });

    $("#insert_agent_to_mission").on('click',function() {
        var grid = document.getElementById("membre_mission_table");
 
        var checkBoxes = grid.getElementsByTagName("INPUT");

        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].parentNode.parentNode;
                console.log(row);
                $("#agent_id_mission").append("<tr><td>"+row.cells[2].innerHTML+"</td><td>"+row.cells[1].innerHTML+"</td><td>"+row.cells[3].innerHTML+"</td><td>"+row.cells[4].innerHTML+"</td><td><button class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");
            }
        }
    });
});