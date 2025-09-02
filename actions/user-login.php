<?php
include('../modal/db_config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u_mobile = mysqli_real_escape_string($conn, $_POST['u_mobile']);
    $u_password = mysqli_real_escape_string($conn, $_POST['u_password']);

    $sql = "SELECT u_id,u_name,u_mobile,u_password,u_status,u_verified FROM users WHERE u_mobile = '".$u_mobile."' and u_password = '".$u_password."' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
		$userId = $row['u_id'];
         $userName = $row['u_name'];
        $userMobile = $row['u_mobile'];
        $userPassword = $row['u_password'];
        $userStatus = $row['u_status'];
		$userVerified = $row['u_verified'];
		
		if($userStatus == 0){
			$url=HOST_URL.'login.php?msg='.MT204;
			$callurl= UrlCall($url);
		}else{
				if ($userVerified == 1) {
					session_start();
					$_SESSION['userId'] = $userId;
					echo $_SESSION['userName'] = $userName;
					$_SESSION['userMobile'] = $userMobile;
					$_SESSION['userPassword'] = $userPassword;
					$url=HOST_URL.'index';
					
					$callurl= UrlCall($url);
				} else {
					$url=HOST_URL.'login?msg='.TA203;
					$callurl= UrlCall($url);
				}
		}
    }else{
		$url=HOST_URL.'login.php?msg='.TA202;
		$callurl= UrlCall($url);
    }
}else{
    $url=HOST_URL.'login.php?msg='.TA203;
}

?>