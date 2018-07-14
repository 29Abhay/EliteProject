 
<?php 
 session_start(); 
         
if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){ 

require '../model/BatchModel.php';          
$emp=new batchInfo();
$response=$emp->getallbatches();
}
else{
      $response=array("status"=>0,"status_message"=>"error");
}
header("Content-Type: Application/json");
echo json_encode($response);
               
 ?>



















            






