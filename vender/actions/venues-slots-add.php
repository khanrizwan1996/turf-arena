<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vnus_venue_id = mysqli_real_escape_string($conn, $_POST['vnus_venue_id']);
    $vnus_slots = $_POST['vnus_slots'] ?? [];
    if (!empty($vnus_slots)) {
        foreach ($vnus_slots as $slot) {
            $vnus_start = mysqli_real_escape_string($conn, $slot['vnus_start']);
            $vnus_end   = mysqli_real_escape_string($conn, $slot['vnus_end']);
            $vnus_note  = mysqli_real_escape_string($conn, $slot['vnus_note']);
            $vnus_status = 1;

            $sql = "INSERT INTO venues_slots (vnus_venue_id, vnus_start, vnus_end, vnus_note, vnus_status,vnus_added_time,vnus_updated_time) 
                VALUES ('$vnus_venue_id', '$vnus_start', '$vnus_end', '$vnus_note', '$vnus_status','".CURRENT_DATE_TIME."','".CURRENT_DATE_TIME."')";
            $conn->query($sql) ; 
            //mysqli_query($conn, $sql);
        }
    }else{

    }
}
?>