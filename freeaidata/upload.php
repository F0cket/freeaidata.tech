<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
$allowed = array('gif', 'png', 'jpg', 'txt', 'mov', 'mp4', 'avi', 'mp3');
if(!in_array($FileType, $allowed)){
  //echo '<script>alert("Your filetype is not allowed to be uploaded. Please consult our usage policy")</script>';
  header("Location: http://www.example.com/another-page.php");
  echo('<script>window.history.go(-1);</script>');
  echo('<script>alert("Your filetype is not allowed to be uploaded. Please consult our terms of use")</script>');
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
// if everything is ok, try to upload file
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo('<script>window.history.go(-1);</script>');
    echo('<script>alert("Your file has been uploaded.")</script>');} 
    else {
    echo('<script>window.history.go(-1);</script>');
    echo('<script>alert("Sorry, there was an error uploading your file.")</script>');
  }
}
?>