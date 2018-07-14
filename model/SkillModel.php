
<?php 
require 'Database/database.php';

   class skill1{
  private $mob_no;
	private $skill;
	

  public function setmob_no($mob_no)
   {
    $this->mob_no=$mob_no;
   }
	 
   public function setskill($skill)
   {
   	$this->skill=$skill;
   }
   


 public function getmob_no()
   {
    return $this->mob_no;
   }

    public function getskill()
   {
   	return $this->skill;
   }
   
}
class skillInfo{
	var $conn;
	var $emp;
public function __construct()
	 {
	 	$db=new Database;
	 	$this->conn=$db->getConnection();
	 	$this->emp=new skill1;
	 }
	
  

public function addskill(){
            
          try{
        $this->emp->setmob_no(htmlspecialchars($_POST["mob_no"]));
        $this->emp->setskill(htmlspecialchars($_POST["skill"]));
        
       $qry="INSERT INTO `faculty_skills`(`mob_no`, `skill` ) VALUES (:mob_no,:skill);";
       $stmt=$this->conn->prepare($qry);

      $mob_no=$this->emp->getmob_no();
       $skill=$this->emp->getskill();
       
      
       $stmt->bindParam(":mob_no",$mob_no);
        $stmt->bindParam(":skill",$skill);
      

        $data=$stmt->execute();
    
     if ($data)
          {  

                  $response=array("status"=>1,"status_message"=>"data inserted");
     }
         else
         {
            $response=array("status"=>0,"status_message"=>"error in fetching data or may be incorrect entries");
             
      
         }
}
 catch (PDOException $e) 
         {
  
          if ($e->getCode()==23000)
       {
        $response=array("status"=>0,"status_message"=>"duplicate entry");
      
       }

           }

      

return $response;

                   
        
              


   

       }
     }
 ?>



