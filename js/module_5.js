function load_data(query) {
  $.ajax({
    method: "POST",
    data: {
      search_evaluator:query
    },
    url: "http://localhost/StudFYP_Project/html/module5/DAO/StudentHandler.php",
    success: function(data) {
      var row_count = $('#result').html(data).find('tr').length;
      $('#evaluator_counter').html("Total " + row_count + " Evaluation Panel");
    }
  }); 
}