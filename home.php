<?php
include("scripts/getuser.php");
include("includes/header.php");

?>
<div class="wrapper">
<?php
include("includes/sidebar.php");
?>

    <!-- Page Content Holder -->
    <div id="content">
        
    <?php
    include("includes/navbar.php");

    $getsql=mysqli_query($db,"SELECT COUNT(documentId) FROM documents");
    $resultSql=mysqli_fetch_array($getsql);
    $countDoc=$resultSql['COUNT(documentId)'];

    ?>
        
    <div class="col-sm-12">
    <h2>Welcome</h2>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box well">
                <div class="inner">
             
                <h3><?php echo $countDoc;?></h3>

                <h4> Documents </h4>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 ">
            <div class="small-box well">
                <div class="inner">
                <h3>20</h3>

                <h4>Viewed Decuments</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-eye"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box well ">
                <div class="inner">
                <h3>50</h3>

                <h4>Users</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 ">
            <div class="small-box well">
                <div class="inner">
                <h3>10</h3>

                <h4>Private</h4>
                </div>
                <div class="icon">
                    <i class=" 	fa fa-minus-square"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
       
    <div class="col-sm-12">
        <h1>Search</h1>

        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="globalsearch.php" role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text"name="globalSearch" placeholder="Search For any Documents Here" class="form-control input-lg" required/>
                        <span class="input-group-btn">
                        <button class="btn btn-primary input-lg" name="globalSearchBtn" type="submit"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
             </form> 
            </div>
            <div class="col-sm-2"></div>      
    </div>

   <div class="line"></div>
</div>
</div>
<?php
include("includes/footer.php");
?>