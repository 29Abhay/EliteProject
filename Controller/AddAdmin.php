<?php 
require '../Model/AdminModel.php';

$obj2= new AdminInfo;
$res=$obj2->addadmin();
header('Content-Type: application/json');
echo json_encode($res); 
 ?>