function load_data(query) {
  
  $.ajax({
    url: "http://localhost/StudFYP_Project/StudFYP_Project/html/module5/DAO/StudentDataService.php",
    method: "POST",
    data: {functionname: 'getLectEvaluator()', arguments: query },
    success: function (data) {
      $('#result').html(data);
    }
  });
}