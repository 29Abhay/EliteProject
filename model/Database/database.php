

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
                   $createtable="create table if not exists person(fname varchar(40),lname varchar(40),dob date,mobile_no varchar(15) PRIMARY KEY,gender varchar(10),house_no varchar(20),street varchar (50),city varchar(40),district varchar (40),state varchar(20),pincode int(10),email varchar(60))";
                  $stmt=$conn->prepare($createtable);
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