<?php
require_once('backend/connection.php');
$errors = array(); 

if (isset($_POST['update_task'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $author = mysqli_real_escape_string($db, $_POST['author']);

  if(!$_FILES['photo'] == "")  {
    //File upload path
    $targetDir = "images/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
        $photo = $fileName;
        } else {array_push($errors, "Failed to upload, please try again");}
    } else {array_push($errors, "Only jpg, jpeg, png, gif, & webp files are allowed.");}
  } else {
    $photo = mysqli_real_escape_string($db, $_POST['replace_photo']);
  }
  

  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($description)) { array_push($errors, "Description is required"); }
  if (empty($category)) { array_push($errors, "Category is required"); }
//   if (empty($image)) { array_push($errors, "Image is required"); }

  if (count($errors) == 0) {
  	  $query = "UPDATE tasks 
                SET = title ='$title',
                    description = '$description',
                    image = '$photo', 
                    category = '$category', 
                    author = '$author'
                WHERE id='$id'";
    mysqli_query($db, $query);
    header("location: index.php");
    }		     
}
?>