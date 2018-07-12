<?php 
session_start();

require '../model/AddCourseModel.php';

if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){



         $response=array("status"=>1,"status_message"=>"valid");
          


           
             
          
$emp=new courseInfo();
$data=$emp->addcourse();
  if ($data)
          {  
            
         $response=array("status"=>1,"status_message"=>"data inserted");
           

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













