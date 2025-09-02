<?php
include('../../modal/db_config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ven_mobile = mysqli_real_escape_string($conn, $_POST['ven_mobile']);
    $ven_password = mysqli_real_escape_string($conn, $_POST['ven_password']);

    $sql = "SELECT ven_id,ven_name,ven_mobile,ven_password,ven_status,ven_verified FROM vendors WHERE ven_mobile = '".$ven_mobile."' and ven_password = '".$ven_password."' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
		$vendorId = $row['ven_id'];
        $vendorName = $row['ven_name'];
        $vendorMobile = $row['ven_mobile'];
        $vendorPassword = $row['ven_password'];
        $vendorStatus = $row['ven_status'];
		$vendorVerified = $row['ven_verified'];
		
		if($vendorStatus == 0){
			$url=VENDER_HOST_URL.'index?msg='.MT204;
			$callurl= UrlCall($url);
		}else{
				if ($vendorVerified == 1) {
					session_start();
					$_SESSION['vendorId'] = $vendorId;
					$_SESSION['vendorName'] = $vendorName;
					$_SESSION['vendorMobile'] = $vendorMobile;
					$_SESSION['vendorPassword'] = $vendorPassword;
					$url=VENDER_HOST_URL.'dashboard.php';
					
					$callurl= UrlCall($url);
				} else {
					$url=VENDER_HOST_URL.'login?msg='.TA203;
					$callurl= UrlCall($url);
				}
		}
    }else{
		$url=VENDER_HOST_URL.'index?msg='.TA202;
		$callurl= UrlCall($url);
    }
}else{
    $url=VENDER_HOST_URL.'index?msg='.TA203;
}

?>