<?php 
session_start();



if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){

require '../model/AddCourseModel.php';

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












