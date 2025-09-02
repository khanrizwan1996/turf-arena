<nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent" style="background: #fff;">
    <div class="container">
        <a class='navbar-brand' href='<?= HOST_URL ?>index'>
            <img src="<?= HOST_URL ?>images/logo.png" alt="">
            <img src="<?= HOST_URL ?>images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav99">
            <ul class="navbar-nav mx-auto ">
                <li class="nav-item"><a class='nav-link' style="color:black" href='<?= HOST_URL ?>index'> Home </a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown"
                        style="color:black">Venue</a>
                    <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                        <?php
                        $getAllVenuesCity	= $venuesObj->getAllVenuesCity();
                        foreach($getAllVenuesCity as $getAllVenuesCityRow){?>
                        <li><a class='dropdown-item' href='<?= HOST_URL ?>venue-detail'style="color:black"> <?= $getAllVenuesCityRow['vnu_city'] ?> </a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item"><a class='nav-link' style="color:black" href='<?= HOST_URL ?>contact-us'> Contact Us </a></li>
            </ul>
            <ul class="navbar-nav ">
                <li>
                    <?php if (isset($_SESSION['userId']) && !empty($_SESSION['userId']) && $_SESSION['userId'] != '') {?>
                           <div class="profile" onclick="toggleDropdown()">
                            <img src="<?= CUSTOM_IMAGES_URL . 'users-icon.png'; ?>" alt="Profile">  <?= $sessionName ?>
                            <div class="customDropdown" id="profileDropdown">
                                <a href="<?= HOST_URL ?>user-dashboard">Dashboard</a>
                                <a href="<?= ACTION_URL ?>user-logout">Logout</a>
                            </div>
                        </div>
                    <?php }else{?>
                        <a href="<?= HOST_URL ?>login" class="btn btn-primary text-capitalize"><i class="fa fa-plus-circle mr-1"></i>
                        Login / Register
                    </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
