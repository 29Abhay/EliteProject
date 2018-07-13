<?php 
session_start();



if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){

require '../model/AddBatchModel.php';


         $response=array("status"=>1,"status_message"=>"valid");
          


           
             
          
$emp=new batchInfo();
$data=$emp->getbatch_time();
  if ($data)
          {  
            
         $response=array("status"=>1,"status_message"=>$data);
           

          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error fetching data");
             
          
       
            
         }

  


}  else 
{
 
               $response=array("status"=>0,"status_message"=>"invalid operation");
            

}

                  header("Content-Type: Application/json");
                 echo json_encode($response);
                


 
       

 ?>





