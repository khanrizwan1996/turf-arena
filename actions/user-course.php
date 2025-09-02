<?php
include('../modal/db_config.php');  
  
if($_SERVER["REQUEST_METHOD"]) {
    $user_id = $_REQUEST['user_id'];
	$course_id = $_REQUEST['course_id'];
    $price = $_REQUEST['price'];
    $payment_id = isset($_REQUEST['payment_id']) ? $_REQUEST['payment_id'] : "";

    $sql = "INSERT INTO user_course (user_id,course_id,price,payment_id,status,create_date,update_date) VALUES ('$user_id','$course_id','$price','$payment_id','".STATUS_ACTIVE."', '".CURRENT_DATE_TIME."', '".CURRENT_DATE_TIME."')";
    
    if ($conn->query($sql) === TRUE) {
        $url=URL.'user-exams.php';
		$callurl= UrlCall($url);
        //header("Location: ../user-exams.php");
     }
     
}
?>