<?php
include("scripts/getuser.php");
include("includes/header.php");
include("scripts/newdoc.php");

if($_REQUEST['documentId']){
    $documentId=$_REQUEST['documentId'];
    $editsql=mysqli_query($db,"SELECT * FROM documents WHERE documentId ='$documentId' ")or die(mysqli_error($db));
    $resEdit=mysqli_fetch_array($editsql);
    $uploadedfiles=unserialize($resEdit['uploads']);

}else{
    header('Location:view.php?viewMsg');
}
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
       <form class="form-horizontal" role="form" action="editdoc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title : </label>
            <div class="col-sm-6">
                <input type="text" name="title" class="form-control " value="<?php echo $resEdit['title']; ?>"id="title" placeholder="Enter Title">
                <input type="hidden" name="documentId" class="form-control " value="<?php echo $resEdit['documentId']; ?>"id="title" placeholder="Enter Title">
            </div>
            <div class="col-sm-2" style="color:#800000;"><i class="fa fa-asterisk"></i></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description :</label>
            <div class="col-sm-6">
                 <textarea class="form-control" name="description" placeholder="Description text"><?php echo $resEdit['description']; ?></textarea>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="subject">Subject:</label>
            <div class="col-sm-6">
            <input type="text" name="subject" class="form-control " value="<?php echo $resEdit['subject']; ?>"id="subject" placeholder="Enter Subject">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="preview">upload Preview:</label>
            <div class="col-sm-6" id="preview" style="border:1px solid #111999; padding:20px;">
                <?php foreach($uploadedfiles as $key=>$files){

                    $fileLocation=$resEdit['fileName'].$files;
                    echo"  
                        <div class=''  style='padding:20px;'> <i class='fa fa-file fa-3x'></i> ". ucfirst($files)." ~ <a href='removefile.php?documentId=$documentId&fileName=$key&fileLocation=$fileLocation' class='download btn btn-primary btn-sm' ><i class='fa fa-ban'></i> Remove</a></div>
                        ";
                } ; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="file">Add On Documents :</label>
            <div class="col-sm-6">
                <input type="file" name="upload[]" multiple="multiple"  class="form-control-file" />
            </div>
            <div class="col-sm-6" style="color:#111999;"><i class="fa fa-info"></i>: Only allowable formats <b>".jpeg",".jpg",".png",".pdf",".docx", ".xlsm"</b></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="editdoc" class="btn btn-primary">SAVE</button>
            </div>
        </div>
        </form>     
    </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
