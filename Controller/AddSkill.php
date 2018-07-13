<?php 
session_start();

require '../model/AddSkillModel.php';

if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){



         $response=array("status"=>1,"status_message"=>"valid");
          


           
             
          
$emp=new skillInfo();
$data=$emp->addskill();
  if ($data)
          {  
            
         $response=array("status"=>1,"status_message"=>"data inserted");
           

          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error inserting data");
             
          
       
            
         }

  


}  else 
{
 
               $response=array("status"=>0,"status_message"=>"invalid operation");
            

}

                  header("Content-Type: Application/json");
                 echo json_encode($response);
                


 
       

 ?>





