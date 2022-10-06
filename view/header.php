<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Project</title>
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/3.3/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= $_SESSION['base_url'] ?>index.php">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= $_SESSION['base_url'] ?>index.php">Home</a></li>
            <li><a href="<?= $_SESSION['base_url'] ?>index.php?function=about">About</a></li>
            <li><a href="<?= $_SESSION['base_url'] ?>index.php?function=contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php 	if(!isset($_SESSION['is_user_login']) ){ ?>
              <li><a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=showRegister"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=showLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php 
            }else{ 
              if( $_SESSION['is_user_login']){?>
            <li><a href="<?= $_SESSION['base_url'] ?>index.php?controller=dashboard"><span class="glyphicon glyphicon-log-in"></span> Dashboard</a></li>
            <li><a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <?php } 
          }?>
          </ul>
        </div>
      </div>
    </nav>