<?php require('header.php'); ?>
<style>
    /* Fade out after 5s */
    .alert.auto-dismiss {
      animation: fadeOut 1s ease forwards;
      animation-delay: 5s; /* wait 5s before disappearing */
    }
    @keyframes fadeOut {
      to {
        opacity: 0;
        visibility: hidden;
        height: 0;
        margin: 0;
        padding: 0;
      }
    }
  </style>
    <header>
        <?php require('nav-bar.php'); ?>
        <div class="bg-theme-overlay">
            <section class="section__breadcrumb ">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <h2 class="text-capitalize text-white">OTP Verification</h2>
                            <ul class="list-inline ">
                                <li class="list-inline-item">
                                    <a href="<?= HOST_URL ?>home" class="text-white">
                                        home
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?= HOST_URL ?>register" class="text-white">
                                        Register
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-white">
                                        OTP Verification
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
                <div class="col-lg-12">
                   <div class="card mx-auto" style="max-width:520px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><center>OTP Verification</center></h4>
                            <?php if(isset($sessionOTP) && isset($sessionMobileNo)){ 
                                if($_GET['msg'] == 'TA105'){ ?>
                                <div class="alert alert-danger alert-dismissible fade show auto-dismiss" role="alert">
                                    <strong><?= TA105 ?>!</strong> 
                                </div>
                            <?php } if($_GET['msg'] == 'TA104'){ ?>
                                <div class="alert alert-success alert-dismissible fade show auto-dismiss" role="alert">
                                    <strong><?= TA104 ?>!</strong> 
                                </div>
                            <?php }
                            }?>
                            <form action="<?= ACTION_URL ?>verify-otp.php" method="POST">
                                 <div class="form-group">
                                    <label>OTP</label>
                                    <input type="text" class="form-control"name="otp" id="otp" placeholder="Enter Your OTP" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Submit </button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require('footer.php'); ?>