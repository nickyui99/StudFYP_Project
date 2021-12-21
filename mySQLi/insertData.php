<?php
	// to make a connection with database
	$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

	// to select the targeted database
	mysqli_select_db($link, "studfyp_db") or die(mysqli_error($link));
		
	// Insert data into administrator table
	$query = 	"insert into administrator values('A001', 'Ali', '1234'),
				('A002', 'Fatimah', '5678')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);

	if($result){      
    	 echo("administrator data inserted <br>");			
	}
	else {       
	    die("administrator data insert failed <br>");
	}

	// Insert data into student table
	$query = 	"insert into student values('CA18016', 'Tan Chia Hui', 'ca18016', 'Jalan Sg Johor, Taman Cempeka, Johor', 'chiahui@gmail.com', '0175551111', 'FK', 'SysArmy.Sdn Bhd', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CA18016.png')), 
				('CB19124', 'Aiman Basheer Abdulwareth Mohammed', 'cb19124', 'Jalan Lenga, Taman Singa, Kuala Lumpur', 'aiman@gmail.com', '0124411344', 'FK', 'Samsung Sdn Bhd', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CD18001.png')), 
				('CD18001', 'Siti Binti Abu Bakar', 'cd18001', 'Jalan Bersatu, Taman Bahagia, Kedah', 'siti@gmail.com', '0164425512', 'FK', '-', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CB19124.png')), 
				('CB19080', 'Nicholas Ooi Zhee Chen', 'cb19080', 'Jalan Ipoh, Taman Intan, Ipoh', 'nicholas@gmail.com', '01137002219', 'FK', 'New Digital Sdn Bhd', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CB19080.png'))"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("student data inserted <br>");			
	}
	else {       
	    die("student data insert failed <br>");
	}

	// Insert data into fyp_stud table
	$query = 	"insert into fyp_stud values('FS001', 'CA18016', 'Tan Chia Hui', 'PSM1', '2', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/CA18016_Proposal.docx')), 
				('FS002', 'CB19124', 'Aiman Basheer Abdulwareth Mohammed', 'PSM2', '1', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/CB19124_Proposal.docx'))"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("fyp_stud data inserted <br>");			
	}
	else {       
	    die("fyp_stud data insert failed <br>");
	}
	
	// Insert data into fyp_project table
	$query = 	"insert into fyp_project values('FP001', 'CA18016', 'Advanced Mobile Store', 'PSM1', '2', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/CA18016_Submission1.pdf'), LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/CA18016_Submission2.pdf'), NULL, LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_FP001.png')),
				('FP002', 'CB19124', 'Attendance system', 'PSM1', '1', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/CB19124_Submission1.pdf'), NULL, NULL, LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_FP002.png'))"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("fyp_project data inserted <br>");			
	}
	else {       
	    die("fyp_project data insert failed <br>");
	}

	// Insert data into lecturer table
	$query = 	"insert into lecturer values('S001', 'Dr. Azlina Binti Zainuddin', 's001', '0123336677', 'azlina@ump.edu.my', 'S352 Kampung Sri Langkas Batu 13 Jalan 47100 Puchong Malaysia', 'Senior Lecturer', 'Requirement Engineering, Software Quality Assurance and Software Testing', 'FK'),
				('S002', 'Dr Mohammad Amirulkhairi Bin Zubir', 's002', '0145555777', 'amirulkhairi@ump.edu.my', 'A 6 Jln Sagu 1 Taman Daya 81100, Johor', 'Senior Lecturer', 'Civil Engineering', 'FTKA'),
				('S003', 'Dr. Fatihah Ayu Bin Amin', 's003', '0454556772', 'fatihah@ump.edu.my', 'Jalan Geliga Sakti,Taman Permai,Terengganu', 'Lecturer', 'Biotech', 'FIST'),
				('S012', 'Dr. Ali Abdulrahman Nasser', 's012', '0823456781', 'ali_abdulrahman012@ump.edu.my', 'No. 354 Jln Tok Ungku 70100 Negeri Sembilan', 'Senior Lecturer', 'Mechanical Engineering', 'FKM'),
				('S191', 'Dr. Mohammed ben Salem Mustafa', 's191', '0128660630', 'mohammed55@ump.edu.my', '38st Floor, Imbi Plaza, Jalan Imbi', 'Senior Lecturer', 'Design integrated systems', 'FK')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("lecturer data inserted <br>");			
	}
	else {       
	    die("lecturer data insert failed <br>");
	}

	// Insert data into fyp_coordinator table
	$query = 	"insert into fyp_coordinator values('S001', 'Dr. Azlina Binti Zainuddin', 'FK', 'PSM 1,2', 'Requirement Engineering, Software Quality Assurance and Software Testing'),
				('S002', 'Dr Mohammad Amirulkhairi Bin Zubir', 'FK', 'PSM 2', 'Civil Engineering'),
				('S012', 'Dr. Ali Abdulrahman Nasser', 'FTEK', 'PSM 1', 'Mechanical Engineering'),
				('S191', 'Dr. Mohammed ben Salem Mustafa', 'FKM', 'PSM 1,2', 'Design integrated systems')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("fyp_coordinator data inserted <br>");			
	}
	else {       
	    die("fyp_coordinator data insert failed <br>");
	}

	// Insert data into fyp_supervisor table
	$query = 	"insert into fyp_supervisor values('SU001', 'S002', 'FS001', 'Dr. Mohammad Amirulkhairi Bin Zubir', 'amirulkhairi@ump.edu.my', '0145555777', 'A 6 Jln Sagu 1 Taman Daya, 81100 Johor'),
				('SU002', 'S003', 'FS002', 'Dr. Fatihah Ayu Bin Amin', 'fatihah@ump.edu.my', '0454556772', 'Jalan Geliga Sakti,Taman Permai,Terengganu')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("fyp_supervisor data inserted <br>");			
	}
	else {       
	    die("fyp_supervisor data insert failed <br>");
	}

	// Insert data into industrial_panel table
	$query = 	"insert into industrial_panel values('IP001', 'Mr. Ooi Kai Cheng', '013324590', 'kaicheng@gmail.com', 'Google Inc.', 'ip001'),
				('IP002', 'Mr. Ali bin Washeed', '019956342', 'abw@outlook.com', 'Microsoft Inc', 'ip002'),
				('IP003', 'Mr. Warren Roller', '014556631', 'wroller@gmail.com', 'SinHub Inc.', 'ip003')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	     
	if($result){      
    	 echo("industrial_panel data inserted <br>");			
	}
	else {       
	    die("industrial_panel data insert failed <br>");
	}

	// Insert data into assigned_lecturer_evaluator table
	$query = 	"insert into assigned_lecturer_evaluator values('EL001', 'S001', 'CB19124', 'Dr. Azlina Binti Zainuddin'),
				('EL002', 'S002', 'CA18016', 'Dr Mohammad Amirulkhairi Bin Zubir')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("assigned_lecturer_evaluator data inserted <br>");			
	}
	else {       
		die("assigned_lecturer_evaluator data insert failed <br>");
	}
	 
	// Insert data into assigned_industrial_evaluator table
	$query = 	"insert into assigned_industrial_evaluator values('EI001', 'IP001', 'CB19124', 'Mr Ooi Kai Cheng'),
				('EI002', 'IP002', 'CA18016', 'Mr. Ali bin Washeed')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("assigned_industrial_evaluator data inserted <br>");			
	}
	else {       
		die("assigned_industrial_evaluator data insert failed <br>");
	}

	// Insert data into evaluation_result table
	$query = 	"insert into evaluation_result values('ER001', 'FP001', 'EL001', NULL, 'Advanced Mobile System', '1', '24', 'Good'),
				('ER002', 'FP002', NULL,'EI002', 'Mr. Ali bin Washeed', '1', '23', 'Please check your project plan')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("evaluation_result data inserted <br>");			
	}
	else {       
		die("evaluation_result data insert failed <br>");
	}

	// Insert data into evaluation_rubric table
	$query = 	"insert into evaluation_rubric values('RU001', 'CLO1', 'Introduction', 'explanation should consist of domain background, importance of the subject and current issues according to proposed topic', '3.00', '1', 'PSM1'),
				('RU002', 'CLO1', 'Problem Statement', 'explanation of problem should be related to the domain/ knowledge or solution gap', '3.00', '1', 'PSM1')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("evaluation_rubric inserted <br>");			
	}
	else {       
		die("evaluation_rubric data insert failed <br>");
	}

	// Insert data into announcement table
	$query = 	"insert into announcement values('AN001', 'Attention to FYP 1 student', 'Please note that FYP 1 Submission 1 is open'),
				('AN002', 'Attention to FYP 2 student', 'Please note that FYP 2 Submission 1 is open')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("announcement inserted <br>");			
	}
	else {       
		die("announcement data insert failed <br>");
	}

	// Insert data into activity table
	$query = 	"insert into activity values('AC001', 'Submission 1 FYP 1', '1', 'PSM1', '2021-9-1', '2021-9-11'),
				('AC002', 'Submission 2 FYP 1', '2', 'PSM1', '2021-9-12', '2021-9-30'),
				('AC003', 'Submission 3 FYP 1', '3', 'PSM1', '2021-10-1', '2021-10-15'),
				('AC004', 'Submission 1 FYP 2', '1', 'PSM2', '2021-9-1', '2021-9-11'),
				('AC005', 'Submission 2 FYP 2', '2', 'PSM2', '2021-9-12', '2021-9-30'),
				('AC006', 'Submission 3 FYP 2', '3', 'PSM2', '2021-10-1', '2021-10-15')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("activity inserted <br>");			
	}
	else {       
		die("activity data insert failed <br>");
	}

	// Insert data into project_logbook table
	$query = 	"insert into project_logbook values('LG001', 'FP001', '2021-9-2', 'I start to research about my FYP project idea'),
				('LG002', 'FP001', '2021-9-6', 'I start to plan my project')"
				or die(mysqli_connect_error());

	$result = mysqli_query($link, $query);
	
	if($result){      
		echo("project_logbook inserted <br>");			
	}
	else {       
		die("project_logbook data insert failed <br>");
	}

	//And finally we close the connection to the MySQL server
    mysqli_close($link);
?>
