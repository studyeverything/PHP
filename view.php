<?php
if(!isset($_REQUEST['documentId'])||empty($_REQUEST['documentId'])){
    die("<h1>Please Select Document to be viewed <a href='home.php'>Back</a></h1>");
}else{
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
        
        <?php
      
        $documentId=$_REQUEST['documentId'];
        $sql="SELECT * FROM documents WHERE documentId='$documentId'";
        $runsql=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($runsql);

        $uploads=unserialize($row['uploads']);
        ?>
        <h2><i class="fa fa-folder-open"></i> View Record</h2>
            <div class="col-sm-12">
                <h3>Title : <?php echo $row['title']?></h3>
                <h4>Description : <?php echo $row['description']?></h4>
                <h5>Subject : <?php echo $row['subject']?></h5>
                <hr>
                    <h2><i class="fa  fa-paperclip"></i> File(s)</h2>
                <div class="files">
                    <?php
                    foreach($uploads as $upload){
                        echo" 
                        <div class='col-sm-3'> 
                            <div class='thumbnail'  style='padding:20px;'><div class='icon'> <i class='fa  fa-file'></i></div>". $upload."<hr> <a href='UploadFolder/".$row['fileName']."/".$upload."' class='download btn btn-primary' ><i class='fa fa-download'></i> Download</a>
                            </div>
                        </div> ";
                    }
                    ?>
                        <div class="col-sm-12 bin">
                           <a href="editdoc.php?documentId=<?php echo $documentId?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Document"><i class=" fa fa-edit fa-3x" ></i> </a>
                           <a href="deletefile.php?documentId=<?php echo $documentId?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Document"><i class="fa fa-trash-alt fa-3x" ></i></a>
                        </div>
                </div>
            </div>
       
    </div>


    </div>
</div>

<?php
include("includes/footer.php");
}
?>