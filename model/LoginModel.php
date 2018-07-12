<?php 
session_start();
class Database{
	var $servername="localhost";
	var $username="root";
	var $password="";
public function login(){
try{

$conn= new PDO("mysql:host=$this->servername;dbname=institute",$this->username,$this->password); 

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id=$_POST['id'];
$password = $_POST['password'];
$role=$_POST['role'];

$query = "SELECT * FROM login 
        WHERE id=:id
       and  password=:password and role=:role";

$stmt=$conn->prepare($query);

 $stmt->bindParam(':id',$id);
  $stmt->bindParam(':password',$password);	
   $stmt->bindParam(':role',$role);		

$result=$stmt->execute();
var_dump($result);

$count =$stmt->rowCount();

if($count==1){
    $_SESSION["usenameSession"]=$id;
    $_SESSION["passwordSession"]=$password;
    $response=array("status" =>1 ,"status_message" =>"login successfully");
}
else{
    $response=array("status" =>0 ,"status_message" =>"invalid details");
}
}
catch(PDOException $ex){
			echo "Connection failed". $ex->getMessage();
		}
	
	
header('Content-Type: application/json');
echo json_encode($response);
}}
?>




