<?php
class VenuesImages
{
    public $conn; 
    private $table = ''; 
    public function __construct($conn)
    {
        $this->table = 'venues_images';
        $this->conn = $conn;
    }
 
    public function getAllVenueImagesByVenueId($venueId){
        $sql ="SELECT vnui_id,vnui_venues_id,vnui_image FROM $this->table where vnui_venues_id ='$venueId'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>