<?php $this->load->view('customer_template/header');?>

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
                                            class="wishlist-dot icon-dot"><?php echo $cart_product_qty ?></span></div>
                                </div>
                            </div>
                            <?php if(!$auth_user){?> 
                            <a href="<?php echo base_url('login') ?>" class="account">Login</a>
                            <?php } ?>

                            <?php if($auth_user){?> 
                            <a href="<?php echo base_url('logout') ?>" class="account">Logout</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart-bar">
            <div class="cart-header">
                <h3 class="cart-heading">MY CART (<?php echo $cart_product_qty ?> ITEMS)</h3>
                <div class="close-cart"><i class="fal fa-times"></i></div>
            </div>
            <div class="product-area">
            <!-- (last-child) you can also use this class for last product-item -->

            <?php $total_cart_value=0; ?>
            <?php foreach ($cart_products as $key => $cart_product) { ?>
                <?php
                    $qty=0;
                    if($cart_product['qty']<=$cart_product['product_stock'] && $cart_product['product_stock']>0){
                        $qty = $cart_product['qty'];
                    }elseif($cart_product['qty']>$cart_product['product_stock'] && $cart_product['product_stock']!=0){
                        $qty = $cart_product['product_stock'];
                    }
                    $total_cart_value+=$qty*$cart_product['product_price'];
                ?>
                <div class="product-item">
                    <div class="product-detail">
                        <div class="product-thumb"><img src="<?php echo base_url('uploads/products/'.$cart_product['product_img']); ?>" alt="product-thumb"></div>
                        <div class="item-wrapper">
                            <span class="product-name"><?php echo $cart_product['product_name'] ?></span>
                            <!-- <div class="item-wrapper">
                                <span class="product-variation"><span class="color">Green /</span>
                                    <span class="size">XL</span></span>
                            </div> -->
                            <div class="item-wrapper">
                                <span class="product-qnty"><?php echo $qty; ?> ×</span>
                                <span class="product-price">₹<?php echo $cart_product['product_price'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-edit">
                        <?php if($cart_product['product_stock']==0){?>
                            <div>
                                <h6 style="color:red">Out Of Stock</h6>
                            </div>
                        <?php }elseif($cart_product['qty']<=$cart_product['product_stock']){ ?>
                            <div class="quantity-edit">
                                <button class="button"><i class="fal fa-minus minus"></i></button>
                                <input data-cart-update-inp="<?php echo $cart_product['product']; ?>" type="text" class="input" value="<?php echo $qty; ?>" />
                                <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                            </div>
                            <?php }else{ ?>
                                <div class="quantity-edit">
                                    <button class="button"><i class="fal fa-minus minus"></i></button>
                                    <input data-cart-update-inp="<?php echo $cart_product['product']; ?>" type="text" class="input" value="<?php echo $qty; ?>" />
                                    <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                                </div>
                        <?php } ?>
                        <div class="item-wrapper d-flex mr--5 align-items-center">
                            <button data-cart-remove-btn="<?php echo $cart_product['product']; ?>" class="delete-cart" style="color:red">Remove</button>
                        </div>
                    </div>
                </div>

            <?php } ?>

            </div>
            <div class="cart-bottom-area">
                <span class="spend-shipping"><i class="fal fa-truck"></i> SPENT <span class="amount">₹199.00</span> MORE
                    FOR FREE SHIPPING</span>
                <span class="total-price">TOTAL: <span class="price">₹<?php echo $total_cart_value; ?></span></span>
                <button id="checkout-btn" class="checkout-btn cart-btn">PROCEED TO CHECKOUT</button>
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
                            <button data-add-cart-btn="<?php echo $product['id']; ?>"  class="addto-cart"><i class="fal fa-shopping-bag mr--5"></i> Add To
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
    <?php $this->load->view('customer_template/footer') ?>
    <!--================= Footer End Here =================-->

    <?php if(!$auth_user) { ?>
    <!--================= Newsletter Popup Start Here =================-->
    <div class="rts-newsletter-popup">
        <div class="newsletter-close-btn"><i class="fal fa-times"></i></div>
        <div class="newsletter-inner">
            <h3 class="newsletter-heading">Creat Account</h3>
            <p>Connect with us and get discount on your daily shopings.</p>
            <form id="signup-form">
                <div class="input-area">
                    <div class="input-div"><input id="name-inp" type="text" placeholder="Your name" required>
                        <div class="input-icon"><i class="far fa-user"></i></div>
                    </div>
                    <div class="input-div"><input  id="email-inp" type="email" placeholder="Email address" required>
                        <div class="input-icon"><i class="far fa-envelope"></i></div>
                    </div>
                    <div class="input-div"><input  id="password-inp" type="password" placeholder="Password" required>
                        <div class="input-icon"><i class="far fa-envelope"></i></div>
                    </div>
                    <div class="input-div"><input  id="confirm_password-inp" type="password" placeholder="Confirm Password" required>
                        <div class="input-icon"><i class="far fa-envelope"></i></div>
                    </div>
                </div>
                <button type="submit" id="signup-btn" class="subscribe-btn">Sign Up <i
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

    <script>
        $base_url=`<?php echo base_url(); ?>`;
        $csrf_name = `<?php echo $this->security->get_csrf_token_name(); ?>`;
        $csrf = `<?php echo $this->security->get_csrf_hash(); ?>`;
    </script>

    <script>
        //for add to cart

        document.querySelectorAll(`[data-add-cart-btn]`).forEach(element => {
            element.addEventListener('click',(e)=>{
                const btn = e.target;
                const product = btn.getAttribute('data-add-cart-btn');
                btn.disabled=true;

                fetch(`${$base_url}cart/add/${product}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON in the response
            })
            .then(data => {
                if(data['status']){
                    toastr.success('cart Successfully');
                    setTimeout(()=>{location.reload()},1000);
                }else{
                    if(data['errors']){
                        Object.keys(data['errors']).forEach(element => {
                            toastr.warning(data['errors'][element]);
                        });
                        btn.disabled=false;
                    }else{
                        throw new Error('frontend validation not work');
                    }
                }
            })
            .catch(error => {
                // Handle errors
                toastr.error("Something Went Wrong! Plz try sometime latter.");
                setTimeout(()=>{location.reload()},1000);
            });

            });
        });

    </script>

    <script>
        //for remove to cart

        document.querySelectorAll(`[data-cart-remove-btn]`).forEach(element => {
            element.addEventListener('click',(e)=>{
                const btn = e.target;
                const product = btn.getAttribute('data-cart-remove-btn');
                btn.disabled=true;

                fetch(`${$base_url}cart/remove/${product}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON in the response
            })
            .then(data => {
                if(data['status']){
                    toastr.success('cart remove Successfully');
                    setTimeout(()=>{location.reload()},1000);
                }else{
                    if(data['errors']){
                        Object.keys(data['errors']).forEach(element => {
                            toastr.warning(data['errors'][element]);
                        });
                        btn.disabled=false;
                    }else{
                        throw new Error('frontend validation not work');
                    }
                }
            })
            .catch(error => {
                // Handle errors
                toastr.error("Something Went Wrong! Plz try sometime latter.");
                setTimeout(()=>{location.reload()},1000);
            });

            });
        });

    </script>

    <script>
        //for udpate cart

        document.querySelectorAll(`[data-cart-update-inp]`).forEach(element => {
          
            element.addEventListener('change',(e)=>{
                const inp = e.target;
                const product = inp.getAttribute('data-cart-update-inp');
                const qty = inp.value;

                fetch(`${$base_url}cart/update/${product}/${qty}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON in the response
            })
            .then(data => {
                if(data['status']){
                    inp.defaultValue = qty;
                    toastr.success('cart update Successfully');
                }else{
                    inp.value = inp.defaultValue;
                    if(data['errors']){
                        Object.keys(data['errors']).forEach(element => {
                            toastr.warning(data['errors'][element]);
                        });
                    }else{
                        throw new Error('frontend validation not work');
                    }
                }
            })
            .catch(error => {
                // Handle errors
                toastr.error("Something Went Wrong! Plz try sometime latter.");
                // setTimeout(()=>{location.reload()},1000);
            });

            });
        });

    </script>

<?php if(!$auth_user){ ?>

    <script>
        //for signup

        document.getElementById('signup-form').addEventListener('submit',(e)=>{
        e.preventDefault();

        let formData = new FormData();
        formData.append("name", document.getElementById("name-inp").value);
        formData.append("email", document.getElementById("email-inp").value);
        formData.append("password", document.getElementById("password-inp").value);
        formData.append("confirm_password", document.getElementById("confirm_password-inp").value);
        formData.append($csrf_name,$csrf);

        // Options for the fetch request
        const options = {
        method: 'POST',
        body: formData, // Convert the data to JSON format

        };

        
        document.getElementById('signup-btn').disabled=true;
        // Make the fetch request
        fetch(`${$base_url}signup`, options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON in the response
        })
        .then(data => {
            if(data['status']){
                toastr.success(`Signup Successfully`);
                setTimeout(()=>{location.reload()},1000);
            }else{
                if(data['errors']){
                    Object.keys(data['errors']).forEach(element => {
                        toastr.warning(data['errors'][element]);
                    });
                    document.getElementById('signup-btn').disabled=false;
                }else{
                    throw new Error('frontend validation not work');
                }
            }
        })
        .catch(error => {
            // Handle errors
            toastr.error("Something Went Wrong! Plz try sometime latter.");
            setTimeout(()=>{location.reload()},1000);
        });



        });

    </script>

<?php } ?>

    <script>
        //checkout btn
        const $total_cart_product = <?php echo sizeof($cart_products); ?>;

        const $user_logged = <?php echo $auth_user ? 1 : 0 ; ?>;
        document.getElementById('checkout-btn').addEventListener('click',(e)=>{

            if($total_cart_product<1){
                toastr.warning('Plz add some product in cart for checkout');
                return false;
            }

            if($user_logged){
                location.href=`${$base_url}checkout`;
            }else{
                toastr.warning('creat account first for checkout');
                document.querySelector(".anywere-home").classList.add("bgshow");
                document.querySelector(".rts-newsletter-popup").classList.add("popup");
            }
        });

    </script>

<script>
    // for toaster
    
    window.addEventListener("load", function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
</script>

    <!--================= Jquery latest version =================-->
    <script src="<?php echo base_url(); ?>assets/commerce/assets/js/vendors/jquery-3.6.0.min.js"></script>

    
        <!-- toastre js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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