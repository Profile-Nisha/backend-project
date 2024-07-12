<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include('./admin/connection.php');

    // Get form data
    $otp = $_POST['otp'];

    // Sanitize input
    $otp = mysqli_real_escape_string($conn, $otp);

    // Prepare an SQL statement
    $sql = "INSERT INTO users (otp) VALUES ('$otp')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        
        header("Location: resetpassword.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();
}
?>



<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Aug 2023 07:14:34 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Forget Password</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="img/ru_logo.png" width="100" alt="" />
									</div>
									<!-- <div class="text-center mb-4">
										<h5 class="Ranchi University"></h5>
										
									</div> -->
									<div class="form-body">
										<form class="row g-3" action="otp.php" method="POST">
											<div class="col-12">
												<label for="otp" class="form-label">Enter 6-Digit OTP</label>
												<input type="number" class="form-control" name="otp" id="name"  placeholder="Enter Valid OTP" require>
											</div>
											
											<!-- <div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div> -->
											<!-- <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
											</div> -->
											<div class="col-12">
												<div class="d-grid">
                                                <a href="resetpassword.php" class="btn btn-primary">Continue</a>

												</div>
											</div>
											
										</form>
									</div>
									
								

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
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
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/rocker/demo/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Aug 2023 07:14:35 GMT -->
</html>