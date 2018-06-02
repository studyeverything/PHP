<?php
    //this scripts check is there is a session set for a user (Object Oriented)
    include_once("conn.php");
    
    if( (isset($_SESSION['username'])) || (isset($_SESSION['password'])) ){
        $islogedin=true;
        $username=$_SESSION['username'];
        $pwd=$_SESSION['password'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$pwd' OR email='$username' AND password='$pwd'";
        $result = $db->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $userId=$row["userId"];
                $name = ucfirst($row["firstName"])." ".ucfirst($row["lastName"]);
            }
        } else {
            echo "0 results";
        }
    }else{
        $islogedin=false;
    }

    //login magic

    if($islogedin==false){
        header("location:scripts/logout.php");
    }
 
?>