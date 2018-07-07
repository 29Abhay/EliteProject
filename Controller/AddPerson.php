<?php 
require '../model/PersonModel.php';
$per=new PersonInfo();
$per=$per->addPerson();
header("Content-Type: Application/json");
echo json_encode($per);

 ?>