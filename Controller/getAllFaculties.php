<?php 
require '../model/addfaculty.php';


$url=$_SERVER["REQUEST_URI"];
$temp=explode('/',$url);
$attr=end($temp);
if ($attr=='all') {
	$fac=new FacultyInfo;
	$res=$fac->getAllFaculties();

header("Content-Type: Application/json");

echo json_encode($res);
}

?>