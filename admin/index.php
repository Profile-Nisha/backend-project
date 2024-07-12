<?php
session_start();
error_reporting(0);
require 'connection.php';

$error = '';

if(isset($_SESSION['username'])) {
	header("Location: dashboard.php");
	exit();
}

if (isset($_POST['submit'])) {
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$password = md5($password);
	if (!empty($email) && !empty($password)) {
		$sql = "SELECT * FROM lokpal_admin WHERE email = ? AND password = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = mysqli_fetch_assoc($result);
		if ($row['email'] == $email && $row['password'] == $password) {
			$_SESSION['username'] = $row['username'];
			header("Location: dashboard.php");
			exit();
		} else {
			$error = "Invalid email or password";
		}
	}
}

?>

<?php require 'header.php'; ?>

<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
	<div class="container">
		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
			<div class="col mx-auto">
				<div class="card mb-0">
					<div class="card-body">
						<div class="p-4">
							<div class="mb-3 text-center">
								<img src="../img/ru_logo.png" width="80" alt="logo" />
								<!-- <h3 class="text-primary"></h3> -->
							</div>
							<div class="text-center mb-4">
								<h5>Login</h5>
								<p class="mb-0">Please log in to your account</p>
								<p class="text-danger"><?= isset($error) ? $error : '';?></p>
							</div>
							<div class="form-body">
								<form class="row g-3" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
									<div class="col-12">
										<label for="inputEmailAddress" class="form-label">Email</label>
										<input type="email" class="form-control" id="inputEmailAddress" name="email" placeholder="example@gmail.com">
									</div>
									<div class="col-12">
										<label for="inputChoosePassword" class="form-label">Password</label>
										<div class="input-group" id="show_hide_password">
											<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
										</div>
									</div>
									<div class="col-md-6 text-end">
									</div>
									<div class="col-12">
										<div class="d-grid">
											<button type="submit" name="submit" class="btn btn-primary">Sign in</button>
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


<?php include('./footer.php') ?>

</body>
</html>