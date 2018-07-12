<?php 
session_start();
require 'Database/database.php';
class LoginModel{
	private $id;
	private $password;
 private $role;

 public function setid($id){
  $this->id=$id;
 }

 public function setpassword($password){
  $this->password=$password;
 }

 public function setrole($role){
  $this->role=$role;
 }

public function getid(){
  return $this->id;
}

public function getpassword(){
  return $this->password;
}

public function getrole(){
  return $this->role;
}}

class Login{
    var $login;
  var $conn;
  

  function __construct()
  
  {
    $this->login=new LoginModel;
    $obj1=new Database;
      $this->conn=$obj1->getconnection();
    }
public function login(){
try{
  

$query = "SELECT * FROM login 
        WHERE id=:id
       and  password=:password and role=:role";


$id=$this->login->setid(htmlspecialchars($_POST["id"]));
$password = $this->login->setpassword(htmlspecialchars($_POST["password"]));
$role=$this->login->setrole(htmlspecialchars($_POST["role"]));

$stmt=$this->conn->prepare($query);

$id=$this->login->getid();
$password=$this->login->getpassword();
$role=$this->login->getrole();

 $stmt->bindParam(':id',$id);
  $stmt->bindParam(':password',$password);	
   $stmt->bindParam(':role',$role);		

$result=$stmt->execute();

$count =$stmt->rowCount();

if($count==1){
    $_SESSION["usernameSession"]=$id;
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
	
	
/*header('Content-Type: application/json');
echo json_encode($response);*/

return $response;
}
  }
?>




