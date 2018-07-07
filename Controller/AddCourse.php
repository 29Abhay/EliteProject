

<?php 

require '../model/AddCourseModel.php';
$emp=new courseInfo();
$data=$emp->addcourse();
  if ($data)
          {  
            echo "succesfully inserted data";
          $response=array("status"=>1,"status_message"=>"data inserted ");
          
          header("Content-Type: Application/json");
echo json_encode($response);  

          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error in inserting");
             
             header("Content-Type: Application/json");
echo json_encode($response);  
         }


       

 ?>





