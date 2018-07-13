<?php 

require '../../database.php';
class Enquiry{
  private $enquiry_id;
	private  $mobile_no;
	private  $c_id;
  private  $enquiry_date;
  
    public function setenquiry_id($enquiry_id)
   {
    $this->enquiry_id=$enquiry_id;
   }
      public function setmobile_no($mobile_no)
   {
   	$this->mobile_no=$mobile_no;
   }
   public function setc_id($c_id)
   {
   	$this->c_id=$c_id;
   }
   public function setenquiry_date($enquiry_date)
   {
    $this->enquiry_date=$enquiry_date;
   }
   public function setc_name($c_name)
   {
    $this->c_name=$c_name;
   }


    public function getenquiry_id()
   {
    return $this->enquiry_id;
   }
    public function getmobile_no()
   {
   	return $this->mobile_no;
   }
    public function getc_id()
   {
   	return $this->c_id;
   }
   public function getenquiry_date()
   {
   	return $this->enquiry_date;
   }
   public function getc_name()
   {
    return $this->c_name;
   }
}
   class EnquiryInfo{
    	var $conn;
    	var $enq;
      
        public function __construct()
       {
      	 	$db=new Database;
      	 	$this->conn=$db->getConnection();
      	 	$this->enq=new Enquiry;
        }
       public function getAllEnquiry()
	      { 
          if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"])) 
          {
  			  	$qry="select * from enquiry ";
 				    $stmt=$this->conn->prepare($qry);
  				  $result=$stmt->execute();
 				    $temp=array();
  			   while($table_data=$stmt->fetch(PDO::FETCH_ASSOC)) 
           {
     			    array_push($temp,$table_data);
  				 }
                if($temp)
                    {  
                      echo "data found";
                      $response=array("status"=>1,"status_message"=>"data found","data"=>$temp);
                    }
                    else
                    {
                      $response=array("status"=>0,"status_message"=>"data not found");
                    }
          }else
          {
               $response=array("status"=>0,"status_message"=>"invaild operation");
           }
  				 return $response;
          }
          

        
	     public function getEnquiryByDate()
	         {   if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"])) 
               {
               try{
                  if(empty($_POST["enquiry_date"])) 
                   {  
                     echo "please enter a date";
                     $response=array("status"=>1,"status_message"=>"please enter date ");
                   }
                else
                  {
                     $this->enq->setenquiry_date(htmlspecialchars($_POST["enquiry_date"]));
          	       	 $qry="select * from enquiry where MONTH(enquiry_date)=:month";
          	       	 $stmt=$this->conn->prepare($qry);
          	       	 $enquiry_date=$this->enq->getenquiry_date();
                     $stmt->bindParam(":month",$enquiry_date);
                     $stmt->execute();
                     $res=$stmt->fetch(PDO::FETCH_ASSOC);
                     
                    if($res)
                    {  
                      echo "data found";
                      $response=array("status"=>1,"status_message"=>"data found","data"=>$res);
                    }
                    else
                    {
                      $response=array("status"=>0,"status_message"=>"data not found");
                    }
                }
          

           }
            catch(PDOException $ex)
           {
            echo "Unsuccessful".$ex->getMessage();
           }

            }else
           {
            $response=array("status"=>0,"status message"=>"invaild operation");
           }          
      return $response;
    }
 
	 public function getEnquiryByCourseName()
	     {  if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"])) 
               {
        try{
             if (empty($_POST["c_name"])) 
             {  
               echo "please enter a course name";
               $response=array("status"=>1,"status_message"=>"please enter course name ");
             }
            else
            {
	 	          $this->enq->setc_name(htmlspecialchars($_POST["c_name"]));
              $qry="SELECT enquiry.*,person.*,course.c_name from  person inner join enquiry on person.mobile_no=enquiry.mobile_no right join course on course.c_id=enquiry.c_id where c_name=:c_name";

             $stmt=$this->conn->prepare($qry);
	       	   $c_name=$this->enq->getc_name();
             $stmt->bindParam(":c_name",$c_name);
             $stmt->execute();
             $res=$stmt->fetch(PDO::FETCH_ASSOC);
    	    
              if($res)
             {  
              echo "data found";
              $response=array("status"=>1,"status_message"=>"data found","data"=>$res);
             }
             else
            {
             $response=array("status"=>0,"status_message"=>"data not found");
            }
         }
         }catch(PDOException $ex)
           {
            echo "Unsuccessful".$ex->getMessage();
           }    
            }else
           {
            $response=array("status"=>0,"status message"=>"invaild operation");
           }        
      return $response;
    }
  
     public function getEnquiryByMobileNo()
	      {  if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"])) 
               {
         try{
    	 	       if(empty($_POST["mobile_no"])) 
               {
               echo "please enter a mobile no";
               $response=array("status"=>1,"status_message"=>"please enter mobile no ");
               }
               else
               {   
                $this->enq->setmobile_no(htmlspecialchars($_POST["mobile_no"]));
                $qry="select * from enquiry where mobile_no=:mobile_no";
                $stmt=$this->conn->prepare($qry);
                $mobile_no=$this->enq->getmobile_no();
                $stmt->bindParam(":mobile_no",$mobile_no);
                $stmt->execute();
                $res=$stmt->fetch(PDO::FETCH_ASSOC);
                
                if($res)
                {  
                echo "data found";
                $response=array("status"=>1,"status_message"=>"data found ","data"=>$res);
                }
                else
               {
                  $response=array("status"=>0,"status_message"=>"data not found");
               }
         }
      }catch(PDOException $ex)
           {
            echo "Unsuccessful".$ex->getMessage();
           }   
            }else
           {
            $response=array("status"=>0,"status message"=>"invaild operation");
           }         
      return $response;
    }
	 
    public function addEnquiry()
	    {  
        if (isset($_SESSION["username_session"]) && isset($_SESSION["password_session"])) 
               {
       try{
        $qry="INSERT INTO enquiry(enquiry_id,mobile_no,c_id,enquiry_date) 
        VALUES (:enquiry_id,:mobile_no,:c_id,:enquiry_date)";
     // prepare sql and bind parameters
       $stmt=$this->conn->prepare($qry);
     
        $this->enq->setenquiry_id(htmlspecialchars($_POST["enquiry_id"]));
        $this->enq->setmobile_no(htmlspecialchars($_POST["mobile_no"]));
        $this->enq->setc_id(htmlspecialchars($_POST["c_id"]));
        $this->enq->setenquiry_date(htmlspecialchars($_POST["enquiry_date"]));
        
        $enquiry_id=$this->enq->getenquiry_id();
        $mobile_no=$this->enq->getmobile_no();
        $c_id=$this->enq->getc_id();
        $enquiry_date=$this->enq->getenquiry_date();

       $stmt->bindParam(':enquiry_id', $enquiry_id);
       $stmt->bindParam(':mobile_no', $mobile_no);
       $stmt->bindParam(':c_id', $c_id);
       $stmt->bindParam(':enquiry_date', $enquiry_date);
       $result=$stmt->execute();
           
            if($result)
          {  
            echo "succesfully inserted data";
          $response=array("status"=>1,"status_message"=>"data inserted ");
          }
         else
         {
            $response=array("status"=>0,"status_message"=>"error in inserting");
         }
       
         } catch (PDOException $e) 
         {
  
          if ($e->getCode()==23000)
       {
        $response=array("status"=>0,"status_message"=>"duplicate entry for mobile_no");
       }

           }catch(PDOException $ex)
           {
            echo "Unsuccessful".$ex->getMessage();
           } 
            }else
           {
            $response=array("status"=>0,"status message"=>"invaild operation");
           }         	
	    return $response;
   }
}
?>