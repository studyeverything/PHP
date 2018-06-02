<?php
    include_once("conn.php");

    if(isset($_POST['uploadBtn'])){

        $title = mysqli_real_escape_string($db, test_input($_POST["title"]));  
        $description = mysqli_real_escape_string($db, test_input($_POST["description"]));  
        $subject = mysqli_real_escape_string($db, test_input($_POST["subject"]));  

        if(empty($title)){
            $error="Provide Title to continue upload";
        }else{

            //handling files
            
            $uploadedFiles = array();
            $extension = array("jpeg","jpg","png","pdf","docx", "xlsm");
            $totalBytes = 8388608 ; //======== 8MB 
            $UploadFolder = "UploadFolder/".$title."/";
            
            $imgCounter = 0;

            foreach ($_FILES['upload']['tmp_name'] as $key => $tmp_name){
                $temp = $_FILES["upload"]["tmp_name"][$key];
                $fileName = $_FILES["upload"]["name"][$key];

            

                if(empty($temp)) {
                    break;
                }
                $imgCounter++;

                //test the uploads
                $UploadOk = true;

                $ext = pathinfo($fileName, PATHINFO_EXTENSION);

                if($_FILES["upload"]["size"][$key] > $totalBytes){
                    $UploadOk = false;
                    $error=" file size is larger than the 5 MB";
                }elseif(in_array($ext, $extension) == false){
                    $UploadOk = false;
                    $error= "file type is invalid";
                }else{
                    if(file_exists($UploadFolder."/".$fileName) == true){
                        $UploadOk = false;
                        $error= " file already exist";
                    }else{
                        //make a folder
                        if($UploadOk == true){
    
                            if(!file_exists($UploadFolder)){
                                mkdir($UploadFolder, 0777,true);
                            }

                            move_uploaded_file($temp,$UploadFolder."/".$fileName);
                    
                            array_push($uploadedFiles, $fileName);

                            if(count($uploadedFiles)>0){
                                //serialize
                               $ser_uploadedFiles=serialize($uploadedFiles);
                           }

                        }
                    }
                }
            }//uploads ends here
            //upload to that database starts here
            if($UploadOk == true){
            $sql="INSERT INTO documents (title,description,subject,uploads,fileName,dateUploaded) VALUES('$title','$description','$subject','$ser_uploadedFiles','$title', now()) ";
            mysqli_query($db,$sql)or die("Oops Something went wrong");
            $success="You succefully added a new Record";
            }
        }
    }

//edit documemnts

    if(isset($_POST['editdoc'])){

        $documentId = mysqli_real_escape_string($db, test_input($_POST["documentId"]));  
        $title = mysqli_real_escape_string($db, test_input($_POST["title"]));  
        $description = mysqli_real_escape_string($db, test_input($_POST["description"]));  
        $subject = mysqli_real_escape_string($db, test_input($_POST["subject"]));  

        if(empty($title)){
            $error="Provide Title to continue upload";
        }else{
            
            //check if title has changed
            $chck=mysqli_query($db,"SELECT * FROM documents WHERE documentId ='$documentId'");
            $reschck=mysqli_fetch_array($chck);
            
            if($reschck['title']!=$title){
                //rename the folder title
                $oldUploadFolder = "UploadFolder/".$reschck['title']."/";
                $newUploadFolder ="UploadFolder/".$title."/";
                rename($oldUploadFolder,$newUploadFolder);
            }
           
                    //check if files have been set
            if ($_FILES['upload']){
                foreach($_FILES['upload']['name'] as $k=>$v){
                    if(!empty($_FILES['upload']['name'][$k])){
                        if($_FILES['upload']['size'][$k]>0){
                                 
                            $uploadedFiles = unserialize($reschck['uploads']);
                            $extension = array("jpeg","jpg","png","pdf","docx", "xlsm");
                            $totalBytes = 8388608 ; //======== 8MB 
                            $UploadFolder = "UploadFolder/".$title."/";
                                
                            $imgCounter = 0;
                    
                            foreach ($_FILES['upload']['tmp_name'] as $key => $tmp_name){
                                    $temp = $_FILES["upload"]["tmp_name"][$key];
                                    $fileName = $_FILES["upload"]["name"][$key];
                    
                                
                    
                                    if(empty($temp)) {
                                        break;
                                    }
                                    $imgCounter++;
                    
                                    //test the uploads
                                    $UploadOk = true;
                    
                                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                                    if($_FILES["upload"]["size"][$key] > $totalBytes){
                                        $UploadOk = false;
                                        $error=" file size is larger than the 5 MB";
                                    }elseif(in_array($ext, $extension) == false){
                                        $UploadOk = false;
                                        $error= "file type is invalid";
                                    }else{
                                        
                                
                                            if($UploadOk == true){

                    
                                                move_uploaded_file($temp,$UploadFolder."/".$fileName);
                                        
                                                array_push($uploadedFiles, $fileName);
                    
                                                if(count($uploadedFiles)>0){
                                                    //serialize
                                                   $ser_uploadedFiles=serialize($uploadedFiles);
                                               }
                    
                                            }
                                        
                                    }
                                }
                                if($UploadOk == true){
                                    $sql="UPDATE documents SET title='$title',description='$description',subject='$subject',uploads='$ser_uploadedFiles',fileName='$fileName' WHERE documentId ='$documentId' ";
                                    mysqli_query($db,$sql)or die(mysqli_error($db));
                                    $success='Succefully Updated Record'; 
                                }
                             }
                          }
                        }
                      }

                      $sql="UPDATE documents SET title='$title',description='$description',subject='$subject',fileName='$newUploadFolder' WHERE documentId ='$documentId' ";
                      mysqli_query($db,$sql)or die(mysqli_error($db));
                      $success='Succefully Updated Record'; 
        }

    }
?>