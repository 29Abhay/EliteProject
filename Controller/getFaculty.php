<?php 
session_start();


 //$url=$_SERVER["REQUEST_URI"];
 //$temp=explode('/',$url);$mob=end($temp);
$response=array();
if (isset($_SESSION["username"]) && $_SESSION["password"]) {
	require '../model/addFacultyModel.php';

try{
	if(!empty($_POST["mobile_no"]))
	{
	$fac=new FacultyInfo;
	$res=$fac->getfaculty($_POST["mobile_no"]);
     if ($res) {
     	$response=$res;
     }
     else{
     	$response=array("status"=>0,"status_message"=>"entry not found ");
     }
	
	}
	else
	{
	$response=array("status"=>0,"status_message"=>"enter the mobile no ");
	}
 }
catch(PDOException $ex)
{
echo "exception occused "." ".$ex,getmessage();

}
}

else
{
	$response=array("status"=>0,"status_message"=>"invalid operation");
}

header("Content-Type: Application/json");

echo json_encode($response);



 ?>