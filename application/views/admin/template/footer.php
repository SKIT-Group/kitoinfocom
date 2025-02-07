
<!-- Footer Section Start -->
<footer class="section-t-space">
    <div class="container-fluid-lg">

        <div class="main-footer section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="{{ url('dashboard') }}">
                                <img src="<?php echo base_url("assets/img/logo")?>" class="blur-up lazyload"
                                    alt="">
                            </a>
                        </div>

                        <div class="footer-logo-contain">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae soluta, eveniet.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-4 col-sm-6"></div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Contact Us</h4>
                    </div>

                    <div class="footer-contact">
                        <ul>

                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Email Address :</h6>
                                        <h5><a href="mailto:{{config('my_config.company_email')}}"><?php echo $this->config->item('company_email'); ?></a></h5>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©<?php echo $this->config->item('company_name'); ?> All rights reserved</h6>
            </div>
        </div>

    </div>
</footer>
<!-- Footer Section End -->


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


<script>
    //for tooltip

    document.addEventListener('DOMContentLoaded',()=>{
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach(tooltip => {
          new bootstrap.Tooltip(tooltip)
        })
    })

</script>


<!-- latest jquery-->
<script src="<?php echo base_url('assets/panel') ?>/js/jquery-3.6.0.min.js"></script>

<!-- toastre js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- jquery ui-->
<script src="<?php echo base_url('assets/panel') ?>/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="<?php echo base_url('assets/panel') ?>/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/panel') ?>/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url('assets/panel') ?>/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="<?php echo base_url('assets/panel') ?>/js/feather/feather.min.js"></script>
<script src="<?php echo base_url('assets/panel') ?>/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="<?php echo base_url('assets/panel') ?>/js/lazysizes.min.js"></script>

<!-- Wizard js -->
<script src="<?php echo base_url('assets/panel') ?>/js/wizard.js"></script>

<!-- Slick js-->
<script src="<?php echo base_url('assets/panel') ?>/js/slick/slick.js"></script>
<script src="<?php echo base_url('assets/panel') ?>/js/slick/custom_slick.js"></script>

<!-- Quantity js -->
<script src="<?php echo base_url('assets/panel') ?>/js/quantity-2.js"></script>

<!-- Nav & tab upside js -->
<script src="<?php echo base_url('assets/panel') ?>/js/nav-tab.js"></script>

<!-- script js -->
<script src="<?php echo base_url('assets/panel') ?>/js/script.js"></script>

<!-- thme setting js -->
<script src="<?php echo base_url('assets/panel') ?>/js/theme-setting.js"></script>

</body>



</html>
