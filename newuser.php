<?php
include("scripts/getuser.php");
include("includes/header.php");
include("scripts/logRegister.php");
?>
<div class="wrapper">
<?php
include("includes/sidebar.php");
?>

    <!-- Page Content Holder -->
    <div id="content">
        
    <?php
    include("includes/navbar.php");
    ?>
        
    <div class="col-sm-12">
       <h3> register New user</h3>
       <?php 
          //Display error message on authentication fail
         if(isset($error)){
                ?>
           <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong><i class="fa fa-ban fa-2x"></i> <big> Error!</strong> <?php echo $error;?>.</big>
         </div>
         <?php 
         };
         // success message
         if(isset($success)){?>
           <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong><i class="fa fa-check fa-2x"></i> <big> Success!</strong> <?php echo $success;?>.</big>
         </div>
         <?php };?>
       <form class="form-horizontal" role="form" action="newuser.php" method="post">
        <div class="form-group">
        <label class="control-label col-sm-2" >Select User Type</label>
            <div class="col-sm-6">
            <select class="form-control" name="userType" required>
                    <option selected disabled>Select User Type</option>
                    <option>User</option>
                    <option>Adminstrator</option>
                  </select>
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="firstName">First Name:</label>
            <div class="col-sm-6">
                <input type="text" name="firstName" class="form-control " id="firstName" placeholder="Enter First Name">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lastName">Last Name:</label>
            <div class="col-sm-6">
                <input type="text" name="lastName" class="form-control " id="lastName" placeholder="Enter Last Name">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">username:</label>
            <div class="col-sm-6">
            <input type="text" name="username" class="form-control " id="username" placeholder="Enter username">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-6">
            <input type="email" name="email" class="form-control " id="email" placeholder="Enter email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-6">
            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd2">Comfirm Password:</label>
            <div class="col-sm-6">
            <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Comfirm password">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="regBtn" class="btn btn-primary">Register</button>
            </div>
        </div>
        </form>     
    </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>