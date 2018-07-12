<?php 
require 'Database/database.php';

class Admin{
private $mob;
private $password;
private $fname;
private $lname;
private $aadhar_no;
public $conn;
public function __construct()
  
  {
    
    $obj1=new Database;
     $this->conn=$obj1->getconnection();
    }

public function setmob($mob){
$this->mob=$mob;
}
public function setpassword($password){
$this->password=$password;
}
public function setfname($fname){
$this->fname=$fname;
}
public function setlname($lname){
$this->lname=$lname;
}
public function setaadhar_no($aadhar_no){
$this->aadhar_no=$aadhar_no;
}
public function getmob(){
return $this->mob;
}
public function getpassword(){
return $this->password;
}
public function getfname(){
return $this->fname;
}
public function getlname(){
return $this->lname;
}
public function getaadhar_no(){
return $this->aadhar_no;
}
public function addadmin(){
try{
      

    $qry="insert into admin(mob,password,fname,lname,aadhar_no) values(:mob,:password,:fname,:lname,:aadhar_no)";

  if (isset($_POST['mob'])){$this->setmob(htmlspecialchars($_POST["mob"]));}
  if (isset($_POST['password'])){$this->setpassword(htmlspecialchars($_POST["password"]));}
  if (isset($_POST['fname'])){$this->setfname(htmlspecialchars($_POST["fname"]));}
  if (isset($_POST['lname'])){$this->setlname(htmlspecialchars($_POST["lname"]));}
  if (isset($_POST['aadhar_no'])){$this->setaadhar_no(htmlspecialchars($_POST["aadhar_no"]));}

     $stmt= $this->conn->prepare($qry);

     $mob=$this->getmob();
     $password=$this->getpassword();
     $fname=$this->getfname();
     $lname=$this->getlname();
     $aadhar_no=$this->getaadhar_no(); 

     $stmt->bindParam(':mob',$mob); 
     $stmt->bindParam(':password',$password);
     $stmt->bindParam(':fname',$fname);
     $stmt->bindParam(':lname',$lname);
     $stmt->bindParam(':aadhar_no',$aadhar_no);

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
 return $response;
   }
   }

?>
