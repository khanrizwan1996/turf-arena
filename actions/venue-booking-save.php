<?php
include('../header-content.php');  

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode(["success" => false, "message" => "Invalid data"]);
    exit;
}

$date    = $data['date'];
$venueId = $data['venueId'];
$slots   = $data['slots'];

foreach ($slots as $slot) {
    $slotId = $slot["slot_id"];
    $checkBooking = "select * from venues_bookings where vnub_user_id ='".$sessionUserId."' and  vnub_slot_id ='".$slotId."' and vnub_slot_date ='".$date."'";
    $result = $conn->query($checkBooking);
    $numRows = mysqli_num_rows($result);
    if($numRows == 0){
        $sql = "INSERT INTO venues_bookings (vnub_venue_id,vnub_user_id,vnub_slot_id,vnub_slot_date,vnub_status,vnub_added_time) VALUES ('$venueId','$sessionUserId','$slotId','$date','".STATUS_INACTIVE."','".CURRENT_DATE_TIME."')";
        $conn->query($sql);
    }
}

echo json_encode(["success" => true, "message" => "Booking saved"]);

?>