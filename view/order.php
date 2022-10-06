<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= $_SESSION['base_url']?>/assets/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c602623315.js" crossorigin="anonymous"></script>
    <script src="<?= $_SESSION['base_url']?>/assets/script.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>


<div class="container">
    <div class="row pt-1 pb-1">
        <div class="col-lg-12">
            <h4 class="text-center">Delivery App</h4>
            <h6 class="text-center">Search for your Retailer</h6>
            <h6  class="text-center"><a  href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=logout"><span class="fa fa-sign-out-alt"></span> Logout</a></h6>
            
            <h6  class="text-center"><a  href="<?= $_SESSION['base_url'] ?>index.php?controller=order&function=showUserOrders"><span class="fa fa-eye"></span> Show Orders</a></h6>
             
       </div>
     
    </div>
</div>


<section class="container">
<h1 class="text-center">Orders</h1>
 <div class="row">
 <div class="col-md-12">
    <table class="table">
    <thead>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>pickupNotes</th>
        <th>status</th>
        <th>rating</th>
        <th>action</th>
        <!-- <th>Actions</th> -->
    </thead>
    <tbody>
        <?php foreach($orders as $res){ ?>
        <tr>
            <td><?= $res['id'] ?></td>
            <td><?= $res['customer_id'] ?></td>
            <td><?= $res['pickup_notes'] ?></td>
            <td><?= $res['status'] ?></td>
            <td><?php for($i = $res['rating'];$i > 0; $i--){
                    echo "<span class='fa fa-star checked' ></span>";
                    
            } if($res['rating'] == 0){
                echo "pending";
            }?></td>
            <td >
                <?php if($res['status'] == 'delivered'){ echo "Already Deliverd";}else{?>
                <a class="btn btn-sm btn-success" href="<?= $_SESSION['base_url'] ?>index.php?controller=order&function=updateStatus&id=<?= $res['id'] ?>&status=delivered">Delivered</a></td>
                <?php } ?>

        </tr>
        <?php }?>
    </tbody>
    </table>
 </div>
 </div>
</section>


<section class="container">
<h1 class="text-center">Orders Details</h1>
 <div class="row">
 <div class="col-md-12">
    <table class="table">
    <thead>
        <th>Order Detail ID</th>
        <th>Order ID</th>
        <th>retailer id</th>
        <th>Retailer Order Id</th>
        <th>Pickup data</th>
        <th>status</th>
        <th>DateTime</th>
        <!-- <th>Actions</th> -->
    </thead>
    <tbody>
        <?php foreach($orderDetails as $arr){
             foreach($arr as $res){
             ?>

        <tr>
            <td><?= $res['id'] ?></td>
            <td><?= $res['pickup_order_id'] ?></td>
            <td><?= $res['retailer_id'] ?></td>
            <td><?= $res['retailer_order_id'] ?></td>
            <td><?= $res['pickup_data'] ?></td>
            <td><?= $res['status'] ?></td>
            <td><?= date('Y-m-d h:i',$res['pickup_datetime']) ?></td>
            
        </tr>
        <?php }}?>
    </tbody>
    </table>
 </div>
 </div>
</section>

</body>
</html>