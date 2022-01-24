

function load_evaluator(query, id) {

    $.ajax({
        method: "POST",
        data: {
            search_evaluator: query,
            stud_id: id,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/StudentHandler.php",
        success: function (data) {
            var row_count = $("#result").html(data).find("tr").length;
            $("#evaluator_counter").html(
                "Total " + row_count + " Evaluation Panel"
            );
        },
    });
}

function load_lect_assigned_evaluator(query, id) {
    $.ajax({
        method: "POST",
        data: {
            search_assigned_evaluation: query,
            lecturer_id: id,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/LecturerHandler.php",
        success: function (data) {
            var row_count = $("#result").html(data).find("tr").length;

            if (row_count == 0) {
                $("#message_box").html(
                    '<div class="alert alert-warning" role="alert"> There are currently no assigned FYP. For more information, can contact the coordinator.</div>'
                );
            } else {
                $("#row_counter").html("Total " + row_count + " Assigned Evaluation");
                $(".alert").alert('close');
            }

        },
    });
}

function load_ip_assigned_evaluator(query, id) {
    $.ajax({
        method: "POST",
        data: {
            search_assigned_evaluation: query,
            ip_id: id,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/ExternalHandler.php",
        success: function (data) {
            var row_count = $("#result").html(data).find("tr").length;

            if (row_count == 0) {
                $("#message_box").html(
                    '<div class="alert alert-warning" role="alert"> There are currently no assigned FYP. For more information, can contact the coordinator.</div>'
                );
            } else {
                $("#row_counter").html("Total " + row_count + " Assigned Evaluation");
                $(".alert").alert('close');
            }

        },
    });
}

function load_evaluation_report(query, id) {
    $.ajax({
        method: "POST",
        data: {
            search_evaluation_report: query,
            lecturer_id: id,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/LecturerHandler.php",
        success: function (data) {
            var row_count = $("#result").html(data).find("tr").length;
            if (row_count == 0) {
                $("#result").html(
                    '<tr><td colspan = "9"><div class="alert alert-warning" role="alert">There are currently no evaluated FYP</div></td></tr>'
                );
            } else {
                $("#row_counter").html(
                    "Total " + row_count + " Evaluation Report"
                );

                $(".alert").alert('close');
            }
        },
    });
}

function update_er_array(er_id_array) {
    $.ajax({
        method: "POST",
        data: {
            update_er: er_id_array,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/LecturerHandler.php",
        success: function (data) {
            window.location.replace(
                "https://studfyp.herokuapp.com/html/module5/lecturer/update_evaluation_report.php?view=0"
            );
        },
    });
}

function save_temp_ev(result_id, rubric_id_array, rubric_mark_array, feedback) {
    $.ajax({
        method: "POST",
        data: {
            m_result_id: result_id,
            m_rubric_id_array: rubric_id_array,
            m_rubric_mark_array: rubric_mark_array,
            m_feedback: feedback,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/SessionHandler.php",
        success: function (data) { },
        error: function (request, status, error) {
            alert(request.responseText);
        },
    });
}

function delete_er_array(er_id_array) {
    $.ajax({
        method: "POST",
        data: {
            delete_er: er_id_array,
        },
        url: "https://studfyp.herokuapp.com/html/module5/Controller/LecturerHandler.php",
        success: function (data) {
            window.location.reload();
        },
    });
}
