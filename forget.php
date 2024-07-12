<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust this path if needed
require('./admin/connection.php'); // Ensure this path is correct

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Please enter a valid email address.";
        header("Location: forget.php");
        exit();
    }

    // Replace with your database connection file

    // Check if the email exists in the database
    // $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    // $stmt->bind_param("s", $email);
    // $stmt->execute();
    // $stmt->bind_result($emailCount);
    // $stmt->fetch();
    // $stmt->close();

    // if ($emailCount == 0) {
    //     $_SESSION['error'] = "Email address not found.";
    //     header("Location: forget.php");
    //     exit();
    // }

    // Generate a 6-digit OTP
    // $otp = rand(100000, 999999);

    // Store OTP in session
    // $_SESSION['otp'] = $otp;
    // $_SESSION['otp_email'] = $email;

    // Create a new PHPMailer instance
    // $mail = new PHPMailer(true);

    // try {
        // Server settings
        // $mail->isSMTP(); // Use SMTP
        // $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        // $mail->SMTPAuth = true; // Enable SMTP authentication
        // $mail->Username = 'jisbarunpandit@gmail.com'; // Your SMTP username
        // $mail->Password = 'khmgidaoklyiboje'; // Your SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable SSL encryption
        // $mail->Port = 465; // TCP port to connect to

        // Recipients
        // $mail->setFrom('jisbarunpandit@gmail.com', 'Support');
        // $mail->addAddress($email); // Add a recipient

        // // Content
        // $mail->isHTML(true); // Set email format to HTML
        // $mail->Subject = 'Your OTP Code';
        // $mail->Body    = "Hello,<br><br>Your OTP code is <b>$otp</b>. Please use this code to reset your password.<br><br>Thank you.";

        // $mail->send();
        // $_SESSION['success'] = "OTP has been sent to your email.";
        // header("Location: otp.php"); // Redirect to OTP input page
        // exit();
    // } catch (Exception $e) {
    //     $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     header("Location: forget.php");
    //     exit();
    // }
} else {
     
     header("Location: index.php");
     exit();
}
?>

<!doctype html>
<html lang="en">

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

<body>
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
                                    <div class="form-body">
                                        <?php if (isset($_SESSION['error'])): ?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['error']; ?>
                                            </div>
                                            <?php unset($_SESSION['error']); ?>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['success'])): ?>
                                            <div class="alert alert-success">
                                                <?php echo $_SESSION['success']; ?>
                                            </div>
                                            <?php unset($_SESSION['success']); ?>
                                        <?php endif; ?>
                                        <form class="row g-3" action="forget.php" method="POST">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Enter Registered Email</label>
                                                <input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="Enter Your Registered Email" required>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary" name="submit">Send OTP</button>
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
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>
