

<?php 

require '../model/AddBatchModel.php';
$emp=new batchInfo();
$data=$emp->getbatch_cname();
  if ($data)
          {  
            
         $response=array("status"=>1,"status_message"=>$data);
          
          header("Content-Type: Application/json");
echo json_encode($response);  

          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error in fetching data");
             
             header("Content-Type: Application/json");
echo json_encode($response);  
         }


       

 ?>










