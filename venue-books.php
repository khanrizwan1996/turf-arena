<?php require 'header.php';
    $venueName = str_replace('-', ' ', $_GET['venueName']);
    $venueDetails = $venuesObj->getVenueDetailById($venueName);
    if(!$sessionUserId){
        echo "<script>
            alert('Please Login First');
            window.location.href='".HOST_URL."login';
        </script>";
    }
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
        background: #f1f1f1;
        color: #999;
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
                        <h2 class="text-capitalize text-white">Venue Book</h2>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    home
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    page
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    about us
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- END BREADCRUMB -->
</header>
<section class="single__Detail">
    <div class="container">
        <h2><?= $venueDetails['vnu_name']; ?></h2>
        <p class="subtitle"><i class="fa fa-map-marker"></i> <?= $venueDetails['vnu_city']; ?><br><small><?= $venueDetails['vnu_address']; ?></small></p>

        <div class="row form-group col-lg-4">
            <label for="date">Select Date:</label>
            <input type="date" id="selectDate" />
        </div>
        <p class="info">Date of Booking:
            <span id="bookingDate">--</span> &nbsp;&nbsp; 
            Total Slots: <span id="totalSlots">0 Slots</span>
            &nbsp;&nbsp; 
            Booked Slots: <span id="bookedSlots">0 Slots</span>
            &nbsp;&nbsp; 
            Available Slots: <span id="availableSlots">0 Slots</span>
        </p>
        <div id="slotsContainer"></div>
        <center><button class="btn btn-primary text-capitalize divHidden" id="submitDetail">Submit</button></center>
        <br><br><br><br>
    </div>
</section>
<script>
    const bookingDate = document.getElementById("bookingDate");
    const totalSlots = document.getElementById("totalSlots");
    const bookedSlots = document.getElementById("bookedSlots");
    const availableSlots = document.getElementById("availableSlots");
    const slotsContainer = document.getElementById("slotsContainer");
    let selectedCount = 0;

    document.getElementById("selectDate").addEventListener("change", function() {
        const selectedDate = this.value;
        bookingDate.textContent = selectedDate ? new Date(selectedDate).toDateString() : "--";
         document.getElementById("submitDetail").classList.remove("divHidden");
        fetch("<?= HOST_URL ?>get_slots.php?date="+selectedDate+"&venueId="+<?= $venueDetails['vnu_id'] ?>)
            .then(res => res.json())
            .then(slots => {
                renderSlots(slots);
            });
    });

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

            div.innerHTML = `
            <span>${slot.start_time}</span>
            <span>${slot.end_time}</span>
            <span class="status">${slot.status === "booked" ? "Booked" : "○"}</span>
            `;
            if(slot.status === "available") {
                div.addEventListener("click", () => {
                    if (!div.classList.contains("selected")) {
                        if (selectedCount >= 2) {
                            alert("You can select only up to 2 slots!");
                            return;
                        }
                        div.classList.add("selected");
                        div.querySelector(".status").textContent = "✔";
                        selectedCount++;
                    }else{
                        div.classList.remove("selected");
                        div.querySelector(".status").textContent = "○";
                        selectedCount--;
                    }
                });
            }
            slotsContainer.appendChild(div);
        });
    }


    document.getElementById("submitDetail").addEventListener("click", () => {
    const selectedSlots = [];

    document.querySelectorAll("#slotsContainer .slot.selected").forEach(div => {
        const start = div.querySelector("span:nth-child(1)").textContent;
        const end   = div.querySelector("span:nth-child(2)").textContent;
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
        headers: { "Content-Type": "application/json" },
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
