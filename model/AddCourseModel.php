
<?php 

require 'database/database.php';
class course{
  public $c_id;
	public $c_name;
	public  $c_duration;
	public  $f_fees;
	 
   public function setc_id($c_id)
   {
   	$this->c_id=$c_id;
   }
   public function setc_name($c_name)
   {
   	$this->c_name=$c_name;
   }
   public function setc_duration($c_duration)
   {
   	$this->c_duration=$c_duration;
   }
   public function setc_fees($c_fees)
   {
   	$this->c_fees=$c_fees;
   }
    public function getc_id()
   {
   	return $this->c_id;
   }
    public function getc_name()
   {
   	return $this->c_name;
   }
   public function getc_duration()
   {
   	return $this->c_duration;
   }
   public function getc_fees()
   {
   	return $this->c_fees;
   }

}
class courseInfo{
	var $conn;
	var $emp;
public function __construct()
	 {
	 	$db=new Database;
	 	$this->conn=$db->getConnection();
	 	$this->emp=new course;
	 }
	
  

	 	
public function addcourse(){
         try{    
        $this->emp->setc_id(htmlspecialchars($_POST["c_id"]));
        $this->emp->setc_name(htmlspecialchars($_POST["c_name"]));
        $this->emp->setc_duration(htmlspecialchars($_POST["c_duration"]));
        $this->emp->setc_fees(htmlspecialchars($_POST["c_fees"]));
       $qry="INSERT INTO `course`(`c_id`, `c_name`, `c_duration`, `c_fees`) VALUES (:c_id,:c_name,:c_duration,:c_fees)";
       $stmt=$this->conn->prepare($qry);

       $c_id=$this->emp->getc_id();
        $c_name=$this->emp->getc_name();
        $c_duration=$this->emp->getc_duration();
        $c_fees=$this->emp->getc_fees();

       $stmt->bindParam(":c_id",$c_id);
       $stmt->bindParam(":c_name",$c_name);
       $stmt->bindParam(":c_duration",$c_duration);
       $stmt->bindParam(":c_fees",$c_fees);

        $data=$stmt->execute();
        return $data;
    }
        catch (PDOException $e) 
         {
  
          if ($e->getCode()==23000)
       {
        $response=array("status"=>0,"status_message"=>"duplicate entry for course id");
        json_encode($response);
       }

           }
              }


              public function getallcourses(){
              	try{
              		
              		$qry="select * from course";
              		$stmt=$this->conn->prepare($qry);
              			$stmt->execute();
              		$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

              		return $data;
              	}
              


	 



         catch(PDOException $ex)
           {
            echo "Unsuccessful".$ex->getMessage();
            $response=array("status"=>0,"status_message"=>"duplicate entry for course id".$ex->getMessage());
        json_encode($response);
           }
           

         }




              public function getcourse(){
                try{
                  $this->emp->setc_name(htmlspecialchars($_POST["c_name"]));
                  $qry="select * from course where c_name=:c_name";
                  $c_name=$this->emp->getc_name();
                  $stmt=$this->conn->prepare($qry);
                  $stmt->bindParam(":c_name",$c_name);
                    $stmt->execute();
                  $data = $stmt->fetchAll( PDO::FETCH_ASSOC );

                  return $data;
                }
              
                catch(PDOException $ex)
                  {
                    echo "Unsuccessful".$ex->getMessage();
                    $response=array("status"=>0,"status_message"=>"duplicate entry for course id".$ex->getMessage());
        json_encode($response);
                   }  
              

                }

                   
        
              


   

       }
 ?>

