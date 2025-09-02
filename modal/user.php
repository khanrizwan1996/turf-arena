<?php
class User
{
    public $conn; 
    private $table = ''; 

    public function __construct($conn){
        $this->table = 'users';
        $this->conn = $conn;
    }
    
    public function getUserDetailByUserId($userId){
        $sql ="SELECT * FROM user where user_id =".$userId;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getAllUserDetails(){
        $sql ="select user_id,name,user_name,mobile,email,password,profile,status,user_ptoken,create_date from user order by create_date desc ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getUserReportData($userName=NULL,$mobileNo=NULL,$email=NULL,$from=NULL,$to=NULL,)
    {
        $sql ="SELECT
        u.user_id as user_id,
        u.name as user_name,
        u.mobile as mobile, 
        u.email as email,
        u.create_date as create_date

        FROM user as u  where u.user_id !='0' ";
        if(isset($userName) && $userName != NULL) {
            $sql .="and u.name like '%".$userName."%'";
        }
        if(isset($mobileNo) && $mobileNo != NULL) {
            $sql .="and u.mobile like '%".$mobileNo."%'";
        }
        if(isset($email) && $email != NULL) {
            $sql .="and u.email like '%".$email."%'";
        }
        if(isset($from) && $from != NULL){
            $newFrom = $from." 00:00:00";
            $sql .="and u.create_date >= '".$newFrom."'";
        }
        if(isset($to) && $to != NULL){
            $newTo = $to." 23:59:59";
            $sql .="and u.create_date <= '".$newTo."'";
        }

        $sql .= " ORDER BY u.user_id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>