<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Devlivery App</title>

  <!-- Bootstrap core CSS -->

  <!-- Custom styles for this template -->
  <link href="<?= $_SESSION['base_url']?>/assets/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?= $_SESSION['base_url'] ?>index.php?controller=admin" class="list-group-item list-group-item-action bg-light">Retailer</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> 
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#retailerAddModal">Add Retailer</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li><a href="<?= $_SESSION['base_url'] ?>index.php?controller=admin&function=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
           
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
      <section class="container">
<h1 class="text-center">Retailers</h1>
<?php 	if(isset($_SESSION['error'])){ ?>

<div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']?>
            <?php unset($_SESSION['error']); ?>
        </div>   
<?php } 
if( isset($_GET['function']) && $_GET['function'] == 'editRetailer'){ ?>

<form action="<?= $_SESSION['base_url'] ?>index.php?controller=admin&function=updateRetailer" method="post">


    <?php 	if(isset($_SESSION['error'])){ ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error']?>
        <?php unset($_SESSION['error']); ?>
    </div>
    <?php }?>
        <input type="hidden" name="id" value="<?= $singleRet['id']?>">
    <div class="form-group">
        <input type="text" class="form-control" name="name" value="<?= $singleRet['name']?>" placeholder="Name" required="required">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" value="<?= $singleRet['email']?>" placeholder="Email" required="required">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="address" value="<?= $singleRet['address']?>" placeholder="Address" required="required">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="contact" value="<?= $singleRet['contact']?>" placeholder="Contact" required="required">
    </div>
    <input type="submit" class="btn btn-primary" value="Update">
</form>


<?php }else{
?>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach($ret as $res){ ?>
                <tr>
                    <td><?= $res['name'] ?></td>
                    <td><?= $res['email'] ?></td>
                    <td><?= $res['contact'] ?></td>
                    <td><?= $res['address'] ?></td>
                    <td><a class="btn btn-sm btn-info" href="<?= $_SESSION['base_url'] ?>index.php?controller=admin&function=editRetailer&id=<?=$res['id']?>">Edit</a> 
                    <a class="btn btn-sm btn-danger" href="<?= $_SESSION['base_url'] ?>index.php?controller=admin&function=deleteRetailer&id=<?=$res['id']?>">Delete</a></td>
                </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</section>
                <?php } ?>
</div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<!-- Modal -->
<div class="modal fade" id="retailerAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Retailer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= $_SESSION['base_url'] ?>index.php?controller=admin&function=saveRetailer" method="post">

        <div class="modal-body">

            <?php 	if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']?>
                <?php unset($_SESSION['error']); ?>
            </div>
            <?php }?>

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="contact" placeholder="Contact" required="required">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>

    </div>
  </div>
</div>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
