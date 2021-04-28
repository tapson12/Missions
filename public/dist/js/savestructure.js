$(document).ready(function() {

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

href="{{url('/display-update-structure-form/'.$structure->id)}}"

