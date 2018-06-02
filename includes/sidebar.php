    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3> ERMS</h3>
            <strong>ERMS</strong>
        </div>

        <ul class="list-unstyled components">
         <li>
         <a href="profile"><i class="fa fa-user fa-2x"></i> 
                <big> <?php echo $name;?></big>
                
            </a>
         <li>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/rms/home.php' ? ' active' : '');?>">
                <a href="home.php" >
                    <i class="glyphicon glyphicon-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    Documents
                </a>
                <ul class="collapse list-unstyled <?php echo ($_SERVER['PHP_SELF'] == '/rms/newdoc.php' || $_SERVER['PHP_SELF'] == '/rms/viewdocs.php' ? ' in' : '');?>" id="pageSubmenu">
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == '/rms/newdoc.php' ? ' active' : '');?>"><a href="newdoc.php">New Document</a></li>
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == '/rms/viewdocs.php' ? ' active' : '');?>"><a href="viewdocs.php">Edit Document</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa  fa-question"></i>
                    Help
                </a>
            </li>
            <li >
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    Users
                </a>
                <ul class="collapse list-unstyled <?php echo ($_SERVER['PHP_SELF'] == '/rms/newuser.php' || $_SERVER['PHP_SELF'] == '/rms/viewusers.php' ? ' in' : '');?>" id="pageSubmenu2">
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == '/rms/newuser.php' ? ' active' : '');?>"><a href="newuser.php">New User</a></li>
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == '/rms/viewusers.php' ? ' active' : '');?>"><a href="viewusers.php">Edit Users</a></li>
                </ul>
            </li>
            <li>
                <a href="scripts/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>