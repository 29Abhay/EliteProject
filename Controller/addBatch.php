<?php 
session_start();


//require 'session.php';

if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){
require '../model/AddBatchModel.php';


         $response=array("status"=>1,"status_message"=>"valid");
          


           
             
          
$emp=new batchInfo();
$data=$emp->addbatch();
  if ($data)
          {  
            
         $response=array("status"=>1,"status_message"=>$data);
           

          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error inserting data or may be incorrect entries");
             
          
       
            
         }

  


}  else 
{
 
               $response=array("status"=>0,"status_message"=>"invalid operation");
            

}

                  header("Content-Type: Application/json");
                 echo json_encode($response);
                


 
       

 ?>





