<?php
session_start();
if(isset($_SESSION['usernameSession']) and isset($_SESSION['passwordSession'])){ 
require '../Model/AddStudent.php';
$obj2= new StudentInfo;
$res=$obj2->addStudent();
}
else
{
    $response=array("status" =>0 ,"status_message" =>"invalid operation");
}
header('Content-Type: application/json');
echo json_encode($res); 
 ?>
