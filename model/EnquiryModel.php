<?php 

require 'Database/database.php';
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
                      $response=array("status"=>1,"status_message"=>"data found","data"=>$temp);
                    } 
                    else
                    {
                      $response=array("status"=>0,"status_message"=>"data not found");
                    }
         
  				 return $response;
          }
          

        
	     public function getEnquiryByMonth()
	         { 
               try{
                  if(empty($_POST["enquiry_date"])) 
                   {  
                     
                     $response=array("status"=>0,"status_message"=>"please enter month ");
                   }
                else
                  {
                     $this->enq->setenquiry_date(strtolower(htmlspecialchars($_POST["enquiry_date"])));
                     //$this->enq->setenquiry_date(strtolower("enquiry_date"));
          	       	 $qry="select * from enquiry where MONTHNAME(enquiry_date)=:month";
          	       	 $stmt=$this->conn->prepare($qry);
          	       	 $enquiry_date=$this->enq->getenquiry_date();

                     $stmt->bindParam(":month",$enquiry_date);
                     $stmt->execute();
                    $arr=array();
                     while($res=$stmt->fetch(PDO::FETCH_ASSOC))
                     {
                       array_push($arr,$res);
                     }
                     
                    if($arr)
                    {  
                      echo "data found";
                      $response=array("status"=>1,"status_message"=>"data found","data"=>$arr);
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

                   
      return $response;
    }

 
        public function getEnquiryByDate()
           { 
               try{
                  if(empty($_POST["enquiry_date"])) 
                   {  
                     $response=array("status"=>0,"status_message"=>"please enter date ");
                   }
                else
                  {
                     $this->enq->setenquiry_date(htmlspecialchars($_POST["enquiry_date"]));
                     $qry="select * from enquiry where enquiry_date=:enquiry_date";
                     $stmt=$this->conn->prepare($qry);
                     $enquiry_date=$this->enq->getenquiry_date();
                     $stmt->bindParam(":enquiry_date",$enquiry_date);
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

                   
      return $response;
    }

 
	 public function getEnquiryByCourseName()
	     {
        try{
             if (empty($_POST["c_name"])) 
             {  
               
               $response=array("status"=>0,"status_message"=>"please enter course name ");
             }
            else
            {
	 	          
              $c_name=(htmlspecialchars($_POST["c_name"]));
              
               $qry1="select c_id from course where c_name='".$c_name."' ";
              $stmt=$this->conn->prepare($qry1);
             $stmt->execute();
             $res=$stmt->fetch(PDO::FETCH_ASSOC);
              
        
             $res=$res['c_id'];
  
              $qry="SELECT enquiry.*,person.*,course.c_name from  person inner join enquiry on person.mobile_no=enquiry.mobile_no right join course on course.c_id=enquiry.c_id where enquiry.c_id=$res";

             $stmt=$this->conn->prepare($qry);
	       	   
             
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
                 
      return $response;
    }
  
     public function getEnquiryByMobileNo()
	      {  
         try{
    	 	       if(empty($_POST["mobile_no"])) 
               {
               echo "please enter a mobile no";
               $response=array("status"=>0,"status_message"=>"please enter mobile no ");
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
                  
      return $response;
    }
  
	 
    public function addEnquiry()
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
                 	
	    return $response;
   }
}
?>
