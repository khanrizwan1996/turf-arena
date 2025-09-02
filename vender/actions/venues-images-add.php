<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vnui_venue_id = mysqli_real_escape_string($conn, $_POST['vnui_venue_id']);
    foreach ($_FILES['vnui_image']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['vnui_image']['name'][$key];
        $fileTmp  = $_FILES['vnui_image']['tmp_name'][$key];

        if (!empty($fileName)) {
            // create unique file name
            $newName = time() . "_" . uniqid() . "_" . basename($fileName);
            $targetPath = '../custom-images/venues/'.$newName;

            if (move_uploaded_file($fileTmp, $targetPath)) {
                $vnui_image = $conn->real_escape_string($newName);
                $sql = "INSERT INTO venues (
                    vnui_venue_id,
                    vnui_image,
                    vnu_added_time,
                    vnu_update_time
                    ) VALUES (
                    '$vnui_venue_id',
                    '$vnui_image',
                    '".CURRENT_DATE_TIME."',
                    '".CURRENT_DATE_TIME."'
                    )";
                    if($conn->query($sql) === FALSE) {     
                        $url=HOST_URL.'index.php?mobilemsg='.TF100;
                    }
            }
        }

	}
}else{
        $url= HOST_URL.'vendor-register.php?&mobilemsg='.$errormsgmobile;
        $callurl= UrlCall($url);  
	}

?>