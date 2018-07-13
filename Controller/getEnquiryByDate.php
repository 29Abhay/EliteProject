<?php
session_start();
if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"])) 
{
require '../Model/EnquiryModel.php';
$enq=new EnquiryInfo();
$res=$enq->getEnquiryByDate();
}

else
{
	$res=array("status"=>0,"status_message"=>"invalid operation");
}
header("Content-Type: Application/json");
echo json_encode($res);
?>