<?php
session_start();
if(isset($_SESSION['usernameSession']) and isset($_SESSION['passwordSession'])){ 
require '../Model/AdminModel.php';
$obj2= new AdminInfo;
$res=$obj2->addadmin();
}
else
{
    $res=array("status" =>0 ,"status_message" =>"invalid operation");
}
header('Content-Type: application/json');
echo json_encode($res); 
 ?>