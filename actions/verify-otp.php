<?php
include('../header-content.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $opt = $_POST['otp'];
    if($opt == $sessionOTP){
        $updateSql = "UPDATE users set u_verified = '".STATUS_ACTIVE."', u_update_time = '".CURRENT_DATE_TIME."' where u_mobile ='".$sessionMobileNo."' ";
        if($conn->query($updateSql) === TRUE) {
            $url=HOST_URL.'login?msg='.TA106;
            $callurl= UrlCall($url);
        }else{
            $url=HOST_URL.'register';
            $callurl= UrlCall($url);
        }   
    }else{
            $url=HOST_URL.'otp-verifications/TA105';
            $callurl= UrlCall($url);
    }
}