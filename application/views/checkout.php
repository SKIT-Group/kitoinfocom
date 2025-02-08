<?php $this->load->view('customer_template/header'); ?>

    <div class="anywere"></div>

    <!--================= Header Section Start Here =================-->
    <header id="rtsHeader">
        
        <div class="navbar-sticky">
            <div class="container">
                <div class="navbar-part navbar-part1">
                    <div class="navbar-inner" style="justify-content: flex-end;">
                        
                       
                        
                        <div class="header-action-items header-action-items1">
                            
                            <a href="<?php echo base_url('logout'); ?>" class="account">Logout</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="page-path">
            <div class="container">
                <div class="breadcrumbs-inner">
                    <h1 class="path-title">Checkout</h1>
                    <ul>
                        <li><a class="home-page-link" href="<?php echo base_url('/'); ?>">Home <i class="fal fa-angle-right"></i></a></li>
                        <li><a class="current-page" href="javascript:void(0)">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--================= Header Section End Here =================-->


    <div class="rts-checkout-section">
        <div class="container">
            <h3 style="margin-bottom:10px">Fill address Form</h3>
            <div class="row justify-content-between">
                <div class="col-xl-8">
                    <form id="address-form" class="checkout-form">
                        <div class="row">

                            <div class="col-xl-6  col-md-6">
                                <div class="input-div"><input id="name-inp" type="text" placeholder="Name**" required></div>
                            </div>

                            <div class="col-xl-6  col-md-6">
                                <div class="input-div"><input id="phone-inp" type="text" placeholder="Phone no**" required></div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="input-div"><input id="state-inp" type="text" placeholder="State**" required></div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="input-div"><input id="city-inp" type="text" placeholder="Town/City**" required></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="input-div"><input id="street-inp" type="text" placeholder="Street Address**" required></div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="input-div"><input id="apartment-inp" type="text"
                                        placeholder="Appartments, suit, unit, etc (Optional)"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="input-div"><input type="text" id="zipcode-inp" placeholder="Zip Code**" required></div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="input-div">
                                    <select  id="address-type-inp" required>
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-2 col-md-2">
                                <div class="input-div">
                                    <?php echo $captcha['image']; ?>
                                </div>
                            </div>
                            <div class="col-xl-10 col-md-10">
                                <div class="input-div">
                                  <input type="text" placeholder="Captha**" id="captcha-inp" required>
                                </div>
                            </div>
                        </div>
                        
                        <textarea id="ordernote-inp" cols="80" rows="4" placeholder="Order notes (optional)"></textarea>
                    </form>
                </div>
                <div class="col-xl-4">
                    <div class="action-item">
                        <div class="action-top">
                            <span class="action-title">Product</span>
                            <span class="subtotal">Subtotal</span>
                        </div>

                        <?php $total_amount=0; ?>
                        <?php foreach ($cart_products as $key => $value) { ?>
                            <?php $total_amount+=$value['product_price'] * $value['qty']; ?>

                            <div class="category-item">
                                <div class="category-item-inner">
                                    <div class="category-title-area">
                                        <span class="category-title"><?php echo $value['product_name'] ?> × <?php echo $value['qty'] ?></span>
                                    </div>
                                    <div class="price">₹<?php echo $value['qty']*$value['product_price']; ?></div>
                                </div>
                            </div>

                        <?php } ?>
                        
                        <div class="action-bottom">
                            <span class="total">Total</span>
                            <span class="total-price">₹<?php echo $total_amount; ?></span>
                        </div>
                    </div>

                    <div class="action-item m-0">
                        <div class="payment-options checkout-options">
                        
                                <div class="form-group last-child">
                                    <input checked disabled type="checkbox" id="paypl">
                                    <label  class="check-title" for="paypl">PayPal</label>
                                </div>
                            
                        </div>
                    </div>
                    <button id="pay-now-btn" form="address-form" class="place-order-btn">Place Order</button>
                </div>
            </div>
        </div>
    </div>


    <!--================= Footer Start Here =================-->
    <?php $this->load->view('customer_template/footer'); ?>
    <!--================= Footer End Here =================-->




    <!--================= Scroll to Top Start =================-->
    <div class="scroll-top-btn scroll-top-btn1"><i class="fas fa-angle-up arrow-up"></i><i
            class="fas fa-circle-notch"></i></div>
    <!--================= Scroll to Top End =================-->

    <script>
        $base_url = `<?php echo base_url(); ?>`;
        $csrf_name = `<?php echo $this->security->get_csrf_token_name(); ?>`;
        $csrf = `<?php echo $this->security->get_csrf_hash(); ?>`;
    </script>

    <script>
        //pay now

        document.getElementById('address-form').addEventListener('submit',(e)=>{
            e.preventDefault();

            let formData = new FormData();
            formData.append("name", document.getElementById("name-inp").value);
            formData.append("mobile", document.getElementById("phone-inp").value);
            formData.append("state", document.getElementById("state-inp").value);
            formData.append("city",document.getElementById("city-inp").value);
            formData.append("street",document.getElementById("street-inp").value);
            formData.append("apartment",document.getElementById("apartment-inp").value);
            formData.append("zipcode",document.getElementById("zipcode-inp").value);
            formData.append("captcha",document.getElementById("captcha-inp").value);
            formData.append("address_type",document.getElementById("address-type-inp").value);
            formData.append("order_note",document.getElementById("ordernote-inp").value);
            formData.append($csrf_name,$csrf);

            // Options for the fetch request
            const options = {
            method: 'POST',
            body: formData, // Convert the data to JSON format

            };

            
            // document.getElementById('pay-now-btn').disabled=true;
            
            // Make the fetch request

            fetch(`${$base_url}checkout/pay`, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON in the response
            })
            .then(data => {
                if(data['status']){
                    toastr.success(`Pay the amount`);
                }else{
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



        })

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
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/jquery-3.6.0.min.js"></script>

    
        <!-- toastre js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--================= Bootstrap latest version =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/bootstrap.min.js"></script>
    <!--================= Wow.js =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/wow.min.js"></script>
    <!--================= Swiper Slider =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/swiper-bundle.min.js"></script>
     <!--================= Nice Select =================-->
     <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/jquery.nice-select.js"></script>
    <!--================= Swiper Slider =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/zoom.js"></script>
    <!--================= metisMenu Plugin =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/metisMenu.min.js"></script>
    <!--================= Main Menu Plugin =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/rtsmenu.js"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/isotope.pkgd.min.js"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <!--================= Main Script =================-->
    <script src="<?php echo base_url('assets/commerce/') ?>assets/js/main.js"></script>
</body>


<!-- Mirrored from reactheme.com/products/html/weiboo/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2025 17:28:25 GMT -->
</html>