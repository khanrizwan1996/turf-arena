<?php
class VenuesBookings{
    public $conn; 
    private $table = ''; 
    public function __construct($conn)
    {
        $this->table = 'venues_bookings';
        $this->conn = $conn;
    }
 
    public function getAllVenueBookingSlotsByUserId($venueId,$slotId,$date,$userId){
        $sql ="SELECT vnub_id,vnub_venue_id,vnub_user_id,vnub_slot_id,vnub_slot_date,vnub_status,vnub_added_time FROM $this->table where vnub_venue_id ='$venueId' and vnub_slot_id = '$slotId' and vnub_user_id = '$userId' and vnub_slot_date = '$date' ";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getConfirmedVenueBookingBySlotsId($venueId,$slotId,$date){
        $sql ="SELECT vnub_id,vnub_venue_id,vnub_user_id,vnub_slot_id,vnub_slot_date,vnub_status,vnub_added_time FROM $this->table where vnub_venue_id ='$venueId' and vnub_slot_id = '$slotId' and vnub_status = '".STATUS_ACTIVE."' and vnub_slot_date = '$date' ";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getAllVenueBookingSlots($venueId,$slotId,$date){
        $sql ="SELECT vnub_id,vnub_venue_id,vnub_user_id,vnub_slot_id,vnub_slot_date,vnub_status,vnub_added_time FROM $this->table where vnub_venue_id ='$venueId' and vnub_slot_id = '$slotId' and vnub_slot_date = '$date' ";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }


    public function getAllTodayBookingByUserId($userId){
        $sql ="SELECT vd.vnu_id as vnu_id,vd.vnu_name as vnu_name ,vd.vnu_mobile as vnu_mobile,
        vs.vnus_id as vnus_id,vs.vnus_start as vnus_start, vs.vnus_end as vnus_end,vs.vnus_note as vnus_note,
        vb.vnub_id as vnub_id,vb.vnub_slot_id as vnub_slot_id,vb.vnub_status as vnub_status,vb.vnub_venue_id as vnub_venue_id, vb.vnub_slot_date as vnub_slot_date

        FROM venues_bookings as vb 
        LEFT JOIN venues_slots as vs ON vb.vnub_slot_id=vs.vnus_id 
        LEFT JOIN venues as vd ON vb.vnub_venue_id=vd.vnu_id";

        $sql .= " WHERE vnub_user_id = ".$userId." and vnub_slot_date = '".CURRENT_DATE."' ORDER BY vb.vnub_added_time DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllBookingHistoryByUserId($userId){
        $sql ="SELECT vd.vnu_id as vnu_id,vd.vnu_name as vnu_name ,vd.vnu_mobile as vnu_mobile,
        vs.vnus_id as vnus_id,vs.vnus_start as vnus_start, vs.vnus_end as vnus_end,vs.vnus_note as vnus_note,
        vb.vnub_id as vnub_id,vb.vnub_slot_id as vnub_slot_id,vb.vnub_status as vnub_status,vb.vnub_venue_id as vnub_venue_id, vb.vnub_slot_date as vnub_slot_date

        FROM venues_bookings as vb 
        LEFT JOIN venues_slots as vs ON vb.vnub_slot_id=vs.vnus_id 
        LEFT JOIN venues as vd ON vb.vnub_venue_id=vd.vnu_id";

        $sql .= " WHERE vnub_user_id = ".$userId." ORDER BY vb.vnub_added_time DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>