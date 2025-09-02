<?php
require_once 'modal/constant.php';
require_once 'modal/db_config.php';
require_once 'modal/functions.php';

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies
header('Content-Type: application/json');

$date = $_GET['date'];
$venueId = $_GET['venueId'];
$userId = $_GET['userId'];

$getAllVenueSlots = $venuesSlotsObj->getAllVenueSlotsByVenuesId($venueId);

$slots = [];
if (!empty($getAllVenueSlots)) {
    foreach ($getAllVenueSlots as $getAllVenueSlotsRow) {
        $getConfirmedVenueBookingBySlots = $venuesBookingObj->getConfirmedVenueBookingBySlotsId($venueId, $getAllVenueSlotsRow['vnus_id'], $date);
        if (!empty($getConfirmedVenueBookingBySlots)) {
            if ($userId == $getConfirmedVenueBookingBySlots['vnub_user_id']) {
                $bookingStatus = 'confirmedByUser';
            } else {
                $bookingStatus = 'confirmedByOther';
            }
        } else {
            $getAllVenueBookingSlotsByUser = $venuesBookingObj->getAllVenueBookingSlotsByUserId($venueId, $getAllVenueSlotsRow['vnus_id'], $date, $userId);
            if (empty($getAllVenueBookingSlotsByUser)) {
                $bookingStatus = 'available';
            } else {
                $bookingStatus = 'booked';
            }
        }

        /*$getAllVenueBookingSlotsByUser = $venuesBookingObj->getAllVenueBookingSlotsByUserId($venueId, $getAllVenueSlotsRow['vnus_id'], $date, $userId);
        if (empty($getAllVenueBookingSlotsByUser)) {
            $bookingStatus = 'available';
        } else {
            $bookingStatus = 'booked';
        }*/

        $slots[] = [
            'start_time' => $getAllVenueSlotsRow['vnus_start'],
            'end_time' => $getAllVenueSlotsRow['vnus_end'],
            'slot_id' => $getAllVenueSlotsRow['vnus_id'],
            'status' => $bookingStatus,
        ];
    }
}

echo json_encode($slots, JSON_PRETTY_PRINT);
