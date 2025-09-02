<?php

include('venue-images.php');
include('venues.php');
include('venue-amenities.php');
include('venue-slots.php');
include('venue-bookings.php');
$venuesObj = new Venues($conn);
$venuesImagesObj = new VenuesImages($conn);
$venuesAmenitiesObj = new VenuesAmenities($conn);
$venuesSlotsObj = new VenuesSlots($conn);
$venuesBookingObj = new VenuesBookings($conn);

?>