<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vnu_id =$_POST["vnu_id"];
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
             if(isset($old_vnu_image) && !empty($old_vnu_image)){
                unlink('../custom-images/venues/'.$old_vnu_image);
            }
            $vnu_file_name = $conn->real_escape_string($vnu_image_file_name);
        } else {
            die("Error uploading the file");
        }
    }else{
        $vnu_file_name = $old_vnu_image;
    }
   
    $sql = "UPDATE vendors SET 
            vnu_name       = '$vnu_name',
            vn_mobile      = '$vn_mobile',
            vnu_email      = '$vnu_email',
            vnu_whatsapp   = '$vnu_whatsapp',
            vnu_address    = '$vnu_address',
            vnu_area       = '$vnu_area',
            vnu_city       = '$vnu_city',
            vnu_pincode    = '$vnu_pincode',
            vnu_state      = '$vnu_state',
            vnu_maplink    = '$vnu_maplink',
            vnu_contactname= '$vnu_contactname',
            vnu_aboutus    = '$vnu_aboutus',
            vnu_image      = '$vnu_file_name',
            vnu_updated_time = '".CURRENT_DATE_TIME."'
            WHERE vnu_id = $vnu_id";

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