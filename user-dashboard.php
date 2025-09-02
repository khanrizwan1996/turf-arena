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
                            <h2 class="card-title mb-4">Results Details</h2>
                            <div class="table-responsive">
                                <table id="resultsTable" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Course Name</th>
                                            <th>Subject Name</th>
                                            <th>Exam Name</th>
                                            <th>Attempted Date</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>BCA</td>
                                            <td>Computer Networks</td>
                                            <td>Mid Term</td>
                                            <td>2025-08-01</td>
                                            <td>85%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>BCA</td>
                                            <td>Operating System</td>
                                            <td>Final Exam</td>
                                            <td>2025-08-15</td>
                                            <td>78%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>MCA</td>
                                            <td>Database</td>
                                            <td>Unit Test</td>
                                            <td>2025-08-20</td>
                                            <td>92%</td>
                                        </tr>
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
