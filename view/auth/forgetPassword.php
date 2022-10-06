
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
        <h2 class="text-center">Reset Password</h2>       
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
       
        <div class="form-group">
            <button type="submit"  class="btn btn-primary btn-block">Send Reset Link</button>
        </div>
            
    </form>
    <p class="text-center"><a href="<?= $_SESSION['base_url'] ?>index.php?controller=auth&function=showLogin"> Login Here</a></p>    
</div>
