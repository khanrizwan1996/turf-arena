<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vnu_vendor_id = mysqli_real_escape_string($conn, $_POST['vnu_vendor_id']);
    $vnu_name = mysqli_real_escape_string($conn, $_POST['vnu_name']);
    $vn_mobile = mysqli_real_escape_string($conn, $_POST['vn_mobile']);
    $vnu_email = mysqli_real_escape_string($conn, $_POST['vnu_email']);
    $vnu_whatsapp = mysqli_real_escape_string($conn, $_POST['vnu_whatsapp']);
    $vnu_address = mysqli_real_escape_string($conn, $_POST['vnu_address']);
    $vnu_area = mysqli_real_escape_string($conn, $_POST['vnu_area']);
    $vnu_city = mysqli_real_escape_string($conn, $_POST['vnu_city']);
    $vnu_pincode = mysqli_real_escape_string($conn, $_POST['vnu_pincode']);
    $vnu_state = mysqli_real_escape_string($conn, $_POST['vnu_state']);
    $vnu_maplink = mysqli_real_escape_string($conn, $_POST['vnu_maplink']);
    $vnu_contactname = mysqli_real_escape_string($conn, $_POST['vnu_contactname']);
    $vnu_aboutus = mysqli_real_escape_string($conn, $_POST['vnu_aboutus']);

     if (isset($_FILES['vnu_image']) && $_FILES['vnu_image']['error'] == UPLOAD_ERR_OK) {
        $vnu_image_file_name = basename($_FILES['vnu_image']['name']);
        $vnu_image_file_path = '../custom-images/venues/' . $vnu_image_file_name;

        if (move_uploaded_file($_FILES['vnu_image']['tmp_name'], $vnu_image_file_path)) {
            $vnu_file_name = $conn->real_escape_string($vnu_image_file_name);
        } else {
            die("Error uploading the file");
        }
    }else{
        $vnu_file_name = "";
    }
   
    $sql = "INSERT INTO venues (
            vnu_vendor_id,
            vnu_name,
            vn_mobile,
            vnu_email,
            vnu_whatsapp,
            vnu_address,
            vnu_area,
            vnu_city,
            vnu_pincode,
            vnu_state,
            vnu_maplink,
            vnu_contactname,
            vnu_aboutus,
            vnu_image,
            vnu_added_time,
            vnu_update_time
        ) VALUES (
            '$vnu_vendor_id',
            '$vnu_name',
            '$vn_mobile',
            '$vnu_email',
            '$vnu_whatsapp',
            '$vnu_address',
            '$vnu_area',
            '$vnu_city',
            '$vnu_pincode',
            '$vnu_state',
            '$vnu_maplink',
            '$vnu_contactname',
            '$vnu_aboutus',
            '$vnu_file_name',
            '".CURRENT_DATE_TIME."',
            '".CURRENT_DATE_TIME."'
        )";
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