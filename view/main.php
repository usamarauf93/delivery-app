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
            <h6 class="text-center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <span class="fa fa-plus-circle"></span> 
                </button>
            </h6>
            <h6  class="text-center"><a  href="<?= $_SESSION['base_url'] ?>index.php?controller=order&function=showUserOrders"><span class="fa fa-eye"></span> Show Orders</a></h6>
             
       </div>
     
    </div>
</div>

<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner main-banner" >
        </div>
    </div>
</section>

<section class="search-sec">
    <div class="container">
        <form action="<?= $_SESSION['base_url'] ?>index.php?controller=dashboard&function=search" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" name="name" placeholder="Enter Name" >
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" name="location" placeholder="Enter Location" >
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" id="category" name='category'>
                                    <option>Select Category</option>
                                    <?php
                                    foreach($categories as $category){
                                        echo "<option value='".$category['id']."'>".$category['name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="submit" class="btn btn-danger wrn-btn" value="Search">
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

<?php if(isset($showTable)):?>
<section class="container">
<h1 class="text-center">Search Results</h1>
 <div class="row">
 <div class="col-md-12">
    <table class="table">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <!-- <th>Actions</th> -->
    </thead>
    <tbody>
        <?php foreach($searchRes as $res){ ?>
        <tr>
            <td><?= $res['name'] ?></td>
            <td><?= $res['email'] ?></td>
            <td><?= $res['contact'] ?></td>
            <td><?= $res['address'] ?></td>
            <!-- <td data-retailerid="<?= $res['id'] ?>" class=" addOrder" ><button class="btn btn-sm btn-success">Place Order</button></td> -->
        </tr>
        <?php }?>
    </tbody>
    </table>
 </div>
 </div>
</section>

<?php endif;?>
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h6>
              This is my University project and complete effort is for learning
            </h6>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Pickup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form id="order-detail-form">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control " id="retailer" name='retailer' required>
                        <option>Select Retailer</option>
                        <?php
                            foreach($retailers as $ret){
                                echo "<option value='".$ret['id']."'>".$ret['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="datetime-local"  class="form-control" name='datetime' id="datetime" placeholder="Date & Time" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-6">
                    <input type="text"  class="form-control" name='order_id' id="order_id" placeholder="Retailer OrderId" required>
                </div>
                <div class="col-md-6">
                    <textarea  class="form-control" name="pickup_order_data" id="pickup_order_data" placeholder="Add Order Details" cols="25" rows="1" required></textarea>
                </div>
            </div>
            <button type="button" id="btn_store_data_state" class="btn btn-info float-right" >
                        <span class="fa fa-plus-circle"></span> 
            </button>
        </form>
        <table class="table"  id="dataholder-table" style="display:none">
            <thead><th>RetailerId</th><th>DateTime</th><th>OrderId</th><th>Details</th></thead>               
            <tbody></tbody>

    
        </table>
        <textarea  class="form-control" style="display:none" name="pickup_note" id="pickup_note" placeholder="Add pickup Note" cols="25" rows="1"></textarea>
       
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_order_btn">Save</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>