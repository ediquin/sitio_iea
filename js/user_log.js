
  $(document).ready(function(){
    // Get Report passenger
    $(document).on('click', '#user_log', function(){
      
      var date_sel = $('#date_sel').val();
      //var date_sel = 0;
      var date_start = $('#date_start').val();
      var date_final = $('#date_final').val();
      var nombre = $('#nombre').val();
      $.ajax({
        url: 'procesos/recuperarDatos.php',
        type: 'POST',
        data: {
          'log_date': 1,
          'date_sel': 1,
          'select_date':1,
          'date_final' : date_final,
          'date_start' : date_start,
          'nombre': nombre
        },
        success: function(response){
          $('#userslog').html(response);
        }
      });
    });
  });