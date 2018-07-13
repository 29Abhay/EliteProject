<?php 

require 'Database/database.php';
class Faculty{
  private  $fname;
  private  $lname;
  private  $dob;
  private  $house_no;
  private  $street;
  private  $city;
  private  $state;
  private  $basic_sal;
  private  $experience;
  private  $joining_date;
  private $mob_no;
  private $profilePic;
 
   
   public function setfname($fname)
   {
    $this->fname=$fname;
   }
   
   public function setlname($lname)
   {
    $this->lname=$lname;
   }
   public function setdob($dob)
   {
    $this->dob=$dob;
   }
   
   public function sethouse_no($house_no)
   {
    $this->house_no=$house_no;
   }
   public function setstreet($street)
   {
    $this->street=$street;
   }
   public function setcity($city)
   {
    $this->city=$city;
   }
   
   public function setstate($state)
   {
    $this->state=$state;
   }
   public function setbasic_sal($basic_sal)
   {
    $this->basic_sal=$basic_sal;
   }
   public function setexperience($experience)
   {
    $this->experience=$experience;
   }
   public function setjoining_date($joining_date)
   {
    $this->joining_date=$joining_date;
   }
    public function setmob_no($mob_no)
   {
    $this->mob_no=$mob_no;
   }

    public function setProfilePic($profile)
   {
    $this->profilePic=$profile;
   }

   public function getfname()
   {
    return $this->fname;
   }
    public function getlname()
   {
    return $this->lname;
   }
   public function getdob()
   {
    return $this->dob;
   }
   public function gethouse_no()
   {
    return $this->house_no;
   }
   public function getstreet()
   {
    return $this->street;
   }
    public function getcity()
   {
    return $this->city;
   }
   public function getstate()
   {
    return $this->state;
   }
   public function getbasic_sal()
   {
    return $this->basic_sal;
   }
   public function getexperience()
   {
    return $this->experience;
   }
   public function getjoining_date()
   {
    return $this->joining_date;
   }
    public function getmob_no()
   {
    return $this->mob_no;
   }

    public function getProfilePic()
   {      
         return $this->profilePic;
   }

}
class FacultyInfo{
  var $conn;
  var $fac;
  public function __construct()
  {
    $db=new Database;
    $this->conn=$db->getConnection();
    $this->fac=new Faculty;
   }
    public function addFaculty()
   {  
    try{
        $qry="INSERT INTO faculty(fname,lname,dob,house_no,street,city,state,basic_sal,experience,joining_date,mob_no,profile_pic) 
        VALUES (:fname,:lname,:dob,:house_no,:street,:city,:state,:basic_sal,:experience,:joining_date,:mob_no,:pic)";
      // prepare sql and bind parameters
        $stmt=$this->conn->prepare($qry);
        
        $this->fac->setfname(htmlspecialchars($_POST["fname"]));
        $this->fac->setlname(htmlspecialchars($_POST["lname"]));
        $this->fac->setdob(htmlspecialchars($_POST["dob"]));
        $this->fac->sethouse_no(htmlspecialchars($_POST["house_no"]));
        $this->fac->setstreet(htmlspecialchars($_POST["street"]));
        $this->fac->setcity(htmlspecialchars($_POST["city"]));
        $this->fac->setstate(htmlspecialchars($_POST["state"]));
        $this->fac->setbasic_sal(htmlspecialchars($_POST["basic_sal"]));
        $this->fac->setexperience(htmlspecialchars($_POST["experience"]));
        $this->fac->setjoining_date(htmlspecialchars($_POST["joining_date"]));
        $this->fac->setmob_no(htmlspecialchars($_POST["mob_no"]));
        

        $temp_loc=$_FILES["myfile"]["tmp_name"];
        var_dump($temp_loc);
        $perm_loc="uploads/".$_FILES["myfile"]["name"];
        $this->fac->setProfilePic($perm_loc);

        $fname=$this->fac->getfname();
        $lname=$this->fac->getlname();
        $dob=$this->fac->getdob();
        $house_no=$this->fac->gethouse_no();
        $street=$this->fac->getstreet();
        $city=$this->fac->getcity();
        $state=$this->fac->getstate();
        $basic_sal=$this->fac->getbasic_sal();
        $experience=$this->fac->getexperience();
        $joining_date=$this->fac->getjoining_date();
        $mob_no=$this->fac->getmob_no();
        $perm_locc=$this->fac->getProfilePic();
            

        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':house_no', $house_no);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':basic_sal', $basic_sal);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':joining_date', $joining_date);
        $stmt->bindParam(':mob_no',$mob_no);
        $stmt->bindParam(':pic',$perm_locc);

        move_uploaded_file($temp_loc, $perm_locc);
        
        $result=$stmt->execute();
           
            if ($result)
          {  
             echo "succesfully inserted data";
             $response=array("status"=>1,"status_message"=>"data inserted");
            
             var_dump($response);

          }
           else
            {
              $response=array("status"=>0,"status_message"=>"error in inserting");
            }
       
            } catch (PDOException $e) 
              {
               if ($e->getCode()==23000)
                {
                  $response=array("status"=>0,"status_message"=>"duplicate entry ");
                }

              }catch(PDOException $ex)
                {
                   echo "Unsuccessful".$ex->getMessage();
                 }   

      return $response;
   
 }

   public function getfaculty($mob_no)
   {
    
    $this->fac->setmob_no(htmlspecialchars($_POST["mobile_no"]));

    $getqry="select * from faculty where mob_no=:no";
    
    $mob=$this->fac->getmob_no();
    $stmt=$this->conn->prepare($getqry);
    $stmt->bindParam(':no',$mob);
    $result=$stmt->execute();
    //var_dump($result);
    $res=$stmt->fetch(PDO::FETCH_ASSOC);
  
    return $res;

   }

   public function getAllFaculties()
   {
    
      $allqry="select * from faculty";
      $stmt=$this->conn->prepare($allqry);
      $stmt->execute();
      $data=array();

      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        array_push($data,$row);

      }
      return $data;


   }

}

?>