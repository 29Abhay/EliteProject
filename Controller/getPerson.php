<?php 
$url=$_SERVER["REQUEST_URI"];
$url_pieces=explode("/", $url);
$mobile_no=end($url_pieces);
require '../model/AddPersonModel.php';
$per=new PersonInfo();
$per=$per->getPerson($mobile_no);
header("Content-Type: Application/json");
echo json_encode($per);
 ?>
