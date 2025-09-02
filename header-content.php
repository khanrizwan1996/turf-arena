<?php
require_once('modal/constant.php');
require_once('modal/db_config.php');
require_once('modal/functions.php');

// require_once dirname(__FILE__).'/modal/constant.php';
// include('modal/db_config.php');
// include('modal/functions.php');

session_start();
if(isset($_SESSION['otp'])){
  echo "Session OTP:".$sessionOTP = $_SESSION['otp'];
}
if(isset($_SESSION['mobileNo'])){
  $sessionMobileNo = $_SESSION['mobileNo'];
}

if(isset($_SESSION['userId'])){
    $sessionUserId = $_SESSION['userId'];
    $sessionName = $_SESSION['userName'];
    $sessionUserMobile = $_SESSION['userMobile'];
    $sessionUserProfile = $_SESSION['userPassword'];
    
}


?>