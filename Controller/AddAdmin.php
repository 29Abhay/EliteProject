<?php 
require '../Model/AddAdminModel.php';

$obj2= new AdminInfo;
$a=$obj2->addadmin();
echo json_encode($a);
 ?>