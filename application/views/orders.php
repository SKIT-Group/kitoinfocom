<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <a href="<?php echo base_url('/') ?>">Back to Shop</a>
    <h2>Orders</h2>

    <table>
        <thead>
            <th>Order Id</th>
            <th>Total Amount</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>Place On</th>
        </thead>
        <tbody>
            <?php foreach ($orders as $key => $order) {?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['total_amount']; ?></td>
                <td><?php echo $order['payment_method']; ?></td>
                <td>
                    <?php echo $order['payment_status']; ?>
                    <?php if($order['payment_status']!='complete'){?>
                        <button data-payment-verify="<?php echo $order['id']; ?>" >Re-verify</button>
                    <?php } ?>
                </td>
                <td><?php echo $order['status']; ?></td>
                <td><?php echo $order['created_at']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>

<script>
    $base_url = '<?php echo base_url(); ?>'
</script>

<script>
    document.querySelectorAll(`[data-payment-verify]`).forEach(element => {
        element.addEventListener('click',(e)=>{
            const order = e.target.getAttribute('data-payment-verify');
            
            fetch(`${$base_url}order/payment/re_verify/${order}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON in the response
            })
            .then(data => {
                if(data['status']){
                    setTimeout(()=>{location.reload()},1000);
                }else{
                    alert(data['msg']);
                }
            })
            .catch(error => {
                // Handle errors
                setTimeout(()=>{location.reload()},1000);
            });


        });
    });
</script>
