<?php 

require 'Database/database.php';
class Occupation{
private $mob;
private $type;
private $org;
private $dept;
private $standard;

public function setmob($mob){
$this->mob=$mob;
}
public function settype($type){
$this->type=$type;
}
public function setorg($org){
$this->org=$org;
}
public function setdept($dept){
$this->dept=$dept;
}
public function setstandard($standard){
$this->standard=$standard;
}
public function getmob(){
return $this->mob;
}
public function gettype(){
return $this->type;
}
public function getorg(){
return $this->org;
}
public function getdept(){
return $this->dept;
}
public function getstandard(){
return $this->standard;
}
  }
class OccupationInfo{
	var $occu;
	var $conn;
	

	function __construct()
	
	{
		$this->occu=new Occupation;
		$obj1=new Database;
			$this->conn=$obj1->getconnection();
    }

public function addoccupation(){
	if(isset($_SESSION['usernameSession']) and isset($_SESSION['passwordSession'])){
 try{
			

		$qry="insert into enquiry_occupation(mobile_no,type,organization,department,standard) values(:mob,:type,:org,:dept,:standard)";
if (isset($_POST['mob'])){$this->occu->setmob(htmlspecialchars($_POST["mob"]));}
if (isset($_POST['type'])){$this->occu->settype(htmlspecialchars($_POST["type"]));}
if (isset($_POST['org'])){$this->occu->setorg(htmlspecialchars($_POST["org"]));}
if (isset($_POST['dept'])){$this->occu->setdept(htmlspecialchars($_POST["dept"]));}
if (isset($_POST['standard'])){$this->occu->setstandard(htmlspecialchars($_POST["standard"]));}

 $stmt=$this->conn->prepare($qry);

 $mob=$this->occu->getmob();
 $type=$this->occu->gettype();
 $org=$this->occu->getorg();
 $dept=$this->occu->getdept();
 $standard=$this->occu->getstandard();

 $stmt->bindParam(':mob',$mob);	
 $stmt->bindParam(':type',$type);	
 $stmt->bindParam(':org',$org);	
 $stmt->bindParam(':dept',$dept);	
 $stmt->bindParam(':standard',$standard);

  $result=$stmt->execute();

   if($result)
{
	$response=array("status" =>1 ,"status_message" =>"data inserted");
}
else
{
$response=array("status" =>0 ,"status_message" =>"error in inserting");	
		}
	}
		catch(PDOException $ex){
			echo $ex->getMessage() ;
	if($ex->getcode()==23000){
		$response=array("status" =>0 ,"status_message" =>"duplicate entry for mob");
	}
}
     }
     else
{
 $response=array("status" =>0 ,"status_message" =>"invalid operation");
}
return $response;   	
 }
}
?>












