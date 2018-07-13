<?php 
require '../Model/occupationModel.php';

$obj2= new OccupationInfo;
$res=$obj2->addoccupation();
header('Content-Type: application/json');
echo json_encode($res);

 ?>