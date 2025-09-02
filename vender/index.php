<!doctype html>
<?php require("../modal/constant.php"); ?>
<html lang="en" class="semi-dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= VENDER_HOST_URL ?>assets/images/favicon-32x32.png" type="image/png" />
	<link href="<?= VENDER_HOST_URL ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= VENDER_HOST_URL ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= VENDER_HOST_URL ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="<?= VENDER_HOST_URL ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?= VENDER_HOST_URL ?>assets/js/pace.min.js"></script>
	<link href="<?= VENDER_HOST_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= VENDER_HOST_URL ?>assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?= VENDER_HOST_URL ?>assets/css/app.css" rel="stylesheet">
	<link href="<?= VENDER_HOST_URL ?>assets/css/icons.css" rel="stylesheet">
	<title>Vender | Admin Login</title>
</head>

<body class="bg-login">
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="<?= VENDER_HOST_URL ?>assets/images/logo-icon.png" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Rukada Admin</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" action="<?= VENDER_ACTION_URL ?>login.php">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Mobile No</label>
												<input type="text" class="form-control" id="ven_mobile" name="ven_mobile" placeholder="Enter Your Mobile No">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="ven_password" placeholder="Enter Your Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
										    <div class="col-md-6">
                                                <a href="auth-basic-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= VENDER_HOST_URL ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= VENDER_HOST_URL ?>assets/js/jquery.min.js"></script>
	<script src="<?= VENDER_HOST_URL ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= VENDER_HOST_URL ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= VENDER_HOST_URL ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<script src="<?= VENDER_HOST_URL ?>assets/js/app.js"></script>
</body>
</html>