<?php
include('scripts/conn.php');
if(!isset($_REQUEST['documentId'])||empty($_REQUEST['documentId'])){
    die("<h1>Please Select Document to be viewed <a href='home.php'>Back</a></h1>");
}else{

    //operate
    $documentId=$_REQUEST['documentId'];

    $stmt=mysqli_query($db,"SELECT uploads FROM documents WHERE documentId='$documentId'");
    $resstmt=mysqli_fetch_array($stmt);
    $uploads=unserialize($resstmt['uploads']);

    $key=$_REQUEST['fileName'];
    $fileLocation=$_REQUEST['fileLocation'];


    unlink($fileLocation);

    unset($uploads[$key]);
    $uploads=serialize($uploads);

    //update Db
    mysqli_query($db,"UPDATE documents SET uploads='$uploads' WHERE documentId='$documentId'");
    
    header("Location:editco.php?documentId='$documentId'");
}
?>