<?php require 'header.php';
$venueName = str_replace('-', ' ', $_GET['venueName']);
$venueDetails = $venuesObj->getVenueDetailById($venueName);
$venueAllImages = $venuesImagesObj->getAllVenueImagesByVenueId($venueDetails['vnu_id']);
$getAllVenueAmenities = $venuesAmenitiesObj->getAllVenueAmenitiesByVenueId($venueDetails['vnu_id']);
?>

<style>
    .divHidden {
        display: none;
    }

    h2 {
        margin-top: 0;
        font-size: 20px;
        font-weight: bold;
    }

    .subtitle {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .info {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .info span {
        font-weight: bold;
        color: #2a63c9;
    }

    .slot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        background: #fff;
    }

    .slot:hover {
        border-color: #2a63c9;
    }

    .slot.selected {
        background: #bdf5bd;
        border-color: #4caf50;
    }

    .slot.booked {
        background: #ffa726;
        color: white;
        cursor: not-allowed;
    }

    .slot.confirmedByUser {
        background: green;
        color: white;
        cursor: not-allowed;
    }

    .slot.confirmedByOther {
        background: red;
        color: white;
        cursor: not-allowed;
    }

    .time {
        font-size: 14px;
        font-weight: bold;
    }

    .price {
        font-size: 14px;
        color: #333;
    }

    .status {
        font-size: 16px;
    }

    .status.check {
        color: #4caf50;
    }

    .status.booked {
        color: #999;
    }

    .form-group {
        margin-bottom: 15px;
    }

    input {
        padding: 8px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
    }
</style>

<header>
    <?php require 'nav-bar.php'; ?>
    <div class="bg-theme-overlay">
        <section class="section__breadcrumb ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="text-capitalize text-white">Venue Details</h2>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="<?= HOST_URL ?>index" class="text-white">
                                    home
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    Venue
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>
<section class="single__Detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- SLIDER IMAGE DETAIL -->
                <div class="slider__image__detail-large owl-carousel owl-theme">
                    <?php foreach($venueAllImages as $venueAllImagesRow) {?>
                    <div class="item">
                        <div class="slider__image__detail-large-one">
                            <img src="<?= VENUES_IMAGES_URL . $venueAllImagesRow['vnui_image'] ?>" alt=""
                                class="img-fluid w-100 img-transition">
                            <div class="description">
                                <figure>
                                    <img src="<?= VENUES_IMAGES_URL . $venueAllImagesRow['vnui_image'] ?>"
                                        alt="" class="img-fluid">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="slider__image__detail-thumb owl-carousel owl-theme">
                    <?php foreach($venueAllImages as $venueAllImagesRow1) {?>
                    <div class="item">
                        <div class="slider__image__detail-thumb-one">
                            <img src="<?= VENUES_IMAGES_URL . $venueAllImagesRow1['vnui_image'] ?>" alt=""
                                class="img-fluid w-100 img-transition">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-9 col-lg-9">
                        <div class="single__detail-title mt-4">
                            <h3 class="text-capitalize"><?= $venueDetails['vnu_name'] ?></h3>
                            <p><?= $venueDetails['vnu_address'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single__detail-desc">
                            <h6 class="text-capitalize detail-heading">description</h6>
                            <div class="show__more">
                                <?= $venueDetails['vnu_aboutus'] ?>
                                <a href="javascript:void(0)" class="show__more-button ">read more</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="single__detail-features">
                            <h6 class="text-capitalize detail-heading">features</h6>
                            <ul class="list-unstyled icon-checkbox">
                                <?php foreach($getAllVenueAmenities as $getAllVenueAmenitiesRow) {?>
                                <li><?= $getAllVenueAmenitiesRow['vnua_name'] ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="products__filter mb-30">
                    <!-- <div class="products__filter__group">
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <a href="<?= HOST_URL . 'venue-book/' . $_GET['venueName'] ?>" class="btn btn-primary text-capitalize btn-block"><i class="fa fa-search ml-1"></i> Book your slots </a>
                                </div>
                            </div>
                        </div> -->

                    <section class="single__Detail" style="padding: 15px;">
                        <div class="container">
                            <h2>Book Your Slots:</h2>
                            <br>
                            <div class="row form-group col-lg-12">
                                <label for="date">Select Date:</label>
                                <input type="date" id="selectDate" value="<?= CURRENT_DATE ?>" />
                            </div>
                            <p class="info">Date of Booking:
                                <span id="bookingDate">--</span><br>
                                Booked Slots: <span id="bookedSlots">0 Slots</span>
                                Available Slots: <span id="availableSlots">0 Slots</span><br>
                                Total Slots: <span id="totalSlots">0 Slots</span>
                            </p>
                            <div id="slotsContainer"></div>
                            <center><button class="btn btn-primary text-capitalize divHidden"
                                    id="submitDetail">Submit</button></center>
                            <br><br><br><br>
                        </div>
                    </section>

                </div>
                <div class="single__detail-features">
                    <h6 class="text-capitalize detail-heading">location</h6>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-map-location-tab" data-toggle="pill"
                                href="#pills-map-location" role="tab" aria-controls="pills-map-location"
                                aria-selected="true">
                                <i class="fa fa-map-marker"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-map-location" role="tabpanel"
                            aria-labelledby="pills-map-location-tab">
                            <div id="map-canvas">
                                <iframe class="h600 w100"
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d50446.89789906054!2d-122.41577600000001!3d37.791654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd473843de08ff793!2sBetter%20Property%20Management!5e0!3m2!1sen!2sus!4v1591226304089!5m2!1sen!2sus"
                                    style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-street-view" role="tabpanel"
                            aria-labelledby="pills-street-view-tab">
                            <iframe class="h600 w100"
                                src="https://www.google.com/maps/embed?pb=!4v1553797194458!6m8!1m7!1sR4K_5Z2wRHTk9el8KLTh9Q!2m2!1d36.82551718071267!2d-76.34864590837246!3f305.15097!4f0!5f0.7820865974627469"
                                style="border:0;" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="similiar__item">
                    <h6 class="text-capitalize detail-heading">
                        Similiar <?= $venueDetails['vnu_city'] ?> Turf
                    </h6>
                    <div class="similiar__property-carousel owl-carousel owl-theme">
                        <?php 
                    $getAllVenuesByCityName = $venuesObj->getAllVenuesByCityName($venueDetails['vnu_city']);
                    foreach($getAllVenuesByCityName as $getAllVenuesByCityNameRow){
                        $venueName = str_replace(' ', '-', $getAllVenuesByCityNameRow['vnu_name']);
                        $getTotalSlotCount = $venuesSlotsObj->getTotalSlotCountByVenueId($venueDetails['vnu_id']); ?>
                        <div class="item">
                            <div class="card__image">
                                <div class="card__image-header h-250">
                                    <img src="<?= VENUES_IMAGES_URL . $getAllVenuesByCityNameRow['vnu_image'] ?>"
                                        alt="" class="img-fluid w100 img-transition">
                                </div>
                                <div class="card__image-body">
                                    <span
                                        class="badge badge-primary text-capitalize mb-2"><?= $getAllVenuesByCityNameRow['vnu_area'] ?></span>
                                    <h6 class="text-capitalize">
                                        <a
                                            href="<?= HOST_URL . 'venue-detail/' . $venueName ?>"><?= $getAllVenuesByCityNameRow['vnu_name'] ?></a>
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        <?= $getAllVenuesByCityNameRow['vnu_address'] ?>
                                    </p>
                                </div>
                                <div class="card__image-footer">
                                    Total Slots: <?= $getTotalSlotCount ?>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">
                                            <h6 class="text-primary"><a
                                                    href="<?= HOST_URL . 'venue-detail/' . $venueName ?>">View
                                                    Details</a></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function handleDateChange() {
        const selectDate = document.getElementById("selectDate");
        const bookingDate = document.getElementById("bookingDate");
        const totalSlots = document.getElementById("totalSlots");
        const bookedSlots = document.getElementById("bookedSlots");
        const availableSlots = document.getElementById("availableSlots");
        const slotsContainer = document.getElementById("slotsContainer");
        let selectedCount = 0;

        //document.getElementById("selectDate").addEventListener("change", function() {
        const selectedDate = selectDate.value;
        bookingDate.textContent = selectedDate ? new Date(selectedDate).toDateString() : "--";
        document.getElementById("submitDetail").classList.remove("divHidden");
        fetch("<?= HOST_URL ?>get_slots.php?date=" + selectedDate + "&userId=" + <?= $sessionUserId ?> + "&venueId=" +
                <?= $venueDetails['vnu_id'] ?>)
            .then(res => res.json())
            .then(slots => {
                renderSlots(slots);
            });
        //});

        function renderSlots(slots) {
            slotsContainer.innerHTML = "";
            selectedCount = 0;
            const bookedCount = slots.filter(s => s.status === "booked").length;
            const availableCount = slots.filter(s => s.status === "available").length;
            totalSlots.textContent = slots.length;
            bookedSlots.textContent = bookedCount;
            availableSlots.textContent = availableCount;


            slots.forEach(slot => {
                const div = document.createElement("div");
                div.className = "slot";
                div.dataset.slotId = slot.slot_id;
                if(slot.status === "booked") div.classList.add("booked");
                else if(slot.status === "confirmedByUser") div.classList.add("confirmedByUser");
                else if(slot.status === "confirmedByOther") div.classList.add("confirmedByOther");


                if (slot.status == "confirmedByUser") {
                    div.innerHTML = `
                    <span>${slot.start_time} - ${slot.end_time}</span>
                    <span class="confirmedByUser">Confirmed</span>`;

                } else if (slot.status === "confirmedByOther") {
                    div.innerHTML = `<span>${slot.start_time} - ${slot.end_time}</span>
                    <span class="confirmedByOther">Not Available</span>`;
                } else if (slot.status === "booked") {
                    div.innerHTML = `
                    <span>${slot.start_time} - ${slot.end_time}</span>
                    <span class="status">Booked</span>`;
                } else {
                    div.innerHTML = `<span class="text-align">${slot.start_time} &nbsp; To &nbsp; ${slot.end_time}</span>`;
                    div.addEventListener("click", () => {
                        if (!div.classList.contains("selected")) {
                            if (selectedCount >= 3) {
                                alert("You can select only up to 3 slots!");
                                return;
                            }
                            div.classList.add("selected");
                            div.querySelector(".status").textContent = "✔";
                            selectedCount++;
                        } else {
                            div.classList.remove("selected");
                            div.querySelector(".status").textContent = "○";
                            selectedCount--;
                        }
                    });
                }
                slotsContainer.appendChild(div);
            });
        }
    }
    window.onload = function() {
        handleDateChange(); // in case a date is pre-selected
        document.getElementById("selectDate").addEventListener("change", handleDateChange);
    };


    document.getElementById("submitDetail").addEventListener("click", () => {
        const selectedSlots = [];

        document.querySelectorAll("#slotsContainer .slot.selected").forEach(div => {
            const start = div.querySelector("span:nth-child(1)");
            const end = div.querySelector("span:nth-child(2)");
            const slotId = div.dataset.slotId;
            selectedSlots.push({
                start_time: start,
                end_time: end,
                slot_id: slotId,
                status: "booked"
            });
        });
        //alert(JSON.stringify(selectedSlots));
        if (selectedSlots.length === 0) {
            alert("Please select at least one slot!");
            return;
        }

        fetch("<?= ACTION_URL ?>venue-booking-save.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    date: document.getElementById("selectDate").value,
                    venueId: <?= $venueDetails['vnu_id'] ?>,
                    slots: selectedSlots
                })
            })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    alert("Booking saved successfully!");
                    document.location = "<?= HOST_URL ?>index";
                } else {
                    alert("Error: " + response.message);
                }
            })
            .catch(err => console.error(err));
    });
</script>
<?php require 'footer.php'; ?>
