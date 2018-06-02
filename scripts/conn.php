<?php
    session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erms";
// Create connection
$db = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//Global function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?> 