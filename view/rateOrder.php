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
            <h6 class="text-center">Rate Retailer </h6>
            <h6  class="text-center"><a  href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=logout"><span class="fa fa-sign-out-alt"></span> Logout</a></h6>
            
            <h6  class="text-center"><a  href="<?= $_SESSION['base_url'] ?>index.php?controller=order&function=showUserOrders"><span class="fa fa-eye"></span> Show Orders</a></h6>
             
       </div>
     
    </div>
</div>


<section class="container">
    <h1 class="text-center">Rating</h1>
    <br>
    <br>
    <form id="ratingForm" class="text-center" method="post" action="<?= $_SESSION['base_url']?>index.php?controller=order&function=saveRating">
    
        <input type="hidden" id='rating' name="rating">
        <input type="hidden" value="<?= $order_id?>" name="order_id">
        <span class="fa fa-star " data-rate="1"></span>
        <span class="fa fa-star " data-rate="2"></span>
        <span class="fa fa-star " data-rate="3"></span>
        <span class="fa fa-star" data-rate="4"></span>
        <span class="fa fa-star" data-rate="5"></span>
    
    </form>

</section>

</body>
</html>