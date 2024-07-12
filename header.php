<?php 

session_start();

?>

<!doctype html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ranchi University Lokpal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
    <!-- <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/core.css">
    <link rel="stylesheet" type="text/css" href="./css/shortcode/shortcodes.css">
    <link rel="stylesheet" type="text/css" href="./css/shortcode/profile.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/department.css">
    <link rel="stylesheet" type="text/css" href="./css/faculty.css">

    <link rel="stylesheet" type="text/css" href="./css/responsive.css">
    <link rel="stylesheet" type="text/css" href="./css/style-customizer.css">
    <link href="#" data-style="styles" rel="stylesheet">
    <script src="./js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="./js/vendor/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/lightbox/simple-lightbox.css?v2.11.0" />
    <style>
        .carousel-caption {
            position: absolute;
            right: 0%;
            bottom: 2px;
            left: 0%;
            z-index: 10;
            padding-top: 8px;
            padding-bottom: 8px;
            color: #fff;
            text-align: center;
            background-color: #02245b;
            opacity: 0.8;
        }

        .carousel-caption h5 {
            color: #fff;
        }

        .error {
            color: red;
            font-size: 0.875em;
        }
    </style>

</head>


<body>
    <!--Main Wrapper Start-->
    <div class="wrapper bg-white fix">
        <!--Bg White Start-->
        <div class="bg-white">
            <!--Header Area Start-->
            <header class="header-area">

                <div class="header-second bg-light">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center py-1 g-0">
                            <div class="col-lg-3 col-2 px-0">
                                <div class="logo-1 text-center">
                                    <a href="index.php">
                                        <img src="img/ru_logo.png" alt="DomInno" class="img-fluid">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-8 text-center mobile">
                                <h3>RANCHI UNIVERSITY LOKPAL</h3>
                                <h5>Digital Platform for Management of Complaints</h5>
                            </div>

                            <div class="col-lg-3 col-2 px-0">
                                <div class="logo text-center d-none d-lg-block"> <!-- Added d-none d-lg-block class -->
                                    <a href="index.php">
                                        <img src="img/ranchi-university-3.png" alt="DomInno" class="img-fluid">
                                    </a>
                                </div>
                                <div class="logo text-center d-block d-lg-none"> <!-- Optionally, you can add a different image or hide it -->
                                    <!-- Optionally add a placeholder or leave it empty for mobile -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div id="sticky-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="pull_right">
                        <nav id="primary-menu">
                            <ul class="main-menu text-right">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>

                                <li>
                                    <a href="#"> About Us</a>
                                    <!-- <ul class="dropdown mt-3">
                                        <li>
                                            <a href="about.php">About ILS</a>
                                        </li>
                                        <li>
                                            <a href="vission-mission.php">Vission & Mission</a>
                                        </li>
                                        <li>
                                            <a href="director-message.php">Director's Message</a>
                                        </li>
                                    </ul> -->
                                </li>
                                <li>
                                    <a href="./register-complaint.php">Lodge a Complaints Online</a>
                                </li>
                                <li>
                                    <a href="./check-status.php">Check Status of Complaint</a>
                                </li>
                                <li>
                                    <a href="#">Complaint Filling by Post/Hand</a>
                                </li>
                                <li>
                                    <!-- <a href="./admin/index.php">Complaint Dashboard</a> -->
                                </li>
                                <?php
                                
                                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                                    // If user is logged in
                                    
                                    echo '<li><a href="logout.php">Logout</a></li>';
                                } else {
                                    // If user is not logged in
                                    
                                    echo '<li><a href="register.php">Sign-In/Register</a></li>';
                                }
                                ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area start -->
    <div class="mobile-menu-area " style="background: #174826 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li>
                                    <a href="index.php">HOME</a>
                                </li>
                                <li>
                                    <a href="#">ABOUT</a>
                                    <!-- <ul class="sub-menu">
                                        <li>
                                            <a href="about.php">About ILS</a>
                                        </li>
                                        <li>
                                            <a href="vission-mission.php">Vission & Mission</a>
                                        </li>
                                        <li>
                                            <a href="director-message.php">Director's Message</a>
                                        </li>
                                    </ul> -->
                                </li>
                                <li>
                                    <a href="./register-complaint.php">Lodge a Complaints Online</a>
                                </li>
                                <li>
                                    <a href="./check-status.php">Check Status of Complaint</a>
                                </li>
                                <li>
                                    <a href="#">Complaint Filling by Post/Hand</a>
                                </li>
                                <!-- <li>
                                    <a href="./admin/index.php">Complaint Dashboard</a>
                                </li> -->
                                <?php
                              
                                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                                    // If user is logged in
                                    echo '<li><a href="logout.php">Logout</a></li>';
                                } else {
                                    // If user is not logged in
                                    echo '<li><a href="register.php">Sign-In/Register</a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area end -->
    </header>
    <!-- End of Header Area -->