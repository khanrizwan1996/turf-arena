<?php
require_once('constant.php');
require_once('url.php');

$host = "localhost";
$username = "root";
$password = "";
$dbname = "turfarena";

// $host = "localhost";
// $username = "u968646278_mock_test";
// $password = "MockTest01";
// $dbname = "u968646278_mock_test";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>