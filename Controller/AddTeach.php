
<?php 
 session_start();         
if (isset($_SESSION['usernameSession']) or isset($_SESSION['passwordSession'])){ 
require '../model/AddTeachModel.php';          
$emp=new teachInfo();
$response=$emp->addteach();
}
else{
      $response=array("status"=>0,"status_message"=>"error");
}
header("Content-Type: Application/json");
echo json_encode($response);
                


 
       

 ?>





