<?php 
session_start();




if (isset($_SESSION['usernameSession']) && isset($_SESSION['passwordSession'])){


         $response=array("status"=>1,"status_message"=>"valid");
       
       require '../model/FacultyModel.php';
       $fac=new FacultyInfo();
        $response=$fac->getfaculty_skill();  
             
    

  


}  else 
{
 
               $response=array("status"=>0,"status_message"=>"invalid operation");
            

}

                  header("Content-Type: Application/json");
                 echo json_encode($response);
                


 
       

 ?>










