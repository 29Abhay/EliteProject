<?php 
require '../Model/AddAdminModel.php';

$obj2= new Admin;
$a=$obj2->addadmin();
header('Content-Type: application/json');
echo json_encode($a);
 ?>