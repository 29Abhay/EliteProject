<?php 



if (isset($_SESSION["username"]) && $_SESSION["password"]) {
	require '../model/addFacultyModel.php';
	$fac=new FacultyInfo;
	$res=$fac->getAllFaculties();

}
else
{
	$res=array("status"=>0,"status message"=>"invalid operation");
}

header("Content-Type: Application/json");

echo json_encode($res);


?>