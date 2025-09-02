<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vnus_id   =$_POST["vnus_id"];
    $vnus_start = mysqli_real_escape_string($conn, $_POST['vnus_start']);
    $vnus_end = mysqli_real_escape_string($conn, $_POST['vnus_end']);
    $vnus_note = mysqli_real_escape_string($conn, $_POST['vnus_note']);
    $vnus_status = mysqli_real_escape_string($conn, $_POST['vnus_status']);

    $sql = "UPDATE venues_slots SET 
            vnus_start       = '$vnus_start',
            vnus_end       = '$vnus_end',
            vnus_note       = '$vnus_note',
            vnus_status       = '$vnus_status',
            vnus_updated_time = '".CURRENT_DATE_TIME."'
            WHERE vnus_id = $vnus_id";

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