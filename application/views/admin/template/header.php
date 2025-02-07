<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zymstr">
    <meta name="keywords" content="Gym App">
    <meta name="author" content="Vikram Singh">
    <link rel="icon" href="<?php echo base_url('assets/img/favicon')?>" type="image/x-icon">
    <title><?php echo $this->config->item('company_name'); ?></title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css"
        href="<?php echo base_url('assets/panel/') ?>css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/') ?>css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/') ?>css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/') ?>css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('assets/panel/') ?>css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/') ?>css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/') ?>css/style.css">

    <!-- toastre -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        #toast-container {
            z-index: 10000000000000000000;
            /* Set a high value to ensure it appears above other elements */
        }

        #toast-container>div {
            opacity: 1;
        }
    </style>

</head>

<body>

    <!-- Header Start -->
    <header>
        <div class="top-nav top-header sticky-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">

                            <a href="{{ url('dashboard') }}" class="web-logo nav-logo">
                                <!-- set image for batter view  -->
                                <b style="color:black"><?php echo $this->config->item('company_name'); ?></b>
                            </a>


                            <div class="rightside-box">

                                <ul class="right-side-menu">

                                    <li class="right-side" style='display:none'>

                                    </li>

                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <a href="{{ url('logout') }}">Log Out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- Header End -->