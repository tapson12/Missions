$(document).ready(function() {

    $("#responsabilite").select2();
    $("#structure").select2();
    $("#agent").select2();
    var table=$("#table_agent").DataTable(
      
        {
          
          "paging": true,
          "pageLength": 10,
          "lengthChange": true,
          "searching": true,
          "sortOrder": 'desc',
          "info": true,
          "autoWidth": false,
          "responsive": true,
          stateSave: true,
          sDom: 'lrtip',
          language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
        }
        });

        var tableaffectation=$("#table_affectation").DataTable(
      
            {
              
              "paging": true,
              "pageLength": 10,
              "lengthChange": true,
              "searching": true,
              "sortOrder": 'desc',
              "info": true,
              "autoWidth": false,
              "responsive": true,
              stateSave: true,
              sDom: 'lrtip',
              language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
            }
            });

    $("#reseach_id").on('keyup',function () {
        table.search(this.value).draw();
    });

    $("#reseach_affectation_id").on('keyup',function () {
        tableaffectation.search(this.value).draw();
    });
    

    $('#exampleModal').on('hidden.bs.modal', function () {
        $("#agent_success_save_alert").hide();
        $("#matricule").val("");
        $("#nom").val("");
        $("#prenom").val("");
         $("#contact").val("");
        $("#sexe").val();
        $("#datenaissance").val("");
        $("#distinction").val("");
       $("#situationmatrimoniale").val("");
       $("#type_agent").val("");
    });

    $("#alert_agent").hide();
    $("#agent_success_save_alert").hide();
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
   var matricule=$("#matricule").val().split(' ').join('');
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

    },
    success:function(data) {
        $("#agent_success_save_alert").show()
        $("#table_agent_body").append("<tr><td>"+matricule+"</td><td>"+nom+"</td><td>"+prenom+"</td> <td>"+datenaissance+"</td><td>"+sexe+"</td><td><button class='btn btn-danger'><i class='fa fa-trash'></i></button ></td></tr>")
        $("#matricule").val("");
        $("#nom").val("");
        $("#prenom").val("");
         $("#contact").val("");
        $("#sexe").val();
        $("#datenaissance").val("");
        $("#distinction").val("");
       $("#situationmatrimoniale").val("");
       $("#type_agent").val("");
    },
    error:function(reject) {
        if(reject.status==400)
        {
            var errors = $.parseJSON(reject.responseText).errors;


            

          $.each(errors, function (key, val) {
                $("#messageerror").append("<br>"+val[0]) 
            }); 
            $("#alert_agent").show();
            
        }
    }
});
}

function saveaffectation() {
   
    var token=$('#token').val();
    var activer= $("#activer").prop('checked');
    var agent_id=$("#agent").val();
    var structure =$("#structure").val();
    var responsabilite=$("#responsabilite").val();
    var fonction=$("#fonction").val();
    var datedebut=$("#datedebut").val();
    var datefin=$("#datefin").val();
    var structure_text=$("#structure option:selected").text();
    var fonction_text=$("#fonction option:selected").text();
    var responsabilite_text=$("#responsabilite option:selected").text();
    var agent_text=$("#agent option:selected").text().split(" ");
    alert(agent_id);
    $.ajax({
     url: '/save-affectation',
     type:'POST',
     data: {
         activer:activer,
         agent_id:agent_id,
         structure:structure,
         responsabilite:responsabilite,
         fonction:fonction,
         datedebut:datedebut,
         datefin:datefin,
         "_token": token
 
     }
 }).done(function(data){
     
     console.log(agent_text);
     $("#table_affectation_body").append("<tr><td>"+agent_text[0]+"</td><td>"+agent_text[1]+"</td><td>"+structure_text+"</td> <td>"+fonction_text+"</td><td>"+responsabilite_text+"</td><td><button class='btn btn-danger'><i class='fa fa-trash'></i></button ></td></tr>")
     $("#table_agent").DataTable().ajax.relaod();
       
 });
 
 
   
    
 
 }
