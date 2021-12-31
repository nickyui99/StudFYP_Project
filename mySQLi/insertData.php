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
	$query = 	"INSERT into student values
		('CA18016','Tan Chia Hui','ca18016', 'Jalan Sg Johor, Taman Cempeka, Johor', 'chiahui@gmail.com', '0175551111', 'FK', 'SysArmy.Sdn Bhd', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CA18016.png')), 
                ('CB19124', 'Aiman Basheer Abdulwareth Mohammed','cb19124', 'Jalan Lenga, Taman Singa, Kuala Lumpur', 'aiman@gmail.com', '0124411344', 'FK', 'Samsung Sdn Bhd', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CD18001.png')), 
                ('CD18001', 'Siti Binti Abu Bakar', 'cd18001','Jalan Bersatu, Taman Bahagia, Kedah', 'siti@gmail.com', '0164425512', 'FK', '-', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CB19124.png')), 
                ('CB19080', 'Nicholas Ooi Zhee Chen', 'cb19080','Jalan Ipoh, Taman Intan, Ipoh', 'nicholas@gmail.com', '01137002219', 'FK', 'New Digital Sdn Bhd', LOAD_FILE('/xampp/htdocs/StudFYP_Project/mySQLi/Resources/QR_CB19080.png')),
                ('CA18084', 'Muhammad Nizar Bin Abdullah', 'ca18084','Jalan Destinasi, Taman Impian, Johor', 'nizar@gmail.com', '01139599171', 'FK', 'Brunsfield Computer Sdn Bhd',''),
                ('CA18020', 'Lee Min Hui', 'ca18020','Jalan Kasih, Taman Sayang, Kelantan', 'minhui@gmail.com', '0129937069', 'FK', 'LE Global Services Sdn Bhd',''),
                ('CA18022', 'Cheah Jia Li', 'ca18022','Jalan Cinta, Taman Pelangi, Kedah', 'jiali@gmail.com', '0103728876', 'FK', 'Agmo Studio Sdn Bhd',''),
                ('CA18026', 'Lim Siau Wei', 'ca18026','Jalan Bunga, Taman Raya, KL', 'siauwei@gmail.com', '0169204521', 'FK', 'Zalora Malaysia',''),
                ('CA18052', 'Wong Chi Hao', 'ca18052','Jalan Burma, Taman Setia, Penang', 'chihao@gmail.com', '0169146967', 'FK', 'Silkron Technology Sdn Bhd',''),
                ('CA18055', 'Ho Yao Lun', 'ca18055','Jalan Setar, Taman Timah, Perak', 'yaolun@gmail.com', '011117699086', 'FK', 'ELMLAB Sdn. Bhd',''),
           		('CA18060', 'Siaw Chin Lin', 'ca18060','Jalan Doktor, Taman SS2, KL', 'chinlin@gmail.com', '0184620963', 'FK', 'Maxwell Cloud Technology Sdn Bhd',''),
                ('CB18042','Yamunnawahthi A/P Somasundharam',   'cb18042','Jalan Tikus, Taman Init , Kelantan','yamunnawati@gmail.com','01111424387','FK','-',''),
                ('CA18063', 'Chong Kah Hou', 'ca18063','Jalan Ismail, Taman Beufort, Sabah', 'kahhou@gmail.com', '0182252737', 'FK', 'iDynamics Software Sdn Bhd',''),
                ('CA18097', 'Ng Hui Yu', 'ca18097','Jalan Pelangi, Taman Gembira, Sarawak', 'huiyu@gmail.com', '0189178705', 'FK', 'Adaptive Netpoleon Malaysia Sdn. Bhd.',''),
                ('CA18098', 'Chen Ying Han', 'ca18098','Jalan Gambang, Taman Pekan, Pahang', 'yinghan@gmail.com', '011136679247', 'FK', 'UG Global Resources Sdn.Bhd',''),
                ('CA18108', 'Ong Shin Yi', 'ca18108','Jalan Jitra, Taman Sintok, Selangor', 'shinyi@gmail.com', '0164125167', 'FK', 'ICA40 Sdn Bhd',''),
                ('CA18116', 'Siong Yong Chen', 'ca18116','Jalan Tun, Taman Seremban, Negeri Sembilan', 'yongchen@gmail.com', '0172226011', 'FK', 'Qubittech Sdn Bhd',''),
                ('CA18119', 'Tan Ze Zhang', 'ca18119','Jalan Azam, Taman Jujur, Terengganu', 'zezhang@gmail.com', '0184714722', 'FK', 'HeiTech Padu Berhad',''),
              	('CA19011','Nurfarahi Naqibah Binti Mohd Azmi', 'ca19011','Jalan Shah, Taman Batu, Perlis', 'nakibah@gmail.com', '0189041243', 'FK', 'SETEL Ventures Sdn. Bhd.',''),
                ('CD18020','Foo Jing Ying', 'cd18020','Jalan A2, Taman Selangit, Penang', 'jingying@gmail.com', '0135183347', 'FK', 'Ingenious Lab Sdn Bhd',''),	
				('CD18021','Loh Jing Hui', 'cd18021','Jalan SS1, Taman Abadi, Sarawak', 'jinghui@gmail.com', '0179357709', 'FK', 'HyperQB Sdn Bhd',''),
				('CD18024','Claine Foo Wai Nie', 'cd18024','Jalan Alam, Taman Aman, Sabah', 'claine@gmail.com', '0167976074', 'FK', 'GogoKids Technologies Sdn Bhd ',''),
				('CD18027','Yeong Hui Ying', 'cd18027','Jalan Setia, Taman Damai, Penang', 'huiying@gmail.com', '01149428911', 'FK', 'Hitachi Digital Host Sdn Bhd',''),
				('CD18038','Ho Wei Yee', 'cd18038','Jalan Ikhlas, Taman Kasih, Johor', 'weiyee@gmail.com', '0178267656', 'FK', 'SIM IT SDN. BHD',''),
				('CD18040','Chong Jia Ting', 'cd18040','Jalan Terima, Taman Sejunjung, Terengganu', 'jiating@gmail.com', '0175730254', 'FK', 'Hitachi Digital Host Sdn Bhd',''),
				('CD18064','Tee Xin Yi', 'cd18064','Jalan Sehati, Taman Perpaduan, Kelantan', 'xinyi@gmail.com', '01110967919', 'FK', 'Hitachi Digital Host Sdn Bhd',''),
				('CD18072','Wong Ming Yue', 'cd18072','Jalan SS12, Taman SS15, Penang', 'mingyue@gmail.com', '0162065536', 'FK', 'Hitachi Digital Host Sdn Bhd',''),
				('CD19011','Zualiana bt Johari', 'cd19011','Jalan Selamat, Taman Raya, Sabah', 'zualiana@gmail.com', '01119319255', 'FK', 'Rotarium Steamboat & Grill Sdn Bhd',''),
				('CD19126','Prasad Saravanan', 'cd19126','Jalan Wan, Taman Kadir, KL', 'prasad@gmail.com', '0162627053', 'FK', 'Pahanggo Sdn Bhd',''),
              
				('CD17020','Muhammad Nazhan Bin Nazri', 'cd17020','Jalan Jingga, Taman Song, Terengganu', 'nazhan@gmail.com', '01127384315', 'FK','-',''),
				('CB18014', 'Montira A/P Eh Pon', 'cb18014',	'Jalan Sungai, Taman Korok, Kedah','montiraehpon99@gmail.com','01116546617','FK','-',''),
				('CB18015','Mohammad Alif Yasir Bin Soleh','cb18015','Jalan Sentiasa, KL','yasirsoleh@gmail.com','01125509087','FK','-',''),
				('CB18016','Muhamad Aleef Firdaus Bin Yusuf Woo','cb18016','Jalan Langkawi, Taman Pendang, Kelantan','aleeffirdaus28@gmail.com','01111955265','FK','-',''),
				('CB18017','Lailatul Nur Binti Arnizam Shah','cb18017','Jalan Pengkalan, Taman Kundor, Kedah','lailaarnizam99@gmail.com','0139204870','FK','-',''),
				('CB18018','Noraqilah Bt Mohamed Amri','cb18018','Jalan Tembikai, Taman Seti, Kelantan','noraqilah.amrie@gmail.com','0135294838','FK','Hitachi eBworx Sdn Bhd',''),
				('CB18019','Siti Nur Syahirah Binti Marsan','cb18019','Jalan Kangsar, Taman Kuala, Perak','syahirahmarsan@gmail.com','0173732746','FK','-',''),
				('CB18024','Kavines Rao A/L Surianarayana','cb18024','Jalan Tanah, Taman Rata, Perak','kavinesrao24@gmail.com','01133022424','FK','-',''),
				('CB18025','Teoh Jia En','cb18025','Jalan Teluk, Taman Intan, Pahang','jenteoh98@gmail.com','01138134345','FK','Intel Microelectronics Sdn Bhd',''),
				('CB18026','Muhammad Firdaus Bin Aminullah','cb18026','Jalan Bukit, Taman Payong, Terengganu','resonet.firdaus@gmail.com','0196346287','FK','-',''),
				('CB18027','Nur Sabrina Binti Roslan','cb18027','Jalan Genting, Taman Setapak, KL','sabrinaroslan25@gmail.com','0196755531','FK','Hitachi eBworx Sdn Bhd',''),
				('CB18030','Khoo Boo Han','cb18030','Jalan Dungun, Taman Muazam, Pahang','khooboohan96@gmail.com','01128431396','FK','-',''),
				('CB18031','Venosha Sunthararajoo','cb18031','Jalan Tembikai, Taman Seti, Kelantan','vvenosha@gmail.com','0122152203','FK','Intel Microelectronics Sdn Bhd',''),
				('CB18032','Nur Ain Syathirah Binti Muhamad Nazri','cb18032','Jalan Tembikai, Taman Seti, Kelantan','nurainsyathirah@gmail.com','018924262','FK','-',''),
				('CB18033','Nurul Intan Balqish Binti Salim','cb18033','Jalan Aman, Taman Seti, Kelantan','intan_cintot@yahoo.com.my','01127263228','FK','-','') ,
				('CB18035','Wong Veng Sum','cb18035','Jalan Setiawan, Taman SS15, Selangor','vanesev7@gmail.com','0189551308','FK','-',''),
				('CB18036','Muhammad Iman Bin Jofaris','cb18036','Jalan Tembikai, Taman Keling, Terengganu','imanjofaris@gmail.com','01123510966','FK','Maxwell Cloud Technology Sdn Bhd',''),
				('CB18037','Tan Pen The','cb18037','Jalan Mergong, Taman Rahman, Kedah','tpenthe@gmail.com','0172592543','FK','-',''),
				('CB18038','Loh Zong Bao','cb18038','Jalan Tembikai, Taman Seti, Kelantan','zongbao1110@gmail.com','01118970177','FK','-',''),
				('CB18040','Mastura Binti Zainul Asri','cb18040','Jalan Batu, Taman Campbell, Melaka','mastura9906@gmail.com','0125345904','FK','-',''),
                ('CA17083','Uthayasurian A/L Salavamani','ca17083','Jalan setiawai, Taman Senkon, Kelantan','uthayasurian@gmail.com','01114457623','FK','-',''),

                  ('CA18007','Najwa Ramlan','ca18007','Jalan Setiawai, Taman Senkon, Kelantan','nramlan1509@gmail.com','01139335740','FK','-',''),
                ('CA18037','Ahmad Shazrul Bin Muhammad Apandi','ca18037','Jalan Imbang, Taman Selimau, Kedah','shazrul@gmail.com','0111424534','FK','-',''),
                ('CA18044','Jenny Yew Sook Peng','ca18044','Jalan Iskandar, Taman Sentosa, Johor','jennyyew98@live.com.my','0162647686','FK','-',''),
                ('CA18053','Mohamad Farhan bin Md Yazid','ca18053','Jalan Nona, Taman Hari, Penang','farhan@gmail.com','01173643748','FK','-',''),
                ('CA18056','Kavin Thanaseelan','ca18056','Jalan Kelisa, Taman Badawi, Selangor','kavin@gmail.com','0169684838','FK','-',''),
                ('CA18062','Thanushiya Thiruvasagam','ca18062','Jalan Wira, Taman Rahman, Penang','thanushiya65@gmail.com','0167779256','FK','-',''),
                ('CA18107','Hong Shi Xuan','ca18107','Jalan Wajah, Taman Abdul, Selangor','shi.xuan509@gmail.com','0166508597','FK','-',''),
                ('CA18079','Nurshahira Binti mohd','ca18079','Jalan Wawasan, Taman Tunku, KL','nurshahiramohamad99@gmail.com','01116681329','FK','-',''),
                ('CA18082','Cho York Yee','ca18082','Jalan Baris, Taman Hormat, Perlis','yorkyee29@gmail.com','0165935362','FK','-',''),
                ('CA18111','Jonathan Ng','ca18111','Jalan Belimbing, Taman Kasih, Kelantan','jonathannth21@gmail.com','0164090376','FK','-',''),
                ('CA18114','Serine Ma','ca18114','Jalan Jungung, Taman Terima, Negeri Sembilan','serene619@hotmail.com ','0199395845','FK','-',''),
                ('CA18121','Titus Sim Sheng Cheng','ca18121','Jalan Saila, Taman Sekian, Ipoh','titus@gmail.com','0124602718','FK','-',''),
                ('CA18131','Eunice Fphinah A/P Ramamoorthy','ca18131','Jalan Kembara, Taman Desa, Melaka','fphinah@gmail.com','0166638591','FK','-',''),
                ('CA19002','Ariff Nursyazwan Bin Mohamad','ca19002','Jalan Petron, Taman B22, Terengganu','ariffnursyazwan30@gmail.com','0195522648','FK','-',''),
                ('CA19003','Muhammad Najmuddin bin Muhammad Azizuddin','ca19003','Jalan Perodua, Taman Cinta, Sabah','najmuddin@gmail.com','0196699074','FK','-',''),
                ('CA19005','Alif Aiman Bin Muhamad Mujab','ca19005','Jalan Kambing, Taman Kandar, Sarawak','aimansdx98@gmail.com','0132951516','FK','-',''),
                ('CC19128','Nor Faisla Binti Mohamad','cc19128','Jalan Dato, Taman Senkon, Kelantan','faisla@gmail.com','0196777426','FK','-',''),
                ('CC19174','Aina Wajihah Binti Zainuddin','cc19174','Jalan Tun, Taman KL, KL','ainawajihahzainuddin@gmail.com','0197901243','FK','-',''),
                ('CC19191','Nurainun Najiyah Binti Mohd Zaidi','cc19191','Jalan Saman, Taman Bintang, Kelantan','nurainunnajiyah06@gmail.com','01139040966','FK','-',''),
                ('CC19199','Nadiah Binti Abdul Latif','cc19199','Jalan Semak, Taman Street, Melaka',' nadiahlatif09@gmail.com','0197802598','FK','-',''),
                ('CC19265','Muhammad Amal Faris Bin Nasir','cc19265','Jalan Laut, Taman Persona, Perak','amalfaris2001@gmail.com','01115583459','FK','-',''),
                ('CC19278','Muhammad Arief Bin Helmy Murad','cc19278','Jalan Isi, Taman Utama, Kelantan','muhammadariefhelmy@gmail.com','0105515649','FK','-',''),
                ('CC19292','Nursyuhada Binti Mat Rabi','cc19292','Jalan Tembikar, Taman 1/15, Perak','nursyuhadamatrabi@gmail.com','01124572946','FK','-',''),
                ('CC19294','Siti Aisah Binti Hasbullah','cc19294','Jalan Sembilan, Taman Senkon, Megeri Sembilan','aisah2620@gmail.com','01116854468','FK','-',''),
                ('CC19308','Anith Nuur Jaslyn Binti Mohd Ariffin','cc19308','Jalan Aman, Taman Makmur, Kelantan','anithnuurjaslynm@gmail.com','01117836864','FK','-',''),
                ('CC19325','Aini Nadhah Bt Azmi','cc19325','Jalan Kesah, Taman Damai, Perlis','aininadhah@gmail.com','0165620416','FK','-',''),
                ('CC20025','Muhammad Yazid Bin Zulfar Shariel','cc20025','Jalan Sibal, Taman Sentiasa, Penang','umpyazid@gmail.com','01160500559','FK','-',''),
                ('CC19112','Lakxhana A/P Selva Rajah','cc19112','Jalan Tebal, Taman Temerloh, Terengganu','lakxhana@gmail.com','0178722633','FK','-',''),

               ('CC19283','Nur Syuhada Binti Muhammad Pauzi','cc19283','Jalan Air, Taman Kembung, Johor','syuha1608@gmail.com','01121097112','FK','-',''),
                ('CC19255','Wan Aqilah Illyana Binti Rosli','cc19255','Jalan Sugai, Taman Keli, Kelantan','aqilahfhbbsl@gmail.com','0102580170','FK','-',''), 
                ('CD17063','Nur Anis Farhain Binti Zurizam','cd17063','Jalan Kelantan, Taman Ringgit, Sarawak','afarhain98@gmail.com','0169788536','FK','-',''),
                ('CD15039','Nurfarahin Binti Kamaruzaman','ca15039','Jalan Jitra, Taman Dana, Sabah','nurfarahin1501@gmail.com','0183924031','FK','-',''),
                ('CD16049','Murfiqah Binti Matarip','cd16049','Jalan Yan, Taman Tabung, Kelantan','murfiqah@gmail.com','0145941297','FK','-',''),
                ('CD16062','Mohamad Sabri Rusyaidi Bin Mohd Marzuki','cd16062','Jalan Citra, Taman Citra, Kelantan','mohdsabri081@gmail.com','0122072441','FK','-',''),
                ('CD17046','Nurul Ishafira Bt Ismail','cs17046','Jalan Tesera, Taman Sen, Megeri Sembilan','ishafira@gmail.com','0127732451','FK','-',''),
                ('CD17047','Nurul Farhana Binti Abd Rahman','cd17047','Jalan Bee, Taman Kakak, Perlis','nurulfarhanania@gmail.com','0168663089','FK','-',''),
                ('CD17058','Nurul Shabilla Shaherra Binti Muhammad Asri Tan','cd17058','Jalan Kesih, Taman Abang, Kelantan','asha3001.kt@gmail.com ','0179042420','FK','-',''),
                ('CD17067','Nur Zatul Iffah Binti Zulkiffli','cd17067','Jalan Tasik, Taman Adik, Perak','zatuliffah97@gmail.com','01110985618','FK','-',''),
                ('CD18006','Wong Ming Lang','cd18006','Jalan Bandar, Taman Berkembar, Terengganu','wongminglang98@gmail.com','0192605041','FK','-',''),
                ('CD18008','Nik Anita Binti Nik Ma','cd18008','Jalan Kampung, Taman Tower, KL','anita1998mda@gmail.com','0194301615','FK','-',''),
                ('CD18010','Syarifah Syairah Binti Syed Kasim','cd18010','Jalan Muda, Taman Bersatu, Kedah','syairahsyarifah@gmail.com','0179059787','FK','-',''),
                ('CD18015','Hajar Binti Daud','cd18015','Jalan Penang, Taman Kuala, Melaka','hajarbintidaud@gmail.com','0182320307','FK','-',''),
                ('CD18016','Leong Wei Khang','cd18016','Jalan Ipoh, Taman Butterworth, Penang','hibarileong@gmail.com','0135797759','FK','-',''),
                ('CD18018','Aniya Dhaifina Binti Abdul Hadi','cd18018','Jalan Senawang, Taman Camp, Kelantan','adhaifina1999@gmail.com','0148358275','FK','-',''),
                ('CD18023','Lee Cheng Liang','cd18023','Jalan Teratai, Taman Astaka, KL','cllee0097@gmail.com','0129502286','FK','-',''),
                ('CD18025','Nur Alia Syazreen Bt Kamarol Idzham','cd18025','Jalan Terantai, Taman Badrul, Kedah','nuraliasyazreen99@gmail.com','0177334986','FK','-',''),
                ('CD18026','Mohamad Faiz Muzani Bin Zainudin','cd18026','Jalan Kaya, Taman Senang, Johor','faiz@gmail.com','01126926370','FK','-',''),
                ('CD18030','Muhammad Alif Asyran Bin Shaari','cd18030','Jalan Merah, Taman Tesik, Kelantan','alifasyranshaari@gmail.com','0139162014','FK','-',''),
                ('CD18034','Pang Wei Khee','cd18034','Jalan Meriah, Taman Bantuan, Terengganu','pang.weikhee@gmail.com','0166911939','FK','-',''),
                ('CD18036','Wong Zelin','cd18036','Jalan Biru, Taman Klang, Kelantan','wongzelin.tiger@gmail.com','0187831314','FK','-',''),
                ('CD18042','Nur Anis Binti Che Aziz','cd18042','Jalan Pangkal, Taman Port, Selangor','nuranischeaziz99@gmail.com','0146058998','FK','-',''),
            ('CD18043','Dg Nur Sakinah Binti Armain','cd18043','Jalan Kundasang, Taman Genting, KL','dnsakinah00@gmail.com','0172050105','FK','-','')
                				
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
	$query = 	"insert into lecturer values
	('S001', 'Dr. Azlina Binti Zainuddin', 's001', '0123336677', 'azlina@ump.edu.my', 'S352 Kampung Sri Langkas Batu 13 Jalan 47100 Puchong Malaysia', 'Senior Lecturer', 'Requirement Engineering, Software Quality Assurance and Software Testing', 'FK'),
	('S001', 'Dr. Azlina Binti Zainuddin','s001', '0123336677', 'azlina@ump.edu.my', 'S352 Kampung Sri Langkas Batu 13 Jalan 47100 Puchong Malaysia', 'Senior Lecturer', 'Requirement Engineering, Software Quality Assurance and Software Testing', 'FK'),
	('S002', 'Dr Mohammad Amirulkhairi Bin Zubir', 's002', '0145555777', 'amirulkhairi@ump.edu.my', 'A 6 Jln Sagu 1 Taman Daya 81100, Johor', 'Senior Lecturer', 'Civil Engineering', 'FTKA'),
	('S003', 'Dr. Fatihah Ayu Bin Amin', 's003', '0454556772', 'fatihah@ump.edu.my', 'Jalan Geliga Sakti,Taman Permai,Terengganu', 'Lecturer', 'Biotech', 'FIST'),
	('S012', 'Dr. Ali Abdulrahman Nasser', 's012', '0823456781', 'ali_abdulrahman012@ump.edu.my', 'No. 354 Jln Tok Ungku 70100 Negeri Sembilan', 'Senior Lecturer', 'Mechanical Engineering', 'FKM'),
	('S191', 'Dr. Mohammed ben Salem Mustafa', 's191', '0128660630', 'mohammed55@ump.edu.my', '38st Floor, Imbi Plaza, Jalan Imbi', 'Senior Lecturer', 'Design integrated systems', 'FK'),
	('S005', 'Imran Edzereiq Bin Kamarudin', 's005',	'095492431',	'edzereiq@ump.edu.my'	,'18, Jalan Selangor, Taman Merdeka, Kedah'	,'Lecturer'	,'Data Communication Device, Pilot Plant Technology, Database','FK'),
	('S006','Ts. Dr. Syahrulanuar Bin Ngah',	's006',	'094244721',	'syahrulanuar@ump.edu.my'	,'Jalan Ikhlas, Taman Senawang, Kelantan'	,'Senior Lecturer'	,'Communication Networks And Services','FK'),
	('S007','Dr. Muhammad Arif Bin Mohamad',	's007',	'093311334',	'arifmohamad@ump.edu.my'	,'Jalan Bukit Angat, Taman BA/3, KL'	,'Lecturer'	,'Pattern Recognition And Image Recognition and Machine Learning'	,'FK'),
	('S008','Ts. Dr. Mritha Ramalingam',		's008','094244683',	'mritha@ump.edu.my'	,'Jalan Seri, Taman Impian, Kelantan'	,'Senior Lecturer'	,'Embedded Systems,Computer Forensic and Educational Challenges'	,'FK'),
	('S009','Dr. Nur Shamsiah Binti Abdul Rahman','s009','094244702', 'shamsiah@ump.edu.my'	,'Jalan Medan, Taman Bukit Mertajam, Perlis'	,'Senior Lecturer'	,'Adult Learning And Development, Information System (Is) Planning'	,'FK'),
	('S010','Profesor Madya Ts. Dr. Awanis Binti Romli','s010','095492246',	'awanis@ump.edu.my','Jalan Kewajipan, Taman Betik, Sarawak','Associate Professor'	,'Decision Support System, Sustainability'	,'FK'),
	('S011','Profesor Madya Ts. Dr. Adzhar Bin Kamaludin','s011','094245024',	'adzhar@ump.edu.my',	'Jalan Manis, Taman Manis, Pahang',	'Associate Professor',	'Computer-Based Teaching And Learning'	,'FK'),
	('S004','Profesor Ts. Dr. Kamal Zuhairi Bin Zamli',	's004','094245401',	'kamalz@ump.edu.my',	'Jalan Village, Taman Lampung, Terengganu',	'Professor',	'My Main Areas Of Research Involves Developing Strategies For Combinatorial Test Data Generation'	,'FK'),
	('S013','Profesor Ts. Dr. Ruzaini Bin Abdullah Arshah','s013','094433225',	'ruzaini@ump.edu.my',	'Jalan Subang, Taman Seti, Selangor',	'Professor',	'Information System (Is) Planning'	,'FK'),
	('S014','Professor Dr. Rizalman Mamat',	's014',	'094246275' ,  	'rizalman@ump.edu.my',	'Jalan Eco, Taman Desa, Sarawak',	'Professor',	'Fuel & Energy, Internal combustion engines, Nanofluid heat transfer, Computational fluid dynamics (CFD)'	,'FKM'),
	('S015','Associate Professor Dr. Mahadzir Ishak@Muhammad, C. Eng',	's015',	'094246235'  ,	'mahadzir@ump.edu.my',	'Jalan Bansar, Taman South, Kelantan',	'Associate Professor',	'Welding and joining, laser processing'	,'FKM'),
	('S016','Dr. Ahmad Syahrizan Sulaiman',	's016',	'094246206'  ,  	'syahrizan@ump.edu.my',	'Jalan Axis, Taman Angin, Kedah',	'Senior Lecturer',	'Material failure'	,'FKM'),
	('S017','Profesor Madya Dr. Cheng Jack Kie',	's017',	'095492311',	'jackkie@ump.edu.my',	'Jalan Dagang, Taman Dynaton, Johor',	'Associate Professor',	'Operations Research'	,'FIM'),
	('S018','Profesor Madya Dr. Irene Ting Wei Kiong',	's018',	'095493234',	'irene@ump.edu.my',	'Jalan Kota, Taman Bahru, Kelantan',	'Associate Professor',	'Financial Management, Corporate Finance'	,'FIM'),
	('S019','Dr. Fazeeda Bt. Mohamad',	's019',	'095492258',	'fazeedamohamad@ump.edu.my',	'Jalan Johor, Taman Pilah, Perak',	'Senior Lecturer',	'Supply Chain Management'	,'FIM'),
	('S020','Dr. Diyana Binti Kamarudin',	's020','094245000',	'yanakamarudin@ump.edu.my',	'Jalan Tasik, Taman Permasuri, Kelantan',	'Senior Lecturer',	'Communications, Research And Development Management, Education'	,'FIM'),
	('S021','Azizan Bin Hj. Azit',	's021',	'095492292',	'azizan@ump.edu.my',	'Jalan Kluang, Taman Setia, Selangor',	'Lecturer',	'asic Building Construction, Cost Estimating, Facility Maintenance, Construction Project Management.'	,'FIM'),
	('S022','Profesor Madya Ts. Dr. Aishah Binti Abu Bakar',	's022',	 '094245000',	'aishahabubakar@ump.edu.my',	'Jalan Rakyat, Taman Sentral, KL',	'Associate Professor',	'Educational Administration, Concrete'	,'FTKA'),
	('S024','Dr. SHARIFAH MASZURA SYED MOHSIN',	's024',	'095493011',	'maszura@ump.edu.my',	'Jalan Sunway, Taman Kelisa, Kelantan',	'Senior Lecturer',	'Simulation Modelling, Seismology (Including Earthquake And Tsunami, Seismic Exploration)'	,'FTKA'),
	('S025','Dr. Syarifuddin Bin Misbari',	's025',	'098751331',	'syarifuddinm@ump.edu.my',	'Jalan Velocity, Taman USJ, KL',	'Senior Lecturer',	'Remote Sensing, Mapping And Gis'	,'FTKA'),
	('S026','Profesor Ir. Ts. Dr. Kamarul Hawari Bin Ghazali',	's026',	'094246029',	'kamarul@ump.edu.my',	'Jalan Bukit, Taman Indah, Kelantan',	'Professor',	'Engineering Science And Technology, Engineering Science And Technology'	,'FTKEE'),
	('S027','Profesor Madya Ts. Dr. Mohd Ashraf Bin Ahmad',	's027',	'094246041',	'mashraf@ump.edu.my',	'Jalan Park One, Taman Utama, Johor',	'Associate	Professor',	'Control And System'	,'FTKEE'),
	('S028','Profesor Madya Dr. Ahmad Nor Kasruddin Bin Nasir',	's028',	'094245000',	'kasruddin@ump.edu.my',	'Jalan Seikat, Taman Berbakti, Kelantan',	'Associate Professor',	'Neural, Evolutionary And Fuzzy Computation, Soft Computing'	,'FTKEE'),
	('S029','Profesor Madya Dr. Hamdan Bin Daniyal',	's029',	'094246023',	'hamdan@ump.edu.my',	'Jalan Indah, Taman Mahkota, Kelantan',	'Associate Professor',	'Power Quality Audit, Power Quality Analysis, Power Quality Mitigation, Consultation & Research In Power Electronics; Converter Design & Advanced Control','FTKEE'),
	('S031','Fairuz Rizal Bin Mohamad Rashidi',	's031',	 '094246018',	'fairuz@ump.edu.my','Jalan PJS1, Taman Seti, Sarawak',	'Lecturer',	'Separation Of Audio Or Speech Signals That Are Convolutively Or Linearly Mixed In Different Environm'	,'FTKEE'),
	('S032','Dr. Rozlina Binti Mohamed',	 's032',	'095492131',	'rozlina@ump.edu.my',	'Jalan Suria, Taman Sentiasa, Kelantan',	'Senior Lecturer',	'Food Tracebility, Database'	,'FK'),
	('S033','Dr. Anis Farihan Binti Mat Raffei',	's033',	'09-5492474',	'anisfarihan@um,p.edu.my',	'Jalan Ria, Taman Derga, Kedah',	'Senior Lecturer',	'Computer Based Training'	,'FK'),
	('S034','Dr. Ahmad Firdaus Bin Zainal Abidin',	's034',	'094244629',	'firdausza@ump.edu.my',	'Jalan Sembilan, Taman IKS, Kelantan',	'Senior Lecturer',	'Predictiion In Classifying Classes, Other Security System N.E.C.'	,'FK'),
	('S035','Roslina Binti Mohd Sidek',	's035',	'094244709',	 'roslinams@ump.edu.my',	'Jalan Jaya, Taman One, Johor',	'Lecturer',	'Software Engineering'	,'FK'),
	('S036','Ts. Azma Binti Abdullah',	's036',	'094244640',	 'azma@ump.edu.my',	'Jalan Bazar, Taman Raya, Kelantan',	'Lecturer',	'Component Based Software Development','FK'),
	('S037','Dr. Siti Suhaila Binti Abdul Hamid',	's037',	'095529655',	'sitisuhaila@ump.edu.my',	'Jalan Bunga, Taman Tertib, KL',	'Senior Lecturer',	'Human Computer Interaction (Hci), Information System (Is) Planning','FK'),
	('S038','Ts. Dr. Wan Isni Sofiah Binti Wan Din',	's038',	'094244726',	'sofiah@ump.edu.my',	'Jalan Damansara, Taman Kota, Penang',	'Senior Lecturer',	'Clustering In Sensor Network, Network Design, Simulation System'	,'FK'),
	('S039','Dr. Nur Hafieza Binti Ismail',	's039',	'094427532',	'hafieza@ump.edu.my',	'Jalan Wisma, Taman Bandar, Kelantan',	'Senior Lecturer',	'Data Mining'	,'FK'),
	('S040','Profesor Madya Dr. Mohamed Ariff Bin Ameedeen',	's040',	'095492472',	'mohamedariff@ump.edu.my',	'Jalan Tasik, Taman Selatan, Perak',	'Associate Professor',	'Computer System Organisation, Computer Software'	,'FK')
	" 
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
	$query = 	"insert into evaluation_result values('ER001', 'FP001', 'EL001', NULL, 'Advanced Mobile System', '1', 'Good', '24'),
				('ER002', 'FP002', NULL,'EI002', 'Attendance System', '1', 'Please check your project plan', '23')"
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
