<?php
class VenuesSlots{
    public $conn; 
    private $table = ''; 
    public function __construct($conn)
    {
        $this->table = 'venues_slots';
        $this->conn = $conn;
    }
 
    public function getAllVenueSlotsByVenuesId($venueId){
        $sql ="SELECT vnus_id,vnus_venue_id,vnus_start,vnus_end,vnus_note,vnus_status FROM $this->table where vnus_venue_id ='$venueId'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

      public function getTotalSlotCountByVenueId($venueId){
        $sql ="SELECT count(vnus_id) as totalSlots FROM $this->table where vnus_venue_id ='$venueId'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['totalSlots'];
    }
}
?>