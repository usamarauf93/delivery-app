
<div class="login-form">
    <form action="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=postLogin" method="post">
        <h2 class="text-center">Log in</h2>    
        <?php 	if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']?>
            <?php unset($_SESSION['error']); ?>
        </div>   
        <?php }?>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=showForgetPassword" class="float-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=showRegister">Create an Account</a></p>
</div>
