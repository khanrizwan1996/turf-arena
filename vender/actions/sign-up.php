<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ven_name = mysqli_real_escape_string($conn, $_POST['ven_name']);
    $ven_mobile = mysqli_real_escape_string($conn, $_POST['ven_mobile']);
    $ven_password = mysqli_real_escape_string($conn, $_POST['ven_password']);

	$sqlmobile = "SELECT ven_mobile FROM vendors WHERE ven_mobile = '".$ven_mobile."' ";
    $resultmobile = $conn->query($sqlmobile);
    if ($resultmobile->num_rows > 0) {
		$errormsgmobile= "Mobile No already registered";
	}
	if(empty($errormsgmobile) ){
	    $sql = "INSERT INTO vendors (ven_name,ven_mobile,ven_password,ven_status,ven_added_time,ven_update_time) VALUES ('$ven_name','$ven_mobile','$ven_password','".STATUS_ACTIVE."','".CURRENT_DATE_TIME."', '".CURRENT_DATE_TIME."')";
       if($conn->query($sql) === TRUE) {     
            $url=HOST_URL.'index.php?mobilemsg='.TF100;
        }else{
            $url=HOST_URL.'vendor-register.php?mobilemsg='.TF103;
        }
        $callurl= UrlCall($url);
	}else{
        $url= HOST_URL.'vendor-register.php?&mobilemsg='.$errormsgmobile;
        $callurl= UrlCall($url);  
	}
}
?>