<?php require 'header.php'; ?>
<header>
    <?php require 'nav-bar.php'; ?>
    <div class="bg-theme-overlay">
        <section class="section__breadcrumb ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="text-capitalize text-white">User Dashboard</h2>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="<?= HOST_URL ?>index" class="text-white">
                                    home
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    User Dashboard
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>
<div class="clearfix"></div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 ">
                <?php require('user-menu.php'); ?>
            </div>
            <div class="col-lg-8 customMarginLeft28">
                <div class="card">
                    <div class="card-body">
                        <div class="container py-5">
                            <h4 class="card-title mb-4">Today Booking</h4>
                            <div class="table-responsive">
                                <table id="resultsTable" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Venue Name</th>
                                            <th>Slot Time</th>
                                            <th>Booking Date</th>
                                            <th>Booking Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $getAllTodayBookingByUser	= $venuesBookingObj->getAllTodayBookingByUserId($sessionUserId);
                                        foreach($getAllTodayBookingByUser as $getAllTodayBookingByUserRow){

                                            $getConfirmedVenueBookingBySlots = $venuesBookingObj->getConfirmedVenueBookingBySlotsId($getAllTodayBookingByUserRow['vnub_venue_id'], $getAllTodayBookingByUserRow['vnus_id'],CURRENT_DATE);
                                            
                                            if(!empty($getConfirmedVenueBookingBySlots)) {
                                                if($sessionUserId == $getConfirmedVenueBookingBySlots['vnub_user_id']) {
                                                    $bookingStatus = '<span style="color: green;font-weight: bolder;">Confirmed</span>';
                                                }else{
                                                    $bookingStatus = '<span style="color: red;font-weight: bolder;">Not Available</span>';
                                                }
                                            }else{
                                                $bookingStatus = '<span style="color:  #ffa726;font-weight: bolder;">Booked</span>';
                                            }

                                        ?>
                                        
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $getAllTodayBookingByUserRow['vnu_name'] ?></td>
                                            <td><?= $getAllTodayBookingByUserRow['vnus_start'] . " - ".$getAllTodayBookingByUserRow['vnus_end'] ?></td>
                                            <td><?= $getAllTodayBookingByUserRow['vnub_slot_date'] ?></td>
                                            <td><?= $bookingStatus ?></td>
                                        </tr>
                                       <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'footer.php'; ?>
