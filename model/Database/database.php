

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

                       $createfaculty="create table if not exists faculty(fname varchar(30) ,lname  varchar(30),dob date ,house_no varchar(10),street varchar(30),city varchar(30),state varchar(30),basic_sal int(15),experience varchar(20),joining_date date)";
			       
			      	  $stmt=$conn->prepare($createfaculty);
                   	  $stmt->execute();



				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
				catch(PDOException $ex){
				echo "excecption :".$ex->getMessage();
			}
				return $conn;
			}
			}

			

 ?>