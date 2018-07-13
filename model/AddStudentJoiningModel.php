<?php 
require 'Database/database.php';
class Student{
	private $student_id;
	private $batch_id;
	private $mobile_no;
	private $joining_date;
	private $enquiry_id;

public function setstudent_id($student_id){
$this->student_id=$student_id;
}
public function setbatch_id($batch_id){
$this->batch_id=$batch_id;
}
public function setmobile_no($mobile_no){
$this->mobile_no=$mobile_no;
}
public function setjoining_date($joining_date){
$this->joining_date=$joining_date;
}
public function setenquiry_id($enquiry_id){
$this->enquiry_id=$enquiry_id;
}

public function getstudent_id(){
return $this->student_id;
}
public function getbatch_id(){
return $this->batch_id;
}
public function getmobile_no(){
return $this->mobile_no;
}
public function getjoining_date(){
return $this->joining_date;
}
public function getenquiry_id(){
return $this->enquiry_id;
}
  }

class StudentInfo{
	var $student;
	var $conn;
	

	function __construct()
	
	{
		$this->student=new Student;
		$obj1=new Database;
			$this->conn=$obj1->getconnection();
    }

public function addStudent(){
  try{
			

		$qry="insert into student_joining(student_id,batch_id,mobile_no,joining_date,enquiry_id) values(:student_id,:batch_id,:mobile_no,:joining_date,:enquiry_id)";

  if (isset($_POST['student_id'])){$this->student->setstudent_id(htmlspecialchars($_POST["student_id"]));}
  if (isset($_POST['batch_id'])){$this->student->setbatch_id(htmlspecialchars($_POST["batch_id"]));}
  if (isset($_POST['mobile_no'])){$this->student->setmobile_no(htmlspecialchars($_POST["mobile_no"]));}
  if (isset($_POST['joining_date'])){$this->student->setjoining_date(htmlspecialchars($_POST["joining_date"]));}
  if (isset($_POST['enquiry_id'])){$this->student->setenquiry_id(htmlspecialchars($_POST["enquiry_id"]));}

     $stmt=$this->conn->prepare($qry);

     $student_id=$this->student->getstudent_id();
     $batch_id=$this->student->getbatch_id();
     $mobile_no=$this->student->getmobile_no();
     $joining_date=$this->student->getjoining_date();
     $enquiry_id=$this->student->getenquiry_id();	

     $stmt->bindParam(':student_id',$student_id);	
     $stmt->bindParam(':batch_id',$batch_id);
     $stmt->bindParam(':mobile_no',$mobile_no);
     $stmt->bindParam(':joining_date',$joining_date);
     $stmt->bindParam(':enquiry_id',$enquiry_id);

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
		$response=array("status" =>0 ,"status_message" =>"duplicate entry for student_id");
	}
} 

return $response;  
   }
      }



?>













































