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

    <div class="anywere anywere-home"></div>

    <!--================= Header Section Start Here =================-->
    <header id="rtsHeader">
        
        <div class="navbar-wrap">
            <div class="navbar-part navbar-part3 navbar-part5">
                <div class="container header-container">
                    <div class="navbar-inner navbar-inner2">
                        <a href="index.html" class="logo"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/logo2.svg" alt="weiboo-logo"></a>
                        <!-- <div class="navbar-search-area">
                            <div class="search-input-inner">
                                <div class="input-div">
                                    <div class="search-input-icon icon2"><i class="rt-search mr--10"></i>Search</div>
                                    <input class="search-input input4" type="text" placeholder="Keyword here...">
                                </div>
                            </div>
                        </div> -->
                        <div class="header-action-items header-action-items1">
                            
                            <div class="cart action-item">
                                <div class="cart-nav">
                                    <div class="cart-icon icon"><i class="rt-cart"></i><span
                                            class="wishlist-dot icon-dot">3</span></div>
                                </div>
                            </div>

                            <a href="login.html" class="account"><i class="rt-user-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart-bar">
            <div class="cart-header">
                <h3 class="cart-heading">MY CART (3 ITEMS)</h3>
                <div class="close-cart"><i class="fal fa-times"></i></div>
            </div>
            <div class="product-area">
                <div class="product-item">
                    <div class="product-detail">
                        <div class="product-thumb"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/slider/image1.jpg" alt="product-thumb"></div>
                        <div class="item-wrapper">
                            <span class="product-name">Parachute Jacket</span>
                            <div class="item-wrapper">
                                <span class="product-variation"><span class="color">Green /</span>
                                    <span class="size">XL</span></span>
                            </div>
                            <div class="item-wrapper">
                                <span class="product-qnty">3 ×</span>
                                <span class="product-price">₹198.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-edit">
                        <div class="quantity-edit">
                            <button class="button"><i class="fal fa-minus minus"></i></button>
                            <input type="text" class="input" value="3" />
                            <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                        </div>
                        <div class="item-wrapper d-flex mr--5 align-items-center">
                            <a href="#" class="product-edit"><i class="fal fa-edit"></i></a>
                            <a href="#" class="delete-cart"><i class="fal fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product-detail">
                        <div class="product-thumb"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/slider/image2.jpg" alt="product-thumb"></div>
                        <div class="item-wrapper">
                            <span class="product-name">Narrow Trouser</span>
                            <div class="item-wrapper">
                                <span class="product-variation"><span class="color">Green /</span>
                                    <span class="size">XL</span></span>
                            </div>
                            <div class="item-wrapper">
                                <span class="product-qnty">2 ×</span>
                                <span class="product-price">₹88.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-edit">
                        <div class="quantity-edit">
                            <button class="button"><i class="fal fa-minus minus"></i></button>
                            <input type="text" class="input" value="2" />
                            <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                        </div>
                        <div class="item-wrapper d-flex mr--5 align-items-center">
                            <a href="#" class="product-edit"><i class="fal fa-edit"></i></a>
                            <a href="#" class="delete-cart"><i class="fal fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-item last-child">
                    <div class="product-detail">
                        <div class="product-thumb"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/slider/image5.jpg" alt="product-thumb"></div>
                        <div class="item-wrapper">
                            <span class="product-name">Bellyless Hoodie</span>
                            <div class="item-wrapper">
                                <span class="product-variation"><span class="color">Green /</span>
                                    <span class="size">XL</span></span>
                            </div>
                            <div class="item-wrapper">
                                <span class="product-qnty">1 ×</span>
                                <span class="product-price">₹289.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-edit">
                        <div class="quantity-edit">
                            <button class="button"><i class="fal fa-minus minus"></i></button>
                            <input type="text" class="input" value="2" />
                            <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                        </div>
                        <div class="item-wrapper d-flex mr--5 align-items-center">
                            <a href="#" class="product-edit"><i class="fal fa-edit"></i></a>
                            <a href="#" class="delete-cart"><i class="fal fa-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-bottom-area">
                <span class="spend-shipping"><i class="fal fa-truck"></i> SPENT <span class="amount">₹199.00</span> MORE
                    FOR FREE SHIPPING</span>
                <span class="total-price">TOTAL: <span class="price">₹556</span></span>
                <a href="checkout.html" class="checkout-btn cart-btn">PROCEED TO CHECKOUT</a>
                <a href="cart.html" class="view-btn cart-btn">VIEW CART</a>
            </div>
        </div>

        <!--================= Banner Section Start Here =================-->
        <div class="banner banner-3 banner-5">
            <div class="swiper bannerSlidee">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="banner-single bg-image-5 balo">
                            <div class="container">
                                <div class="single-inner">
                                    <div class="contents">
                                        <span class="banner-pretitle-box">Don’t Miss! Only For This Week <span
                                                class="cate">Organic Juice</span></span>
                                        <h1 class="banner-heading mb--30">Todays Best Deal <br>
                                            In Our Store</h1>
                                        <div class="banner-action">
                                            <p>From</p>
                                            <span class="product-price">₹29.00</span>
                                        </div>
                                    </div>
                                    <div class="banner-product-thumb"><img
                                            src="<?php echo base_url(); ?>assets/commerce/assets/images/products/banner-product5.png" alt="banner-product"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banner-single bg-image-5">
                            <div class="container">
                                <div class="single-inner">
                                    <div class="contents">
                                        <span class="banner-pretitle-box">Hot Deal In This Week</span>
                                        <h1 class="banner-heading mb--30">Elegance <br>
                                            Hand Craft</h1>
                                        <div class="banner-action">
                                            <a class="banner-btn banner-btn2" href="javascript:void(0)"><i
                                                    class="rt-cart-shopping"></i>Shop
                                                Now</a>
                                            <div class="banner-review">
                                                <div class="review">
                                                    <div class="star"><i class="fas fa-star"></i></div>
                                                    <div class="star"><i class="fas fa-star"></i></div>
                                                    <div class="star"><i class="fas fa-star"></i></div>
                                                    <div class="star"><i class="fas fa-star"></i></div>
                                                    <div class="star"><i class="fal fa-star"></i></div>
                                                </div>
                                                <span class="review-text"><span class="value">100+</span> Review</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-product-thumb"><img
                                            src="<?php echo base_url(); ?>assets/commerce/assets/images/products/banner-product2.png" alt="banner-product"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!--================= Banner Section End Here =================-->
    </header>
    <!--================= Header Section End Here =================-->

    <!--================= Product Category Section Start Here =================-->
    <div class="rts-featured-product-section rts-featured-product-section2 section-gap">
        <div class="container">
            <div class="section-header section-header4">
                <span class="section-title section-title-2 mb--5
                ">Products</span>
            </div>

            <div class="row justify-content-center">

                <?php foreach ($available_products as $key => $product) {?>

                <div class="col-lg-15 col-md-4 col-sm-6">
                    <div class="product-item">
                        <div class="product-status-bar">
                            <span class="stock">In Stock</span>
                        </div>

                        <a href="javascript:void(0)" class="product-thumb"><img
                                src="<?php echo base_url("uploads/products/".$product['img']); ?>" alt="product-image"></a>
                        <div class="contents">
                            <a href="javascript:void(0)" class="product-title"><?php echo $product['name']; ?></a>
                            <div class="product-bottom-content">
                                <span class="product-price">₹<?php echo $product['price'] ?></span>
                            </div>
                            <div class="product-features product-features2">
                                <div class="hot-tag product-tag">HOT</div>
                            </div>
                        </div>
                        <div class="product-bottom-action">
                            <button  class="addto-cart"><i class="fal fa-shopping-bag mr--5"></i> Add To
                                Cart</butotn>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>
        </div>
    </div>
    <!--================= Product Category Section End Here =================-->

    <!--================= Footer Start Here =================-->
    <div class="footer footer-2 footer-3 footer-5">
        <div class="container">
            <div class="footer-features">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="feature-item">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/icons/footerft1.png" alt="icon"></div>
                            <div class="content">
                                <h3 class="title">Free shipping</h3>
                                <p>Free shipping on orders over ₹65.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="feature-item">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/icons/footerft2.png" alt="icon"></div>
                            <div class="content">
                                <h3 class="title">Free Returns</h3>
                                <p>30-days free return policy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="feature-item">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/icons/footerft3.png" alt="icon"></div>
                            <div class="content">
                                <h3 class="title">Secured Payments</h3>
                                <p>We accept all major credit cards</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="feature-item last-child">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/icons/footerft4.png" alt="icon"></div>
                            <div class="content">
                                <h3 class="title">Customer Service</h3>
                                <p>Top notch customer setvice</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-inner">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 box-widget-col">
                        <div class="footer-widget footer-box-widget">
                            <div class="footer-logo"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/logo2.svg" alt="footer-logo"></div>
                            <p>Solid is the information & experience
                                directed at an end-user</p>
                            <div class="quick-contact">
                                <div class="phone contact-item">
                                    <div class="icon"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/icons/24clock3.png" alt="chat-icon">
                                    </div>
                                    <div class="contact-info">
                                        <a href="javascript:void(0)" class="service-time info"><?php echo $this->config->item('company_mobile') ?></a>
                                        <span class="title">Mon - Fri: 9:00-20:00</span>
                                    </div>
                                </div>
                                <div class="email contact-item">
                                    <div class="icon"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/icons/mail3.png" alt="phone-icon">
                                    </div>
                                    <div class="contact-info">
                                        <a href="mailto:<?php echo $this->config->item('company_email'); ?>"
                                            class="email-address info"><?php echo $this->config->item('company_email'); ?></a>
                                        <span class="title">Get Support</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="social-links-footer2 social-links-footer3">
                                <li><a class="platform fb"  href="javascript:void(0)"><i
                                            class="fab fa-facebook"></i></a>
                                </li>
                                <li><a class="platform yt"  href="javascript:void(0)"><i
                                            class="fab fa-youtube"></i></a>
                                </li>
                                <li><a class="platform ttr"  href="javascript:void(0)"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                                <li><a class="platform lkd"  href="javascript:void(0)"><i
                                            class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title title-2">About Us</h3>
                            <p class="widget-text">Elegant pink origami design three type
                                of dimensional view and decoration co
                                Great for adding a decorative touch to
                                any room’s decor.</p>
                            <a href="javascript:void(0)" class="getin-touch">Get In Touch <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-13 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title title-2">Information</h3>
                            <ul class="widget-items cata-widget">
                                <li class="widget-list-item"><a href="javascript:void(0)">Custom Service</a></li>
                                <li class="widget-list-item"><a href="javascript:void(0)">FAQs</a></li>
                                <li class="widget-list-item"><a href="javascript:void(0)">Ordering Tracking</a></li>
                                <li class="widget-list-item"><a href="javascript:void(0)">Contacts</a></li>
                                <li class="widget-list-item"><a href="javascript:void(0)">Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-13 col-md-6 col-sm-6">
                        <h3 class="footer-widget-title title-2">My Account</h3>
                        <ul class="footer-widget">
                            <li class="widget-list-item"><a href="javascript:void(0)">Delivery Infomation</a></li>
                            <li class="widget-list-item"><a href="javascript:void(0)">Privacy Policy</a></li>
                            <li class="widget-list-item"><a href="javascript:void(0)">Discount</a></li>
                            <li class="widget-list-item"><a href="javascript:void(0)">Custom Service</a></li>
                            <li class="widget-list-item"><a href="javascript:void(0)">Terms & Condition</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-25 col-md-6 col-sm-6">
                        <h3 class="footer-widget-title title-2">Get Newsletter</h3>
                        <div class="footer-widget newsletter-widget">
                            <p class="widget-text">Get 10% off your first order! Hurry up</p>
                            <div class="input-div">
                                <input type="email" placeholder="Enter email address">
                            </div>
                            <a href="javascript:void(0)" class="subscribe-btn">Subscribe Now <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottombar">
                    <div class="app-download">
                        <span class="download-text">Order faster with our App!</span>
                        <a href="javascript:void(0)"  class="download-store"><img
                                src="<?php echo base_url(); ?>assets/commerce/assets/images/items/appstore.jpg" alt=""></a>
                        <a href="javascript:void(0)"  class="download-store"><img
                                src="<?php echo base_url(); ?>assets/commerce/assets/images/items/playstore.jpg" alt=""></a>
                    </div>
                    <div class="payment-methods"><img src="<?php echo base_url(); ?>assets/commerce/assets/images/footer/payment2.svg" alt="payment-methods">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-bottom-inner">
                    <span class="copyright">Copyright & Design By <a href="javascript:void(0)" class="brand"
                            >Vikram Singh</a> -2025</span>
                </div>
            </div>
        </div>
    </div>
    <!--================= Footer End Here =================-->

    <?php if(!$auth_user) { ?>
    <!--================= Newsletter Popup Start Here =================-->
    <div class="rts-newsletter-popup">
        <div class="newsletter-close-btn"><i class="fal fa-times"></i></div>
        <div class="newsletter-inner">
            <h3 class="newsletter-heading">Get Weekly Newsletter</h3>
            <p>Priyoshop has brought to you the Hijab 3 Pieces Combo Pack
                PS23. It is a completely modern design</p>
            <form>
                <div class="input-area">
                    <div class="input-div"><input type="text" placeholder="Your name">
                        <div class="input-icon"><i class="far fa-user"></i></div>
                    </div>
                    <div class="input-div"><input type="email" placeholder="Email address" required>
                        <div class="input-icon"><i class="far fa-envelope"></i></div>
                    </div>
                </div>
                <button type="submit" class="subscribe-btn">Subscribe Now <i
                        class="fal fa-long-arrow-right ml--5"></i></button>
            </form>
        </div>
    </div>
    <!--================= Newsletter Popup End Here =================-->
    <?php } ?>

    <!--================= Scroll to Top Start =================-->
    <div class="scroll-top-btn scroll-top-btn1 scroll-top-btn2"><i class="fas fa-angle-up arrow-up"></i><i
            class="fas fa-circle-notch"></i></div>
    <!--================= Scroll to Top End =================-->

    <!--================= Jquery latest version =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/jquery-3.6.0.min.js"></script>
    <!--================= Bootstrap latest version =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/bootstrap.min.js"></script>
    <!--================= Wow.js =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/wow.min.js"></script>
    <!--================= Swiper Slider =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/swiper-bundle.min.js"></script>
     <!--================= Nice Select =================-->
     <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/jquery.nice-select.js"></script>
    <!--================= metisMenu Plugin =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/metisMenu.min.js"></script>
    <!--================= Main Menu Plugin =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/rtsmenu.js"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/isotope.pkgd.min.js"></script>

    <!--================= Magnefic Popup Plugin =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/jquery.magnific-popup.min.js"></script>
    
    <!--================= Main Script =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/main.js"></script>
</body>

</html>