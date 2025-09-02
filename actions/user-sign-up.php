<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_name = $_POST['u_name'];
    $u_mobile = $_POST['u_mobile'];
	$u_password = $_POST['u_password'];
   
	$sqlmobile = "SELECT u_mobile FROM users WHERE u_mobile = '".$u_mobile."' ";
    $resultmobile = $conn->query($sqlmobile);
    if ($resultmobile->num_rows > 0) {
		$errormsgmobile= "Mobile No already registered";
	}
	if(empty($errormsgmobile) ){
	    $sql = "INSERT INTO users (u_name,u_mobile,u_password,u_status,u_added_time,u_update_time) VALUES ('$u_name','$u_mobile','$u_password','".STATUS_ACTIVE."','".CURRENT_DATE_TIME."', '".CURRENT_DATE_TIME."')";
       if($conn->query($sql) === TRUE) {     

        session_start();
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['mobileNo'] = $u_mobile;

           $url=HOST_URL.'otp-verifications/TA104';
        }else{
            $url=HOST_URL.'register?mobilemsg='.TA103;
        }
        $callurl= UrlCall($url);
	}else{
        $url= HOST_URL.'register.php?&mobilemsg='.$errormsgmobile;
        $callurl= UrlCall($url);  
	}
}
?>