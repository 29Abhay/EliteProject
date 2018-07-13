<?php 
require '../model/EnquiryModel.php';
$enq=new EnquiryInfo();
$enq=$enq->addEnquiry();
header("Content-Type: Application/json");
echo json_encode($enq);

 ?>