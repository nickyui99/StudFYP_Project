<?php
    /**UPDATED 11/1/2022 */
    //First, connect to the MySQL server.

    $link = mysqli_connect("localhost", "root", "");
    if (!$link) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    mysqli_select_db($link, "studfyp_db") or die(mysqli_connect_error());

    //create administrator table
    $createAdminQuery = "CREATE TABLE administrator (admin_id VARCHAR(10), admin_name VARCHAR(50), admin_password VARCHAR(15), PRIMARY KEY(admin_id))";

    if (mysqli_query($link, $createAdminQuery)) {
        echo "Table administrator created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create student table
    $sql = "CREATE TABLE student (stud_id VARCHAR(10), stud_name VARCHAR(50), stud_password VARCHAR(15), stud_address VARCHAR(50), stud_email VARCHAR(50), stud_contact_num VARCHAR(15), stud_faculty VARCHAR(20), stud_company_attached VARCHAR(20), stud_qrcode LONGBLOB, PRIMARY KEY(stud_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table student created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create fyp_stud table
    $sql = "CREATE TABLE fyp_stud (fyp_stud_id VARCHAR(10), stud_id VARCHAR(10), stud_name VARCHAR(50), fyp_stage VARCHAR(10), fyp_progress_status INT(3), proposal_document LONGBLOB, PRIMARY KEY(fyp_stud_id), FOREIGN KEY (stud_id) REFERENCES student(stud_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table fyp_stud created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create fyp_project table
    $sql = "CREATE TABLE fyp_project (fyp_proj_id VARCHAR(10), stud_id VARCHAR(10), proj_title VARCHAR(50), proj_fyp_stage VARCHAR(10), fyp_proj_progress INT(3), document_submission_1 LONGBLOB, document_submission_2 LONGBLOB, document_submission_3 LONGBLOB, fyp_qrcode LONGBLOB, PRIMARY KEY(fyp_proj_id), FOREIGN KEY (stud_id) REFERENCES student(stud_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table fyp_project created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create lecturer table
    $sql = "CREATE TABLE lecturer (lect_id VARCHAR(10), lect_name VARCHAR(50), lect_password VARCHAR(15), lect_contact_num VARCHAR(15), lect_email VARCHAR(50), lect_address VARCHAR(50), lect_position VARCHAR(20), lect_expertise VARCHAR(100), lect_faculty VARCHAR(10), PRIMARY KEY(lect_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table lecturer created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create fyp_coordinator table
    $sql = "CREATE TABLE fyp_coordinator (lect_id VARCHAR(10), coordinator_name VARCHAR(50), coordinate_faculty VARCHAR(15), coordinate_psm_level VARCHAR(15), coordinator_expertise VARCHAR(100), PRIMARY KEY(lect_id), FOREIGN KEY(lect_id) REFERENCES lecturer(lect_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table fyp_coordinator created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create evaluation_rubric table
    $sql = "CREATE TABLE evaluation_rubric (evaluation_rubric_id VARCHAR(10), rubric_num VARCHAR(10), rubric_title VARCHAR(200), rubric_details LONGTEXT, rubric_mark FLOAT(5), rubric_weightage FLOAT(5), rubric_submission INT(3), rubric_fyp VARCHAR(10), PRIMARY KEY(evaluation_rubric_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table evaluation_rubric created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create announcement table
    $sql = "CREATE TABLE announcement (announcement_id VARCHAR(10), announcement_title VARCHAR(100), announcement_description VARCHAR(300), PRIMARY KEY(announcement_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table announcement created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create activity table
    $sql = "CREATE TABLE activity (activity_id VARCHAR(10), activity_name VARCHAR(20), activity_sub_type INT(3), activity_fyp_level VARCHAR(10), activity_start_date DATE, activity_close_date DATE, PRIMARY KEY(activity_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table activity created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create fyp_supervisor table
    $sql = "CREATE TABLE fyp_supervisor (supervisor_id VARCHAR(10), lect_id VARCHAR(10), fyp_stud_id VARCHAR(10), supervisor_name VARCHAR(50), supervisor_email VARCHAR(50), supervisor_number VARCHAR(15), supervisor_address VARCHAR(50), PRIMARY KEY(supervisor_id), FOREIGN KEY(lect_id) REFERENCES lecturer(lect_id), FOREIGN KEY(fyp_stud_id) REFERENCES fyp_stud(fyp_stud_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table supervisor created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create industrial_panel table
    $sql = "CREATE TABLE industrial_panel (ip_id VARCHAR(10), ip_name VARCHAR(50), ip_contact_num VARCHAR(15), ip_email VARCHAR(50), ip_company VARCHAR(20), ip_password VARCHAR(15), PRIMARY KEY(ip_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table industrial_panel created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create assigned_lecturer_evaluator table
    $sql = "CREATE TABLE assigned_lecturer_evaluator ( assigned_lect_id VARCHAR(10), lect_id VARCHAR(10), stud_id VARCHAR(10), PRIMARY KEY(assigned_lect_id), FOREIGN KEY(lect_id) REFERENCES lecturer(lect_id), FOREIGN KEY(stud_id) REFERENCES student(stud_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table assigned_industrial_evaluator created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create assigned_industrial_evaluator table
    $sql = "CREATE TABLE assigned_industrial_evaluator (assigned_ip_id VARCHAR(10), ip_id VARCHAR(10), stud_id VARCHAR(10), PRIMARY KEY(assigned_ip_id), FOREIGN KEY(ip_id) REFERENCES industrial_panel(ip_id), FOREIGN KEY(stud_id) REFERENCES student(stud_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table assigned_industrial_evaluator created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create evaluation_result table
    $sql = "CREATE TABLE evaluation_result (result_id VARCHAR(10), fyp_proj_id VARCHAR(10), assigned_lect_id VARCHAR(10), assigned_ip_id VARCHAR(10), submission_level INT(3), evaluation_feedback VARCHAR(300), evaluation_date DATE, PRIMARY KEY (result_id), FOREIGN KEY (fyp_proj_id) REFERENCES fyp_project(fyp_proj_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table evaluation_result created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create project_logbook table
    $sql = "CREATE TABLE project_logbook (logbook_id VARCHAR(10), fyp_proj_id VARCHAR(10), submission INT, logbook_date DATE, logbook_details VARCHAR(100), PRIMARY KEY(logbook_id), FOREIGN KEY(fyp_proj_id) REFERENCES fyp_project(fyp_proj_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table project_logbook created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //create ev_mark_details table
    $sql = "CREATE TABLE ev_mark_details (ev_mark_id INT NOT NULL AUTO_INCREMENT, result_id VARCHAR(10), evaluation_rubric_id VARCHAR(10), actual_mark FLOAT, PRIMARY KEY(ev_mark_id), FOREIGN KEY(result_id) REFERENCES evaluation_result(result_id), FOREIGN KEY(evaluation_rubric_id) REFERENCES evaluation_rubric(evaluation_rubric_id))";

    if (mysqli_query($link, $sql)) {
        echo "Table ev_mark_details created successfully <br>";
    } else {
        echo 'Error creating table: ' . mysqli_error($link) . "<br>";
    }

    //And finally we close the connection to the MySQL server
    mysqli_close($link);
?>