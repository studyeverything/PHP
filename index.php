<?php
include("includes/header.php");
include("scripts/logRegister.php");
?>
<div class="wrapper">

    <!-- Page Content Holder -->
    
        <div class="container">

<div class="jumbotron" style="margin-top:10px;">

  <h2 style="text-align:center;">Electronic Record management system.</h2>
  <p style="text-align:center;">Electronic Record management system.</p>
</div>

            <div class="col-sm-7">
                <h1>Login</h1>
                <?php 
                //Display error message on authentication fail
                    if(isset($error)){
                ?>
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> <?php echo $error;?>.
                </div>
                <?php };?>
                <form class="form-horizontal" role="form" action="index.php" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">Username:</label>
                        <div class="col-sm-10">
                        <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" class="form-control" id="username" placeholder="Enter Username or  email" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" name="pwd" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>" class="form-control" id="pwd" placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="logBtn" class="btn btn-primary"><big>Login</big> <i class="fas fa-sign-in-alt fa-2x"></i> </button>
                        </div>
                    </div>
                </form>
       
        </div>
        <div class="col-sm-5">
            
            <div class="well">
                <h1>Instructions</h1>
                <ul>
                    <li>1 Enter your email address and password</li>
                    <li>2 Enter your email address and password</li>
                    <li>3 Enter your email address and password</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>