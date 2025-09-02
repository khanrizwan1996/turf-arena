<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vnua_id  =$_POST["vnua_id"];
    $vnua_name = mysqli_real_escape_string($conn, $_POST['vnua_name']);

    $sql = "UPDATE vendors SET 
            vnua_name       = '$vnua_name',
            vnua_updated_time = '".CURRENT_DATE_TIME."'
            WHERE vnua_id = $vnua_id";

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

?>