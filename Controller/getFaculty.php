<?php 
require '../model/addfaculty.php';


$url=$_SERVER["REQUEST_URI"];
$temp=explode('/',$url);
$mob=end($temp);

$fac=new FacultyInfo;
$res=$fac->getfaculty($mob);

header("Content-Type: Application/json");

echo json_encode($res);



 ?>