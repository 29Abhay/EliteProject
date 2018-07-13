
<?php 

require 'database/database.php';
class teach{
  public $mob_no;
	public $b_id;
	

  public function setmob_no($mob_no)
   {
    $this->mob_no=$mob_no;
   }
	 
   public function setb_id($b_id)
   {
   	$this->b_id=$b_id;
   }
   


 public function getmob_no()
   {
    return $this->mob_no;
   }

    public function getb_id()
   {
   	return $this->b_id;
   }
   
}
class teachInfo{
	var $conn;
	var $emp;
public function __construct()
	 {
	 	$db=new Database;
	 	$this->conn=$db->getConnection();
	 	$this->emp=new teach;
	 }
	
  

	 	
public function addteach(){
         try{ 
           $this->emp->setmob_no(htmlspecialchars($_POST["mob_no"]));   
        $this->emp->setb_id(htmlspecialchars($_POST["b_id"]));
      
        
       $qry="INSERT INTO `teach`(`mob_no`,`b_id` ) VALUES (:mob_no,:b_id)";
       $stmt=$this->conn->prepare($qry);

      $mob_no=$this->emp->getmob_no();
       $b_id=$this->emp->getb_id();
       
       $stmt->bindParam(":b_id",$b_id);
       $stmt->bindParam(":mob_no",$mob_no);
      

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



                   
        
              


   

       }
 ?>

