
<?php 

require 'database/database.php';
class skill{
  public $mob_no;
	public $skill;
	

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
	 	$this->emp=new skill;
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

