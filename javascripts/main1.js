$(document).ready(function() {

  function reload() {
    $('.hidden').fadeOut();
    $('displayOutput').empty();
    $.get( '/words', function(data) {
      console.log(data);
      var rendered = '<table data-widget="datatable" data-scrollaxis="x" class="ibm-data-table" style="overflow: hidden; position: relative; border: 0px; width: 100%;"><tbody><caption><p>A continuación puede consultar los próximos eventos.</p></caption><thead><tr><th scope="col">ID</th><th scope="col">Fecha</th><th scope="col">Lugar</th><th scope="col">Evento</th><th scope="col">Mas info</th><th scope="col">Registrarse</th></tr></thead>';
      data.forEach(function(item) {
        rendered = rendered + "<tr><td>" + item.id + "</td><td>" + item.fecha + "</td><td>" + item.lugar + "</td><td>" + item.evento + "</td><td>" + item.masinfo + "</td><td>" + item.registrarse + "</td></tr>";
		
      });
      rendered = rendered + "</tbody></table>";

      $('#displayOutput').html(rendered);
    });
    $('.hidden').fadeIn();
  }

  $('#add-word').submit(function(e) {
    e.preventDefault();
	

    $.ajax({
      url: '/words',
      type: 'PUT',
      data: $(this).serialize(),
      success: function(data) {
        reload();
      }
    });
  });
  
  
  $('#delete-word').submit(function(e) {
    e.preventDefault();

    $.ajax({
      url: '/words',
      type: 'DELETE',
      data: $(this).serialize(),
      success: function(data) {
        reload();
      }
    });
  });

  // load data on start
  reload();

});
