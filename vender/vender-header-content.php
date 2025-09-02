<?php
require_once('../modal/constant.php');
require_once('../modal/db_config.php');
require_once('../modal/functions.php');

session_start();
if(isset($_SESSION['vendorId'])){
    $sessionVendorId = $_SESSION['vendorId'];
    $sessionVendorName = $_SESSION['vendorName'];
    $sessionVendorMobile = $_SESSION['vendorMobile'];
    $sessionVendorPassword = $_SESSION['vendorPassword'];
}
?>