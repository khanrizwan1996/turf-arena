<?php
//error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata'); 

define('CURRENT_DATE_TIME', date("Y-m-d H:i:s"));
define('CURRENT_DATE', date("Y-m-d"));

define('HOST_URL', 'http://localhost/tuef-arena/');
define('VENDER_HOST_URL', HOST_URL.'vender/');
define('ADMIN_HOST_URL', HOST_URL.'admin/');

//define('HOST_URL', 'https://www.mocktestonline.com/');

define('ACTION_URL', HOST_URL.'actions/');
define('ADMIN_ACTION_URL', HOST_URL.'admin/actions');
define('VENDER_ACTION_URL', VENDER_HOST_URL.'actions/');

define('CUSTOM_IMAGES_URL', HOST_URL.'custom-images/');
define('VENUES_IMAGES_URL', CUSTOM_IMAGES_URL.'venues/');



define('MSG_ADD', '100');
define('MSG_ERROR', '102');
define('MSG_UPDATE', '103');
define('MSG_UPDATE_ERROR', '104');
define('MSG_DELETE', '105');
define('STATUS_INACTIVE', '0');
define('STATUS_ACTIVE', '1');
define('STATUS_EXPIRED', '2');

//Register
define('TA100', 'Signup Successfull!');
define('TA102', 'Failed to send verification email');
define('TA103', 'Failed to sign-up');
define('TA104', 'OTP successfully sent on yours mobile no');
define('TA105', 'OTP not matched');
define('TA106', 'OTP match successfully');

//Login
define('MT200', 'Please login First');
define('TA202', 'Invalid Details');
define('TA203', 'Your Mobile No is not verified');
define('MT204', 'Your account is not activated. Please contact to administration team for more.');
define('MT205', 'Incorrect Password');
define('TA206', 'Login successfully');

//Exam
define('MT300', 'Thankyou For Attending Test...!!!');
define('MT301', 'Exam Not Start');
define('MT302', 'Exam Ended');
define('MT303', 'Exam Already Attempted');
define('MT304', 'Please Enroll First');

// Details
define('MT400', 'Details Added Successfull...!!!');
define('MT401', 'Error in Details Add...!!!');
define('MT402', 'Details Update Successfull...!!!');
define('MT403', 'Error in Details Update...!!!');

//
define('UPCOMING', 'Upcoming');
define('START', 'START');
define('END', 'END');
define('ENROLL', 'ENROLL');
define('ALREADY_ATTEMPTED', 'ALREADY ATTEMPTED');
define('ALREADY_PURCHASED', 'ALREADY PURCHASED');
?>