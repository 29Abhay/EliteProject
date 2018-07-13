<?php 
session_start();
if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"]))
 {
require '../model/EnquiryModel.php';
$enq=new EnquiryInfo();
$res=$enq->addEnquiry();
}
else
{
	$res=array("status"=>0,"status_message"=>"invalid operation");
}
header("Content-Type: Application/json");
echo json_encode($res);

 ?>