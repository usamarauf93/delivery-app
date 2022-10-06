
<div class="login-form">
    <form action="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=postRegister" method="post">

        <h2 class="text-center">Register</h2>  
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
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit"  class="btn btn-primary btn-block">Register in</button>
        </div>
              
    </form>
    <p class="text-center"><a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=showLogin">Already Register? Login Here</a></p>
</div>
