<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Product</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- User Dashboard Section Start -->
<section class="user-dashboard-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">

            <?php $this->load->view('admin/template/sidebar'); ?>

            <div class="col-xxl-9 col-lg-8">
                <div class="dashboard-right-sidebar">

                    <div class="dashboard-home">
                        <div class="title">
                            <h2>My Products</h2>
                            <span class="title-leaf"></span>
                        </div>

                        <div class="row g-4">

                            <div class="col-12">

                            <form id="product-form" class="row g-4">
                                <input type="hidden" id="product_id-inp" value="0">
                                <input type="hidden" id="action-inp" value="add">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input autofocus type="text" class="form-control" id="name-inp" placeholder="Product Name" required>
                                        <label for="name">Name</label>
                                        <h6 class="inp-error-msg" data-error-field="name"> </h6>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-floating theme-form-floating">
                                        <input type="number" class="form-control" id="stock-inp"
                                            placeholder="stock" value='0'>
                                        <label for="stock">Stock</label>
                                        <h6 class="inp-error-msg" data-error-field="stock"> </h6>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-floating theme-form-floating">
                                        <input type="number" class="form-control" id="price-inp"
                                            placeholder="price" required>
                                        <label for="price">Price</label>
                                        <h6 class="inp-error-msg" data-error-field="price"> </h6>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="file" class="form-control" id="image-inp"
                                            placeholder="image" accept="image/*">
                                        <label for="image">Image</label>
                                        <h6 class="inp-error-msg" data-error-field="image"> </h6>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <button   id="save-btn" class="btn btn-animation w-100"  type="submit">Add</button>
                                </div>
                            </form>
                              
                            </div>
                        </div>

                        <br>

                        <div class="row g-4">

                            <div class="col-12">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $key => $product) { ?>
                                        <tr>
                                            <td><?php echo $product['id'] ?></td>
                                            <td><?php echo $product['name'] ?></td>
                                            <td><?php echo $product['price'] ?></td>
                                            <td><?php echo $product['stock'] ?></td>
                                            <td>
                                                <img style="width:100px" src="<?php echo base_url('uploads/products/'.$product['img']).'?t='.time() ?>" alt="product image">
                                            </td>
                                            <td><?php echo $product['created_at'] ?></td>
                                            <td>
                                                <button class="btn" data-product-update-btn="<?php echo $product['id'] ?>" >Edit</button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- User Dashboard Section End -->

<script>
    $base_url = `<?php echo base_url(); ?>`;
    $csrf_name = `<?php echo $this->security->get_csrf_token_name(); ?>`;
    $csrf = `<?php echo $this->security->get_csrf_hash(); ?>`;
</script>

<script>

    document.getElementById('product-form').addEventListener('submit',(e)=>{
        e.preventDefault();

        let action = document.getElementById('action-inp').value;
        let url = action==='add' ? `${$base_url}product/add` : `${$base_url}product/update`;

        let image =  document.getElementById("image-inp").files[0];

        if(action ==='add' && !image){
            toastr.warning('Plz select image for product');
            return false;
        }

        let formData = new FormData();
        formData.append("name", document.getElementById("name-inp").value);
        formData.append("stock", document.getElementById("stock-inp").value);
        formData.append("price", document.getElementById("price-inp").value);
        formData.append("image",image);
        formData.append($csrf_name,$csrf);

        if(action!=='add'){
            formData.append('product_id',document.getElementById('product_id-inp').value)
        }

        // Options for the fetch request
        const options = {
        method: 'POST',
        body: formData, // Convert the data to JSON format

        };

        
        document.getElementById('save-btn').disabled=true;
        // Make the fetch request
        fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON in the response
        })
        .then(data => {
            if(data['status']){
                toastr.success(`Product ${action} Successfully`);
                setTimeout(()=>{location.reload()},1000);
            }else{
                if(data['errors']){
                    Object.keys(data['errors']).forEach(element => {
                        toastr.warning(data['errors'][element]);
                    });
                    document.getElementById('save-btn').disabled=false;
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
    const $products = <?php echo json_encode($products) ?>;

    //for update button
    document.querySelectorAll(`[data-product-update-btn]`).forEach(btn => {
        btn.addEventListener('click',(e)=>{
            const product_id = e.target.getAttribute('data-product-update-btn');
            const product = $products.find(ele=>ele['id']==product_id)
            
            document.getElementById('product_id-inp').value=product['id'];
            document.getElementById('action-inp').value='update';
            document.getElementById('name-inp').value=product['name'];
            document.getElementById('stock-inp').value=product['stock'];
            document.getElementById('price-inp').value=product['price'];
            document.getElementById('save-btn').innerHTML="Update"

        })
    });
</script>