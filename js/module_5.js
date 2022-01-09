function load_evaluator(query, id) {
  $.ajax({
    method: "POST",
    data: {
      search_evaluator: query,
      stud_id: id
    },
    url: "http://localhost/StudFYP_Project/html/module5/Controller/StudentHandler.php",
    success: function (data) {
      var row_count = $('#result').html(data).find('tr').length;
      $('#evaluator_counter').html("Total " + row_count + " Evaluation Panel");
    }
  });
}

function load_assigned_evaluator(query, id) {
  $.ajax({
    method: "POST",
    data: {
      search_assigned_evaluation: query, lecturer_id: id
    },
    url: "http://localhost/StudFYP_Project/html/module5/Controller/LecturerHandler.php",
    success: function (data) {
      var row_count = $('#result').html(data).find('tr').length;
      $('#row_counter').html("Total " + row_count + " Assigned Evaluation");
    }
  });
}

function submit_evaluation_form(form){
  $.ajax({
    url: 'http://localhost/StudFYP_Project/html/module5/Controller/EvaluateFormHandler.php',
    type: 'post',
    data: form,
    success: function() {
        // Whatever you want to do after the form is successfully submitted
        alert("data inserted")
    }
});
}

function load_evaluation_report(query, id) {
  $.ajax({
    method: "POST",
    data: {
      search_evaluation_report: query, lecturer_id: id
    },
    url: "http://localhost/StudFYP_Project/html/module5/Controller/LecturerHandler.php",
    success: function (data) {
      var row_count = $('#result').html(data).find('tr').length;
      $('#row_counter').html("Total " + row_count + " Evaluation Report");
    }
  });
}


function pass_er_array(er_id_array) {
  $.ajax({
    method: "POST",
    data: {
      er_array: er_id_array
    },
    url: "http://localhost/StudFYP_Project/html/module5/Controller/LecturerHandler.php",
    success: function (data) {
      window.location.reload();
    }
  });
}
