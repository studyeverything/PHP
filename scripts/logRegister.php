<?php
    include_once("conn.php");

    //is submit btn is clicked
    if(isset($_POST["logBtn"])){
        
        //sanitize data before inserting in the database to avoid hacker

        $username = mysqli_real_escape_string($db, test_input($_POST["username"]));  
        $pwd = mysqli_real_escape_string($db, test_input($_POST["pwd"]));  
                //encrypt password
                //---- $pwd=md5($pwd);-----//

        //Test the login data
        $stmt="SELECT * FROM users WHERE userName='$username' AND password='$pwd' OR email='$username' AND password='$pwd' ";
        $runStmt=mysqli_query($db,$stmt);
        //count the results
        $count=mysqli_num_rows($runStmt);
        if($count>0){
            //set session
            $_SESSION['username']=$username;
            $_SESSION['password']=$pwd;
            header("Location:home.php");
        }else{
            $error="Invalid Username or Password ";
        }
    }
    
    if(isset($_POST['regBtn'])){

        $userType = mysqli_real_escape_string($db, test_input($_POST["userType"]));  
        $firstName = mysqli_real_escape_string($db, test_input($_POST["firstName"]));  
        $lastName = mysqli_real_escape_string($db, test_input($_POST["lastName"]));  
        $username = mysqli_real_escape_string($db, test_input($_POST["username"]));  
        $email = mysqli_real_escape_string($db, test_input($_POST["email"]));  
        $pwd = mysqli_real_escape_string($db, test_input($_POST["pwd"]));  
        $pwd2 = mysqli_real_escape_string($db, test_input($_POST["pwd2"]));  
         
        //validate data
        //check valid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
       }else{
            //check passwords if they match
            if($pwd!=$pwd2){
                $error = "Password feilds do not Match";
            }else{
                
                if(empty($userType)||empty( $firstName) ||empty( $lastName )|| empty($username )||empty( $pwd )||empty($pwd2 )){
                    $error = "feilds marked <i class='fa fa-asterisk'></i> can not be blank";
                }else{
                    //check for deplicated emails or username
                    $stmt="SELECT * FROM users WHERE userName='$username'  OR email='$email' ";
                    $runStmt=mysqli_query($db,$stmt);
                    //count the results
                    $count=mysqli_num_rows($runStmt);
                    if($count>0){
                        $error=" <b>Username</b> or <b>Email Address</b> already exists";
                    }else{
                        echo $count;
                        //encrypt password (one way encryption) 
                        //----- $pwd=md5($pwd);--------//

                        //insert or die
                        mysqlI_query($db,"INSERT INTO users (firstName, lastName, userName, email, password, userType) VALUES('$firstName','$lastName','$username','$email','$pwd','$userType')")or Die("Opps something went wrong ". mysqli_error($db));
                        $success="Registration successful !";
                    }    
                }
            }
       }
    }
?>