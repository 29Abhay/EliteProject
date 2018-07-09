

<?php 

require '../model/AddCourseModel.php';
$emp=new courseInfo();
$data=$emp->getallcourses();
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





