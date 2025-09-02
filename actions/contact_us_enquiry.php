<?php
include('../modal/db_config.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
	$email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

   $sql = "INSERT INTO contact_us_enquiry (name,email,mobile,subject,message,create_date) VALUES ('$name','$email','$mobile','$subject', '$message','".CURRENT_DATE_TIME."')";
    
    if($conn->query($sql) === TRUE) {
        $url=URL.'contact-us';
        $msg = 'Your request has been submitted successfully. We will contact you shortly.!!!';
		$callurl= UrlCall($url,$msg);
     }
}
?>