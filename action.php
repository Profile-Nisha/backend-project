<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('./admin/connection.php');
require_once "vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $formData = [
        'student_grievance' => $_POST['student_grievance'],
        'student_name' => $_POST['student_name'],
        'mobile_no' => $_POST['mobile_no'],
        'email' => $_POST['email'],
        'country' => $_POST['country'],
        'state' => $_POST['state'],
        'city' => $_POST['city'],
        'correspondance_address' => $_POST['correspondance_address'],
        'pin' => $_POST['pin'],
        'student_grievance_details' => $_POST['student_grievance_details']
    ];

    // Validate required fields
    if (empty($formData['student_grievance'])) {
        $errors['student_grievance'] = "Student grievance is required.";
    }
    if (empty($formData['student_name'])) {
        $errors['student_name'] = "Name is required.";
    }
    if (empty($formData['mobile_no'])) {
        $errors['mobile_no'] = "Mobile number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $formData['mobile_no'])) {
        $errors['mobile_no'] = "Invalid mobile number. Please enter a 10-digit number.";
    }
    if (empty($formData['email'])) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    if (empty($formData['country'])) {
        $errors['country'] = "Country is required.";
    }
    if (empty($formData['state'])) {
        $errors['state'] = "State is required.";
    }
    if (empty($formData['city'])) {
        $errors['city'] = "City is required.";
    }
    if (empty($formData['correspondance_address'])) {
        $errors['correspondance_address'] = "Correspondence address is required.";
    }
    if (empty($formData['pin'])) {
        $errors['pin'] = "PIN is required.";
    } elseif (!preg_match('/^[0-9]{6}$/', $formData['pin'])) {
        $errors['pin'] = "Invalid PIN. Please enter a 6-digit number.";
    }
    if (empty($formData['student_grievance_details'])) {
        $errors['student_grievance_details'] = "Student grievance details are required.";
    }

    if (empty($errors)) {
        $gs_token = "GS" . rand(10000000, 99999999);
        $student_grievance = htmlspecialchars($formData['student_grievance']);
        $student_name = htmlspecialchars($formData['student_name']);
        $mobile_no = htmlspecialchars($formData['mobile_no']);
        $email = htmlspecialchars($formData['email']);
        $country = htmlspecialchars($formData['country']);
        $state = htmlspecialchars($formData['state']);
        $city = htmlspecialchars($formData['city']);
        $correspondance_address = htmlspecialchars($formData['correspondance_address']);
        $pin = htmlspecialchars($formData['pin']);
        $student_grievance_details = htmlspecialchars($formData['student_grievance_details']);

        $sql = "INSERT INTO complaints (gs_token, student_grievance, student_name, mobile_no, email, country, state, city, correspondance_address, pin, student_grievance_details)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $gs_token, $student_grievance, $student_name, $mobile_no, $email, $country, $state, $city, $correspondance_address, $pin, $student_grievance_details);

        if ($stmt->execute()) {
            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "jisbarunpandit@gmail.com";
            $mail->Password = "khmgidaoklyiboje";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = "jisbarunpandit@gmail.com";
            $mail->FromName = "Complaint";
            $mail->addAddress($email, "Complaint");
            $mail->isHTML(true);
            $mail->Subject = "Complaint Submission Confirmation";
            $mail->Body    = "Dear $student_name,<br><br>Thank you for submitting your grievance. Here are the details of your submission:<br><br>
                                  Complaint Token: <b>$gs_token</b><br>
                                  Grievance Type: $student_grievance<br>
                                  Grievance Details: $student_grievance_details<br><br>
                                  We will get back to you shortly.<br><br>
                                  Best Regards,<br>Your Support Team";

            try {
                if ($mail->send()) {
                    $stmt->close();
                    $conn->close();
                    header("Location: thank-you.php?gs_token=$gs_token");
                    exit();
                }else{
                    throw new Exception('Email sending failed. Please try again later.');
                }
            } catch (Exception $e) {
                $_SESSION['formData'] = $formData;
                $_SESSION['errors'] = $errors;
                header("Location: register-complaint.php");
                exit();
            }
        }
    } else {
        // Save the form data and errors in the session and redirect back to the form
        $_SESSION['formData'] = $formData;
        $_SESSION['errors'] = $errors;
        header("Location: register-complaint.php");
        exit();
    }
} else {
    // Redirect back to form if the request method is not POST
    header("Location: register-complaint.php");
    exit();
}
