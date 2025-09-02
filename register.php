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
                                        register
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
    <div class="clearfix"></div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <div class="card mx-auto" style="max-width:520px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><center>Sign in</center></h4>
                            <form action="<?= ACTION_URL ?>user-sign-up.php" method="POST">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="u_name" id="u_name" placeholder="Enter Full Name" required>
                                </div>
                                 <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control" name="u_mobile" id="u_mobile" placeholder="Enter Mobile No" required>
                                </div>
                                 <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control"name="u_password" id="u_password" placeholder="Enter Password" required>
                                </div>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                </div> 
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox"> 
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-label"> I am agree with <a href="#">terms and contitions</a> </span>
                                    </label>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require('footer.php'); ?>