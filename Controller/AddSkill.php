<?php 
      session_start();    
if (isset($_SESSION['usernameSession']) or isset($_SESSION['passwordSession'])){ 
require '../model/SkillModel.php';
$emp=new skillInfo();
$response=$emp->addskill();
}
else{
      $response=array("status"=>0,"status_message"=>"error");
}
header("Content-Type: Application/json");
echo json_encode($response);
                


 
       

 ?>





