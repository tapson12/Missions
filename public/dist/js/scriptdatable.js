$(document).ready(function() {
    $('#envoyeur').select2();
    $('#vehicules').select2();
    $('#envoyeur_id').select2();
    $('#vehicule_id').select2();
    
    
    $('#typeenvoyeurTable').DataTable(
      
      {
        "paging": false,
        "pageLength": 5,
        "lengthChange": true,
        "searching": true,
        "sortOrder": 'desc',
        "info": true,
        "autoWidth": false,
        "responsive": true,
        language: {
          url: '/localisation/fr_FR.json'
      }
      });

      $('#marqueTables').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": true,
        "searching": true,
        "sortOrder": 'asc',
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      $('#typeVehiculeTables').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": true,
        "searching": true,
        "sortOrder": 'asc',
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      

      $('#listevehicule').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": true,
        "searching": true,
        "sortOrder": 'asc',
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      $('#anomalie').multiSelect();
      
})