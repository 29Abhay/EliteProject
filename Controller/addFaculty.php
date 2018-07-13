<?php 
require'../model/AddFacultyModel.php';
$fac=new FacultyInfo();
$fac=$fac->addFaculty();

header("Content-Type: Application/json");
echo json_encode($fac);
 
 ?>
