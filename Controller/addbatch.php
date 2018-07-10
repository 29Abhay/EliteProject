

<?php 

require '../model/AddBatchModel.php';
$emp=new batchInfo();
$data=$emp->addbatch();
  if ($data)
          {  
            
         $response=array("status"=>1,"status_message"=>"data inserted");
          

          header("Content-Type: Application/json");
echo json_encode($response);  

          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error in inserting data, duplicate entry for batch id");
             
          
       
             header("Content-Type: Application/json");
echo json_encode($response);  
         }


       

 ?>





