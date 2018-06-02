<?php
$searchOutput="";
include("scripts/getuser.php");
include("includes/header.php");

if(isset($_POST['globalSearchBtn'])){

    $globalSearch = mysqli_real_escape_string($db, test_input($_POST["globalSearch"]));
    
    $query="SELECT * FROM documents WHERE title LIKE '%$globalSearch%' OR description LIKE '%$globalSearch%' OR subject LIKE '%$globalSearch%' ";
    $runQuery=mysqli_query($db,$query)or die(mysql_error($db));
    $countQuery=mysqli_num_rows($runQuery);

    if($countQuery > 0){
        //get the results
        while($row=mysqli_fetch_array($runQuery)){

            $documentId=$row['documentId'];
            $uploads=unserialize($row['uploads']);

            $searchOutput .="
    
            <div class='col-sm-12 thumbnail '>
            <a href='view.php?documentId=".$documentId."'>
       
            <div class='col-sm-8 '>

                <table class='table' >
                    <tr>
                        <th>Title</th><td>". ucfirst($row['title'])."</td>
                    </tr>
                    <tr>
                        <th>Description</th><td>". ucfirst($row['description'])."</td>
                    </tr>
                    <tr>
                        <th>Subject</th><td>". ucfirst($row['subject'])."</td>
                    </tr>
                </table>
               
            </div>
            <div class='col-sm-4'>
            <h3>".count($uploads)." Files<h3> 
        <div class='icon'>
             <i class='glyphicon glyphicon-duplicate'></i>
         </div>
        
            
        </div>
            </a>
            </div>
         
            ";

        }

    }else{
        $searchOutput="<h1>No Record Found</h1>";
    }

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
        <h1>Search</h1>

        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="globalsearch.php" role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text"name="globalSearch" placeholder="Search For any Documents Here" value="<?php echo $globalSearch;?>" class="form-control input-lg" required/>
                        <span class="input-group-btn">
                        <button class="btn btn-primary input-lg" name="globalSearchBtn" type="submit"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
             </form> 
            </div>
            <div class="col-sm-2"></div>      
    </div>
    <div class="results col-sm-12">

        <?php
        echo "<h3>" .$countQuery." Result(s) Found </h3><hr>";
        echo "<div class='col-sm-2'></div>";
        echo "<div class='col-sm-8'>";
        echo $searchOutput;
        echo "</div>";
        echo "<div class='col-sm-2'></div>";
        ?>
    </div>

   <div class="line"></div>
</div>
</div>
<?php
include("includes/footer.php");
?>