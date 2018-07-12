

<?php 

class Database{

			var $servername = "localhost";
			var $username = "root";
			var $password = "";
			public function getConnection()
			{
			try{
				$conn = new PDO("mysql:host=$this->servername;", $this->username, $this->password);
			     // set the PDO error mode to exception
			    $createdatabase="create database if not exists institute";
			         $stmt=$conn->prepare($createdatabase);
			         $stmt->execute();

			          $use="use institute";
			         $stmt=$conn->prepare($use);
			         $stmt->execute();

                 $conn = new PDO("mysql:host=$this->servername;dbname=institute", $this->username, $this->password);
                   $createtable="create table if not exists person(fname varchar(40),lname varchar(40),dob date,mobile_no varchar(15) PRIMARY KEY,gender varchar(10),house_no varchar(20),street varchar (50),city varchar(40),district varchar (40),state varchar(20),pincode int(10),email varchar(60));";
                  $stmt=$conn->prepare($createtable);
			         $stmt->execute();

			          
 
                 $create_course_qry="CREATE TABLE  IF NOT EXISTS course (c_id int(20) AUTO_INCREMENT primary key,c_name varchar(20),c_duration int(20),c_fees float(20));";
                      $stmt=$conn->prepare($create_course_qry);
                      $stmt->execute();

                      $create_batch_qry="CREATE TABLE  IF NOT EXISTS batch (b_id int(20) primary key,b_time time(1),c_id int(20),start_date date ,foreign key (c_id) references course (c_id)
                                             on delete cascade
                                              on update cascade)engine=innodb;";
                                              
                      $stmt=$conn->prepare($create_batch_qry);
                      $stmt->execute();

                       $create_teach_qry="CREATE TABLE  IF NOT EXISTS teach ( mob_no varchar(20), b_id int(20) ,foreign key (mob_no) references faculty (mob_no)
                                             on delete cascade
                                              on update cascade ,foreign key (b_id) references batch (b_id)
                                             on delete cascade
                                              on update cascade)engine=innodb;";
                                              
                      $stmt=$conn->prepare($create_teach_qry);
                      $stmt->execute();


                       $create_skill_qry="CREATE TABLE  IF NOT EXISTS faculty_skills ( mob_no varchar(20), skill varchar(40) ,foreign key (mob_no) references faculty (mob_no)
                                             on delete cascade
                                              on update cascade)engine=innodb;";
                                              
                      $stmt=$conn->prepare($create_skill_qry);
                      $stmt->execute();
                   

                       $createfaculty="create table if not exists faculty(fname varchar(30) ,lname  varchar(30),dob date ,house_no varchar(10),street varchar(30),city varchar(30),state varchar(30),basic_sal int(15),experience varchar(20),joining_date date,mob_no varchar(20) PRIMARY KEY)";
			       
			      	  $stmt=$conn->prepare($createfaculty);
                   	  $stmt->execute();

    $create_table="create table if not exists admin(mob varchar(15) PRIMARY KEY,password varchar(20),fname varchar(20),lname varchar(20),aadhar_no varchar(20));";
    $stmt=$conn->prepare($create_table);
    $result=$stmt->execute();


    $create_enquiryOcc_qry="CREATE TABLE IF NOT EXISTS enquiry_occupation(mobile_no varchar(15),type varchar(20),organization varchar(20),department varchar(20),
    	standard varchar(20),FOREIGN KEY (mobile_no) REFERENCES ENQUIRY(mobile_no));";
    $stmt=$conn->prepare($create_enquiryOcc_qry);
    $result=$stmt->execute();


     $create_enquiry="CREATE TABLE IF NOT EXISTS enquiry(enquiry_id int PRIMARY KEY AUTO_INCREMENT,mobile_no varchar(15),c_id int(20),enquiry_date date,
                    FOREIGN KEY (mobile_no) REFERENCES person(mobile_no),FOREIGN KEY (c_id) REFERENCES course(c_id));";
    $stmt=$conn->prepare($create_enquiry);
    $result=$stmt->execute();

     $create_table="create table if not exists login(id varchar(20) PRIMARY KEY,password varchar(20),role varchar(20));";
    $stmt=$conn->prepare($create_table);
    $result=$stmt->execute();

    $create_demo_qry="CREATE TABLE IF NOT EXISTS demo(start_date date,demo1 varchar(20),demo2 varchar(20),demo3 varchar(20),enquiry_id int,batch_id int(20),status varchar(20) DEFAULT 'NO',
      FOREIGN KEY(enquiry_id) REFERENCES enquiry(enquiry_id), FOREIGN KEY (batch_id) REFERENCES batch(b_id));";
/*
    if($result){
    	echo "table created successfully";
    }
    else{
    	echo "error in table creation";
    }

*/
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
				catch(PDOException $ex){
				echo "excecption :".$ex->getMessage();
			}
				return $conn;
			}
			}

			

 ?>


