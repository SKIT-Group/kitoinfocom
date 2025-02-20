<!DOCTYPE html>
<html lang="en" class="darkmode" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->config->item('company_name'); ?></title>

    <!--================= Favicon =================-->
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/commerce/assets/images/fav.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/commerce/assets/images/fav.png">
    <!--================= Bootstrap V5 CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/bootstrap.min.css">
    <!--================= Font Awesome 5 CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/all.min.css">
    <!--================= RT Icons CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/rt-icons.css">
    <!--================= Animate css =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/animate.min.css">
    <!--================= Magnific popup Plugin =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/magnific-popup.css">
    <!--================= Swiper Slider Plugin =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/swiper-bundle.min.css">
    <!--================= Mobile Menu CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/metisMenu.css">
    <!--================= Preloader CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/preloader.css">
    <!--================= Main Menu CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/rtsmenu.css">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/variables/variable5.css">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/commerce/assets/css/main.css">

    <!-- toastre -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        #toast-container {
        z-index: 10000000000000000000; /* Set a high value to ensure it appears above other elements */
        }
    </style>

</head>

<body>
    <!--================= Preloader Section Start Here =================-->
    <div id="weiboo-load">
        <div class="preloader-new">
            <svg class="cart_preloader" role="img" aria-label="Shopping cart_preloader line animation"
                viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                    <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                        <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                        <circle cx="43" cy="111" r="13" />
                        <circle cx="102" cy="111" r="13" />
                    </g>
                    <g class="cart__lines" stroke="currentColor">
                        <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                            stroke-dasharray="338 338" stroke-dashoffset="-338" />
                        <g class="cart__wheel1" transform="rotate(-90,43,111)">
                            <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68"
                                stroke-dashoffset="81.68" />
                        </g>
                        <g class="cart__wheel2" transform="rotate(90,102,111)">
                            <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68"
                                stroke-dashoffset="81.68" />
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <!--================= Preloader End Here =================-->