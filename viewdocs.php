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
    <?php 
    if(isset($_REQUEST['success'])){          
            ?>
            <div class="alert alert-warning fade in">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-info fa-2x"></i> <big> Info!</strong> <?php echo $_REQUEST['success'];?>.</big>
          </div>
          <?php 
        }?>
        <h2><i class="fa fa-folder-open"></i> View Records</h2>
        <table id="table_id" class="display table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>files</th>
                    <th>Date Recorded</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
               <?php
                $stmt="SELECT * FROM documents";
                $runStmt=mysqli_query($db,$stmt);
                $countnum=mysqli_num_rows($runStmt);
                if($countnum>0){
                    //retriving data from the database
                    while($res=mysqli_fetch_array($runStmt)){
                        $documentId=$res['documentId'];
                        //fill the table
                        echo "<tr>";
                        echo    " <td>".$res['title']. "</td>  ";
                        echo    " <td>".$res['description']."</td>  ";
                        echo    " <td> Files </td>  ";
                        echo    " <td>".$res['dateUploaded']."</td>  ";

                        //genaration of buttons for options
                        echo    " <td> <a href='view.php?documentId=$documentId' data-toggle='tooltip' title='View Document' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i></a> | <a href='deletefile.php?documentId=$documentId' data-toggle='tooltip' title='Delete User' class='btn btn-danger btn-sm'><i class='fa fa-trash-alt'></i></a> </td>  ";
                        echo "</tr>";
                    }
                }else{
                    echo "No Records Found";
                }
               ?>
            </tbody>
        </table>
    </div>


    </div>
</div>

<?php
include("includes/footer.php");
?>