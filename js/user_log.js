$(document).ready(function(){
  // Get Report passenger
  $(document).on('click', '#user_log', function(){
    
    var date_sel = $('#date_sel').val();
    
    $.ajax({
      url: 'procesos/recuperarDatos.php',
      type: 'POST',
      data: {
        'log_date': 1,
        'date_sel': date_sel,
      },
      success: function(response){
        $.ajax({
          url: "procesos/recuperarDatos.php",
          type: 'POST',
          data: {
            'log_date': 1,
            'date_sel': date_sel,
            'select_date': 0,
          }
          }).done(function(data) {
          $('#userslog').html(data);
        });
      }
    });
  });
});