<?php
session_start(); 
if(isset($_SESSION['usernameSession']) and isset($_SESSION['passwordSession'])){
require '../Model/occupationModel.php';
$obj2= new OccupationInfo;
$res=$obj2->addoccupation();
}
 else
{
 $response=array("status" =>0 ,"status_message" =>"invalid operation");
}
header('Content-Type: application/json');
echo json_encode($res);

 ?>