<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vikram Singh">
    <meta name="keywords" content="Vikram Singh">
    <meta name="author" content="Vikram Singh">
    <link rel="icon" href="<?php echo base_url("assets/img/favicon")?>" type="image/x-icon">
    <title>Login</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">

    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/css/vendors/bootstrap.css')?>">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/css/vendors/font-awesome.css')?>">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/css/vendors/feather-icon.css')?>">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="<?php echo base_url('assets/panel/css/style.css')?>">

    <!-- toastre -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        #toast-container {
        z-index: 10000000000000000000; /* Set a high value to ensure it appears above other elements */
        }
    </style>

</head>

<body>

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Login</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="<?php echo base_url('assets/panel/images/inner-page/log-in.png')?>" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To <?php echo $this->config->item('company_name'); ?></h3>
                            <h4>Login Into Your Account</h4>
                        </div>

                        <div class="input-box">
                            <form onsubmit='return false' class="row g-4">

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input autofocus type="email" class="form-control" id="email" placeholder="someone@example.com">
                                        <label for="email">Username/Email</label>
                                        <h6 class="inp-error-msg" data-error-field="email"> </h6>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password">
                                        <label for="password">Password</label>
                                        <h6 class="inp-error-msg" data-error-field="password"> </h6>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button   id="login-btn" class="btn btn-animation w-100"  type="submit">Login</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Create New account?</h4>
                            <a  tabindex="-1" href="{{ url('register') }}">Sign Up</a>
                            <a  tabindex="-1" href="{{ url('forgot_password') }}">Forgot Password ?</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    
   
    <!-- log in section end -->

    <!-- Tap to top start -->
    <div class="theme-option">

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->
   
<script>
    $base_url = `<?php echo base_url(); ?>`;
    $csrf_name = `<?php echo $this->security->get_csrf_token_name(); ?>`;
    $csrf = `<?php echo $this->security->get_csrf_hash(); ?>`;
</script>

<script>
        // for submit form
        document.getElementById('login-btn').addEventListener('click',()=>{
            document.getElementById('login-btn').disabled=true;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            

            let form_data = {
                email:email,
                password:password,
                [$csrf_name]:$csrf
            };

            // Options for the fetch request
            const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Specify content type as JSON
                // Add any other headers if needed
            },

            body: JSON.stringify(form_data), // Convert the data to JSON format

            };

            // Make the fetch request
            fetch(`${$base_url}login`, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON in the response
            })
            .then(data => {
                if(data['status']){
                    toastr.success('Login Successfully');
                    setTimeout(()=>{location.href=`${$base_url}dashboard`},1000);
                }else{
                    if(data['errors']){
                        Object.keys(data['errors']).forEach(element => {
                            toastr.warning(data['errors'][element]);
                        });
                        document.getElementById('login-btn').disabled=false;
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

    <!-- latest jquery-->
    <script src="<?php echo base_url('assets/panel/js/jquery-3.6.0.min.js')?>"></script>

        <!-- toastre js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Bootstrap js-->
    <script src="<?php echo base_url('assets/panel/js/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('assets/panel/js/bootstrap/popper.min.js')?>"></script>

    <!-- feather icon js-->
    <script src="<?php echo base_url('assets/panel/js/feather/feather.min.js')?>"></script>
    <script src="<?php echo base_url('assets/panel/js/feather/feather-icon.js')?>"></script>

    <!-- Slick js-->
    <script src="<?php echo base_url('assets/panel/js/slick/slick.js')?>"></script>
    <script src="<?php echo base_url('assets/panel/js/slick/slick-animation.min.js')?>"></script>
    <script src="<?php echo base_url('assets/panel/js/slick/custom_slick.js')?>"></script>

    <!-- Lazyload Js -->
    <script src="<?php echo base_url('assets/panel/js/lazysizes.min.js')?>"></script>

    <!-- script js -->
    <script src="<?php echo base_url('assets/panel/js/script.js')?>"></script>

</body>

</html>