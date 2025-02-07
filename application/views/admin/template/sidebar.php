 <!-- /////////////sidebar space start -->

 <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">

                        <ul data-sidebar-list class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a id="sidebar-dashboard-link" href="<?php echo base_url('dashboard') ?>" class="nav-link"
                                    >
                                    <i data-feather="home"></i> DashBoard
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a id="sidebar-product-link" href="<?php echo base_url('product') ?>" class="nav-link"
                                    >
                                    <i data-feather="package"></i>Product
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>


                <!-- /////////////sidebar space end -->

                

    <script>
        //sidebar link active
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll(`[data-sidebar-list]>li a`).forEach(element => {
                if(element.href===location.href){
                    element.classList.toggle('active');
                }
            });
        })
    </script>