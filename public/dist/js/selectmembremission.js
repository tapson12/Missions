$(document).ready(function() {
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

                $("#membre_mission_table_body").append("<tr><td><input type='checkbox'></td><td>"+element.nom+" "+element.nom+"</td><td> "+element.matricule+"</td><td>"+element.code+"</td>tr>");
            });
        });



    });
});