<?php 

require 'persondatabase.php';
class Person{
	private  $fname;
	private  $lname;
  private  $dob;
	private  $mobile_no;
	private  $gender;
  private  $house_no;
  private  $street;
  private  $city;
  private  $district;
  private  $state;
  private  $pincode;
  private  $email;
	 
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
   public function setmobile_no($mobile_no)
   {
   	$this->mobile_no=$mobile_no;
   }
   public function setgender($gender)
   {
   	$this->gender=$gender;
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
   public function setdistrict($district)
   {
    $this->district=$district;
   }
   public function setstate($state)
   {
    $this->state=$state;
   }
   public function setpincode($pincode)
   {
    $this->pincode=$pincode;
   }
   public function setemail($email)
   {
    $this->email=$email;
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
   public function getmobile_no()
   {
   	return $this->mobile_no;
   }
   public function getgender()
   {
    return $this->gender;
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
   public function getdistrict()
   {
    return $this->district;
   }
   public function getstate()
   {
    return $this->state;
   }
   public function getpincode()
   {
    return $this->pincode;
   }
   public function getemail()
   {
    return $this->email;
   }

}
class PersonInfo{
	var $conn;
	var $per;
public function __construct()
 {
	 	$db=new Database;
	 	$this->conn=$db->getConnection();
	 	$this->per=new Person;
	 }
	 
	 public function addPerson()
	 {  
    try{
        $qry="INSERT INTO person (fname,lname,dob,mobile_no,gender,house_no,street,city,district,state,pincode,email) 
        VALUES (:fname,:lname,:dob,:mobile_no,:gender,:house_no,:street,:city,:district,:state,:pincode,:email)";


            
  
    // prepare sql and bind parameters
     $stmt=$this->conn->prepare($qry);
     

        $this->per->setfname(htmlspecialchars($_POST["fname"]));
        $this->per->setlname(htmlspecialchars($_POST["lname"]));
        $this->per->setdob(htmlspecialchars($_POST["dob"]));
        $this->per->setmobile_no(htmlspecialchars($_POST["mobile_no"]));
        $this->per->setgender(htmlspecialchars($_POST["gender"]));
        $this->per->sethouse_no(htmlspecialchars($_POST["house_no"]));
         $this->per->setstreet(htmlspecialchars($_POST["street"]));
        $this->per->setcity(htmlspecialchars($_POST["city"]));
        $this->per->setdistrict(htmlspecialchars($_POST["district"]));
        $this->per->setstate(htmlspecialchars($_POST["state"]));
        $this->per->setpincode(htmlspecialchars($_POST["pincode"]));
        $this->per->setemail(htmlspecialchars($_POST["email"]));
       

        $fname=$this->per->getfname();
        $lname=$this->per->getlname();
        $dob=$this->per->getdob();
        $mobile_no=$this->per->getmobile_no();
        $gender=$this->per->getgender();
        $house_no=$this->per->gethouse_no();
        $street=$this->per->getstreet();
        $city=$this->per->getcity();
        $district=$this->per->getdistrict();
        $state=$this->per->getstate();
        $pincode=$this->per->getpincode();
        $email=$this->per->getemail();
            
    $stmt->bindParam(':fname', $fname);
     $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':mobile_no', $mobile_no);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':house_no', $house_no);
      $stmt->bindParam(':street', $street);
     $stmt->bindParam(':city', $city);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':pincode', $pincode);
    $stmt->bindParam(':email', $email);

             $result=$stmt->execute();
           
            if ($result)
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