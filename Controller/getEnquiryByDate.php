<?php 
require '../Model/EnquiryModel.php';
$enq=new EnquiryInfo();
$data=$enq->getEnquiryByDate();
header("Content-Type: Application/json");
echo json_encode($data);
 ?>