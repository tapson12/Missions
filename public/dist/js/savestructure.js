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
            $('#childtable').append("<tr><td>"+item.libellestructure+"</td><td>"+data.libellestructure+"</td>/tr>");
           
          });

          
	});
}