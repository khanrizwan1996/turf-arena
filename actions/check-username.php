<?php
include('../modal/db_config.php');
if(isset($_POST['user_name'])) {
    $input_username = mysqli_real_escape_string($conn, $_POST['user_name']);
    $sql = "SELECT user_id,name,user_name FROM user WHERE user_name = '$input_username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo 'available';
    }
} else {
    echo 'Error: No username provided';
}
?>