function load_data(query) {
  $.ajax({
    method: "POST",
    data: {
      search:query
    },
    url: "http://localhost/StudFYP_Project/StudFYP_Project/html/module5/DAO/StudentHandler.php",
    success: function(data) {
      $('#result').html(data);
    }
  }); 
}