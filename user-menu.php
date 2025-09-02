<?php 
if(!isset($sessionUserId) && empty($sessionUserId)){
  $url=HOST_URL.'login.php?msg='.TA203;
	$callurl= UrlCall($url);
}

$baseUrl= basename($_SERVER['PHP_SELF']);  ?>
<div class="sidebar customBox">
    <h3><?= $sessionName ?></h3>
    <a href="<?= HOST_URL ?>user-dashboard" <?php if($baseUrl == 'user-dashboard.php') {?>class="active"<?php } ?>>Dashboard</a>
    <a href="<?= HOST_URL ?>user-today-booking" <?php if($baseUrl == 'user-today-booking.php') {?>class="active"<?php } ?>>Today Booking</a>
    <a href="<?= HOST_URL ?>user-booking-history" <?php if($baseUrl == 'user-booking-history.php') {?>class="active"<?php } ?>>Booking History</a>
    <a href="<?= ACTION_URL ?>user-logout">Logout</a>
</div>