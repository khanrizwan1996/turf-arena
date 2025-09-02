<?php
class Venues
{
    public $conn; 
    private $table = ''; 
    public function __construct($conn)
    {
        $this->table = 'venues';
        $this->conn = $conn;
    }
    public function getAllVenuesCity(){
        $sql ="SELECT vnu_id,vnu_city FROM venues where vnu_status=" .STATUS_ACTIVE." group by vnu_city ORDER BY vnu_added_time DESC ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getAllVenuesByCityName($city){
       $sql ="SELECT vnu_id,vnu_name,vnu_mobile,vnu_area,vnu_city,vnu_image,vnu_address FROM venues where vnu_status=" .STATUS_ACTIVE." and vnu_city ='".$city."' ORDER BY vnu_added_time DESC ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getVenueDetailById($venueId){
        $sql ="SELECT vnu_id,vnu_name,vnu_mobile,vnu_email,vnu_whatsapp,vnu_address,vnu_area,vnu_city,vnu_pincode,vnu_state,vnu_maplink,vnu_image,vnu_contactname,vnu_aboutus,vnu_added_time FROM venues where vnu_name ='$venueId'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
}
?>