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
        <h2><i class="fa fa-users"></i> Users</h2>
        <table id="table_id" class="display table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
               <?php
                $stmt="SELECT * FROM users";
                $runStmt=mysqli_query($db,$stmt);
                $countnum=mysqli_num_rows($runStmt);
                if($countnum>0){
                    //retriving data from the database
                    while($res=mysqli_fetch_array($runStmt)){
                        $ResUserId=$res['userId'];
                        //fill the table
                        echo "<tr>";
                        echo    " <td>".$res['firstName']. " ".$res['lastName']."</td>  ";
                        echo    " <td>".$res['userName']."</td>  ";
                        echo    " <td>".$res['email']."</td>  ";
                        echo    " <td>".$res['password']."</td>  ";
                        echo    " <td>".$res['userType']."</td>  ";

                        //genaration of buttons for options
                        echo    " <td> <a href='edit?userId=$ResUserId' data-toggle='tooltip' title='Edit User' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a> | <a href='delete?userId=$ResUserId' data-toggle='tooltip' title='Delete User' class='btn btn-danger btn-sm'><i class='fa fa-trash-alt'></i></a> </td>  ";
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