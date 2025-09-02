<?php
include('../modal/db_config.php');    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vnua_venue_id = mysqli_real_escape_string($conn, $_POST['vnua_venue_id']);
    $vnua_name = $_POST['vnua_name'] ?? [];

    if (!empty($vnua_name)) {
        foreach ($vnua_name as $amenity) {
            $amenity = mysqli_real_escape_string($conn, $amenity);
            $sql = "INSERT INTO venues_amenities (vnua_venue_id, vnua_name,vnua_added_time,vnua_updated_time) 
                    VALUES ('$vnua_venue_id', '$amenity','".CURRENT_DATE_TIME."','".CURRENT_DATE_TIME."')";
            $conn->query($sql) ; 
        }
    } else {
    }
}