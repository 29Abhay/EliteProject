
<?php 

require 'database/database.php';
class batch{
  public $b_id;
	public $b_time;
	public  $c_id;
	public  $start_date;
	 
   public function setb_id($b_id)
   {
   	$this->b_id=$b_id;
   }
   public function setb_time($b_time)
   {
   	$this->b_time=$b_time;
   }
   public function setc_id($c_id)
   {
   	$this->c_id=$c_id;
   }
   public function setstart_date($start_date)
   {
   	$this->start_date=$start_date;
   }
public function setc_name($c_name)
   {
    $this->c_name=$c_name;
   }

 public function getc_name()
   {
    return $this->c_name;
   }

    public function getb_id()
   {
   	return $this->b_id;
   }
    public function getb_time()
   {
   	return $this->b_time;
   }
   public function getc_id()
   {
   	return $this->c_id;
   }
   public function getstart_date()
   {
   	return $this->start_date;
   }

}
class batchInfo{
	var $conn;
	var $emp;
public function __construct()
	 {
	 	$db=new Database;
	 	$this->conn=$db->getConnection();
	 	$this->emp=new batch;
	 }
	
  

	 	
public function addbatch(){
         try{    
        $this->emp->setb_id(htmlspecialchars($_POST["b_id"]));
        $this->emp->setb_time(htmlspecialchars($_POST["b_time"]));
        $this->emp->setc_id(htmlspecialchars($_POST["c_id"]));
        $this->emp->setstart_date(htmlspecialchars($_POST["start_date"]));
       $qry="INSERT INTO `batch`(`b_id`, `b_time` , `c_id`, `start_date`) VALUES (:b_id,:b_time,:c_id,:start_date)";
       $stmt=$this->conn->prepare($qry);

       $b_id=$this->emp->getb_id();
        $b_time=$this->emp->getb_time();
        $c_id=$this->emp->getc_id();
        $start_date=$this->emp->getstart_date();

       $stmt->bindParam(":b_id",$b_id);
       $stmt->bindParam(":b_time",$b_time);
       $stmt->bindParam(":c_id",$c_id);
       $stmt->bindParam(":start_date",$start_date);

        $data=$stmt->execute();
        return $data;
    }
        catch (PDOException $e) 
         {
  
          if ($e->getCode()==23000)
       {
        $response=array("status"=>0,"status_message"=>"duplicate entry");
        json_encode($response);
       }

           }
              }


              public function getallbatches(){
              	try{
              		
              		$qry="select * from batch";
              		$stmt=$this->conn->prepare($qry);
              			$stmt->execute();
              		$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

              		return $data;
              	}
              
              catch(PDOException $ex)
           {
            echo "Unsuccessful".$ex->getMessage();
            $response=array("status"=>0,"status_message"=>"error".$ex->getMessage());
        json_encode($response);
           }
           

         }




              public function getbatch_time(){
                try{
                  $this->emp->setb_time(htmlspecialchars($_POST["b_time"]));
   
                  $qry="select * from batch where b_time=:b_time";

                  $b_time=$this->emp->getb_time();
                  $stmt=$this->conn->prepare($qry);
                  $stmt->bindParam(":b_time",$b_time);
                    $stmt->execute();
                  $data = $stmt->fetchAll( PDO::FETCH_ASSOC );

                  return $data;
                

          }
              
                catch(PDOException $ex)
                  {
                    echo "Unsuccessful".$ex->getMessage();
                    $response=array("status"=>0,"status_message"=>"error".$ex->getMessage());
        json_encode($response);
                   }  
              
                     

                }


                   public function getbatch_cname(){
                try{
                  $this->emp->setc_name(htmlspecialchars($_POST["c_name"]));
                  $qry="select c_name, c_duration,b_time,start_date from batch , course  where batch.c_id=course.c_id and c_name=:c_name ;";
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
                    $response=array("status"=>0,"status_message"=>"error".$ex->getMessage());
        json_encode($response);
                   }  
              
                     

                }

                   
        
              


   

       }
 ?>

