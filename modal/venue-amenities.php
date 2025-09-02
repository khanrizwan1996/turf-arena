<?php
class VenuesAmenities{
    public $conn; 
    private $table = ''; 
    public function __construct($conn)
    {
        $this->table = 'venues_amenities';
        $this->conn = $conn;
    }
 
    public function getAllVenueAmenitiesByVenueId($venueId){
        $sql ="SELECT vnua_id,vnua_venue_id,vnua_name,vnua_added_time FROM $this->table where vnua_venue_id ='$venueId'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>