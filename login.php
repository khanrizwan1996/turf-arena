<?php require('header.php'); ?>
<header>
    <?php require('nav-bar.php'); ?>
    <div class="bg-theme-overlay">
        <section class="section__breadcrumb ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="text-capitalize text-white">register</h2>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="index" class="text-white">home</a>
                            </li>
                            
                            <li class="list-inline-item">
                                <a href="register" class="text-white">register</a>
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
                <div class="card mx-auto" style="max-width: 380px;">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><center>Login</center></h4>

                        <?php if(isset($sessionOTP) && isset($sessionMobileNo)){ 
                                if($_GET['msg'] == 'TA106'){ ?>
                                <div class="alert alert-danger alert-dismissible fade show auto-dismiss" role="alert">
                                    <strong><?= TA106 ?>!</strong> 
                                </div>
                            <?php } if($_GET['msg'] == 'TA104'){ ?>
                                <div class="alert alert-success alert-dismissible fade show auto-dismiss" role="alert">
                                    <strong><?= TA104 ?>!</strong> 
                                </div>
                            <?php }
                            }?>

                        <form action="<?= ACTION_URL ?>user-login.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Mobile No" name="u_mobile" id="u_mobile" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="u_password" id="u_password" type="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div>
                        </form>
                            <div class="form-group">
                            <a href="#" class="float-right" style="font-size: 14px;">Forgot password?</a>
                            <span style="font-size: 14px;"> Don't have account? <a href="<?= HOST_URL ?>register">Sign up</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require('footer.php'); ?>