<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Calorie Check</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <script type="module" src="assets/js/jquery.min.js"></script>
    <script type="module" src="assets/js/data.js"></script>
    <script src="assets/js/script.js"></script>
    <!-- Vendor JS Files -->
    <script type="module" src="assets/js/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- =======================================================
        * Template Name: Yummy *
            Updated: May 30 2023 with Bootstrap v5 .3 .0 *
            Template URL: https: //bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
            *
            Author: BootstrapMade.com *
            License: https: //bootstrapmade.com/license/
            ===
            === === === === === === === === === === === === === === === === === ==
        -->

</head>

<body>
    <Style>
        .lists {

            margin: 80px auto;
            background: #FFFFFF;
            box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
            border-radius: 6px;

            display: flex;
            flex-direction: column;
        }

        .selected {

            margin: 80px auto;
            background: #FFFFFF;
            box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
            border-radius: 6px;

            display: flex;
            flex-direction: column;
        }

        .title {
            height: 60px;
            /* border-bottom: 1px solid #E1E8EE; */
            padding: 20px 30px;
            color: #5E6977;
            font-size: 18px;
            font-weight: 400;
        }

        .item {
            padding: 20px 30px;
            height: 120px;
            display: flex;
        }

        .item {
            border-top: 1px solid #E1E8EE;
            /* border-bottom: 1px solid #E1E8EE; */
        }

        /* Buttons -  Delete and Like */
        .buttons {
            position: relative;
            padding-top: 30px;
            margin-right: 60px;
        }

        .delete-btn {
            display: inline-block;
            cursor: pointer;
            width: 18px;
            height: 17px;
            background: url("assets/img/delete-icn.svg") no-repeat center;
            margin-right: 20px;
        }

        .like-btn {
            position: absolute;
            top: 9px;
            left: 15px;
            display: inline-block;
            /* background: url('twitter-heart.png'); */
            width: 60px;
            height: 60px;
            background-size: 2900%;
            background-repeat: no-repeat;
            cursor: pointer;
        }

        .is-active {
            animation-name: animate;
            animation-duration: .8s;
            animation-iteration-count: 1;
            animation-timing-function: steps(28);
            animation-fill-mode: forwards;
        }

        @keyframes animate {
            0% {
                background-position: left;
            }

            50% {
                background-position: right;
            }

            100% {
                background-position: right;
            }
        }

        /* Product Image */
        .image {
            margin-right: 50px;
        }

        /* Product Description */
        .description {
            padding-top: 10px;
            margin-right: 60px;
            width: 115px;
        }

        .description span {
            display: block;
            font-size: 14px;
            color: #43484D;
            font-weight: 400;
        }

        .description span:first-child {
            margin-bottom: 5px;
        }

        .description span:last-child {
            font-weight: 300;
            margin-top: 8px;
            color: #86939E;
        }

        /* Product Quantity */
        .quantity {
            padding-top: 20px;

        }

        .quantity input {
            appearance: none;
            border: none;
            text-align: center;
            width: 32px;
            font-size: 16px;
            color: #43484D;
            font-weight: 300;
        }

        /* button[class*=btn] {
            width: 30px;
            height: 30px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        } */

        .minus-btn img {
            margin-bottom: 3px;
        }

        .plus-btn img {
            margin-top: 2px;
        }

        button:focus,
        input:focus {
            outline: 0;
        }

        /* Total Price */
        .total-price {
            width: 83px;
            padding-top: 27px;
            text-align: center;
            font-size: 16px;
            color: #43484D;
            font-weight: 300;
        }

        /* Responsive */
        @media (max-width: 800px) {
            .shopping-cart {
                width: 100%;
                height: auto;
                overflow: hidden;
            }

            .item {
                height: auto;
                flex-wrap: wrap;
                justify-content: center;
            }

            .image img {
                width: 50%;
            }

            .image,
            .quantity,
            .description {
                width: 100%;
                text-align: center;
                margin: 6px 0;
            }

            .buttons {
                margin-right: 20px;
            }
        }
    </Style>
    
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Calorie Checker<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul class="navhead">

                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="caloriechecker.php">Use Checker</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->