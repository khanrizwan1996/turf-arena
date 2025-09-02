<?php
include('../modal/db_config.php');  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $user_id  = $_POST['user_id'];
    $old_profile  = $_POST['old_profile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_ptoken = $_POST['password'];


    if (isset($_FILES['profile']) && $_FILES['profile']['error'] == UPLOAD_ERR_OK) {
        $profile_file_name = basename($_FILES['profile']['name']);
        $profile_file_name = $profile_file_name;
        $profile_file_path = '../custom-images/profile/' . $profile_file_name;

        if (move_uploaded_file($_FILES['profile']['tmp_name'], $profile_file_path)) {
            if(isset($old_profile) && !empty($old_profile)){
                unlink('../custom-images/profile/'.$old_profile);
            }
            $profile_file_name = $conn->real_escape_string($profile_file_name);
        } else {
            die("Error uploading the file");
        }
    }else{
        $profile_file_name = $old_profile;
    }


    $updateSql = "UPDATE user set name = '".$name."', password = '".$password."',user_ptoken = '".$user_ptoken."',  profile = '".$profile_file_name."',update_date = '".CURRENT_DATE_TIME."' where user_id   ='".$user_id  ."' ";

     if ($conn->query($updateSql) === TRUE) {    
        
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['profile'] = $profile_file_name;
        $url=URL.'user-profile.php?msg='.MT402;
		$callurl= UrlCall($url);
       
        //header("Location: ../user-profile.php?msg=success");
	}else{
        $url=URL.'user-profile.php?msg='.MT403;
		$callurl= UrlCall($url);
	}
}
?>