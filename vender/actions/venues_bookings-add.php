<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vnub_venue_id = mysqli_real_escape_string($conn, $_POST['vnub_venue_id']);
    $vnub_user_id = mysqli_real_escape_string($conn, $_POST['vnub_user_id']);
    $vnub_slot_date = mysqli_real_escape_string($conn, $_POST['vnub_slot_date']);
    $vnub_slots= $_POST['vnub_slot_id'] ?? [];
    if (!empty($vnub_slots)) {
        foreach ($vnub_slots as $slot) {
            $vnub_slot_id = mysqli_real_escape_string($conn, $slot['vnub_slot_id']);
            $sql = "INSERT INTO venues_bookings (vnub_venue_id, vnub_user_id, vnub_slot_date, vnub_slot_id,vnub_added_time,vnub_updated_time) 
                VALUES ('$vnub_venue_id', '$vnub_user_id', '$vnub_slot_date', '$vnub_slot_id','".CURRENT_DATE_TIME."','".CURRENT_DATE_TIME."')";
            $conn->query($sql) ; 
            //mysqli_query($conn, $sql);
        }
    }else{

    }
}
?>