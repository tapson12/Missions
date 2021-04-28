$(document).ready(function() {

    var ref= $('#hldy_tbl').DataTable({
        "responsive": true,
        "processing":true,
        "serverSide":true,
        "ajax":{
            "url":"get_hotels.php",
            "type":"POST"
        },
        "drawCallback": function( settings ) {
            $('<li><a onclick="refresh_tab()" class="fa fa-refresh"></a></li>').prependTo('div.dataTables_paginate ul.pagination');
        }
    });

    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
           $("#contact_hiden").hide();
           $("#situation_id").hide();
        }
        else if($(this).prop("checked") == false){
            $("#contact_hiden").show();
           $("#situation_id").show();
        }
    });

});

function displaysubstructure(id)
{
    $.ajax({
        url: '/view-structure-detail',
        type:'GET',
    	data: {structure_id:id }
	}).done(function(data){
        $('#childtable').empty();
       
        data.child.forEach((item) => {
            
            $('#childtable').append("<tr><td>"+item.libellestructure+"</td><td>"+data.libellestructure+"</td><td><a href='/display-update-structure-form/"+item.id+"' class='btn btn-outline-success'><i style='color: #007bff'  class='fa fa-edit'></i></a><a href='/delete-structure/"+item.id+"' class='btn btn-danger'><i   class='fa fa-trash'></i></a></td>/tr>");
           
          });

          
	});
}

 function saveagent() {
   
   var token=$('#token').val();
   var agentexterne= $("#agentexterne").prop('checked');
   var matricule=$("#matricule").val();
   var nom =$("#nom").val();
   var prenom=$("#prenom").val();
   var contact=$("#contact").val();
   var sexe=$("#sexe").val();
   var datenaissance=$("#datenaissance").val();
   var distinction=$("#distinction").val();
   var situationmatrimoniale=$("#situationmatrimoniale").val();
   var type_agent=$("#type_agent").val();

   $.ajax({
    url: '/save-agent',
    type:'POST',
    data: {
        agentexterne:agentexterne,
        matricule:matricule,
        nom:nom,
        prenom:prenom,
        contact:contact,
        sexe:sexe,
        datenaissance:datenaissance,
        distinction:distinction,
        situationmatrimoniale:situationmatrimoniale,
        type_agent:type_agent,
        "_token": token

    }
}).done(function(data){

    console.log(data);
    $("#table_agent_body").append("<tr><td>"+matricule+"</td><td>"+nom+"</td><td>"+prenom+"</td> <td>"+datenaissance+"</td><td>"+sexe+"</td><td><button class='btn btn-danger'><i class='fa fa-trash'></i></button ></td></tr>")
    $("#table_agent").DataTable().ajax.relaod();
      
});
}

function affectationagent() {
   
    var token=$('#token').val();
    var activer= $("#active").prop('checked');
    var agent=$("#agent").val();
    var structure =$("#structure").val();
    var responsabilite=$("#responsabilite").val();
    var fonction=$("#fonction").val();
    
 
    $.ajax({
     url: '/save-affectation',
     type:'POST',
     data: {
         active:avtive,
         agent:agent,
         structure:structure,
         responsabilite:responsabilite,
         fonction:fonction,
         "_token": token
 
     }
 }).done(function(data){
     
     console.log(data);
     $("#table_agent_body").append("<tr><td>"+matricule+"</td><td>"+nom+"</td><td>"+prenom+"</td> <td>"+datenaissance+"</td><td>"+sexe+"</td><td><button class='btn btn-danger'><i class='fa fa-trash'></i></button ></td></tr>")
     $("#table_agent").DataTable().ajax.relaod();
       
 });
 
 
   
    
 
 }