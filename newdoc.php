<?php
include("scripts/getuser.php");
include("includes/header.php");
include("scripts/newdoc.php");
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
       <h3> New Document Entry</h3>
       <?php 
          //Display error message on authenthication fail
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
       <form class="form-horizontal" role="form" action="newdoc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title : </label>
            <div class="col-sm-6">
                <input type="text" name="title" class="form-control " id="title" placeholder="Enter Title">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description :</label>
            <div class="col-sm-6">
                 <textarea class="form-control" name="description"  placeholder="Description text"></textarea>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="subject">Subject:</label>
            <div class="col-sm-6">
            <input type="text" name="subject" class="form-control " id="subject" placeholder="Enter Subject">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="file">Document Copy :</label>
            <div class="col-sm-6">
                <input type="file" name="upload[]" multiple="multiple"  class="form-control-file" required />
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
            <div class="col-sm-6" style="color:#111999;"><i class="fa fa-info"></i>: Only allowable formats <b>".jpeg",".jpg",".png",".pdf",".docx", ".xlsm"</b></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="preview">upload Preview:</label>
            <div class="col-sm-6" id="preview" style="border:1px solid #111999; padding:20px;">
               <big>Loading Preview... </big> <i class="fa fa-spinner fa-spin fa-2x"></i>
            </div>
           
        </div>
       
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="uploadBtn" class="btn btn-primary">Upload</button>
            </div>
        </div>
        </form>     
    </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
