<?php
include("scripts/conn.php");

$documentId=$_REQUEST["documentId"];
$titlesql=mysqli_query($db,"SELECT * FROM documents WHERE documentId='$documentId'");
$title = mysqli_fetch_array($titlesql);

$fileLocation="UploadFolder/".$title['fileName']."/";

unlink($fileLocation);

mysqli_query($db,"DELETE FROM documents WHERE documentId='$documentId'")or die(mysqli_error($db)." Oops Something Went Wrong");
header("Location:viewdocs.php?success=You have Successfully Deleted a Record");
?>