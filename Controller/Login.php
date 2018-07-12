<?php 
require '../Model/login.php';
$obj=new Login;
$res=$obj->login();

header('Content-Type: application/json');
echo json_encode($res);
 
 ?>