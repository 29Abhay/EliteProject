<?php
require '../Model/EnquiryModel.php';
$enq=new EnquiryInfo();
$data=$enq->getAllEnquiry();
header("Content-Type: Application/json");
echo json_encode($data);
?>